<?php

namespace App\Http\Controllers\Binnacle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Persons;
use App\Models\Binnacle\Binnacles;
use App\Http\Resources\Binnacle\BinnacleCollection;
use App\Http\Resources\Binnacle\BinnacleResource;
use App\Models\Binnacle\Binnacles_category;
use App\Models\Binnacle\Binnacles_service;

use App\SigeMype\Requests\Inputs\PersonInput;
use App\SigeMype\Requests\Inputs\CategoryInput;
use App\SigeMype\Requests\Inputs\ServiceInput;
use App\SigeMype\Requests\Inputs\UserInput;


use App\Http\Requests\Binnacle\BinnacleRequest;

class BinnacleController extends Controller{

    public function index(){

        // $records = Binnacles::all();
        // return json_encode($records);
        return view('binnacle.index');;
    }

    public function create(){

    }

    public function store(BinnacleRequest $request){
        $data = self::convert($request);
        $id = $request->input('id');
        // $user_id = auth()->id();
        $event = Binnacles::firstOrNew(['id' => $id]);
        $event->fill($request->all());
        $event->save();

        return [
            'success' => true,
            'message' => ($id)?'Evento editado con éxito':'Evento registrado con éxito',
            'id' => $event->id
        ];
    }

    public static function convert($inputs){
        // $company = Company::active();
        $user_id = auth()->id();
        $values = [
            'user_id' => auth()->id(),
            'user' => UserInput::set($user_id),
            'client' => PersonInput::set($inputs['client_id']),
            'category' => CategoryInput::set($inputs['category_id']),
            'service' => ServiceInput::set($inputs['service_id']),
        ];

        $inputs->merge($values);
        return $inputs->all();
    }

    public function record($id){
        $record = new BinnacleResource(Binnacles::findOrFail($id));
        return $record;
    }

    public function records(Request $request){
        $records = $this->getRecords($request);
        return new BinnacleCollection($records->paginate(20));
    }

    public function update(Request $request, $id){

    }

    public function destroy($id){
        try {
            $event = Binnacles::findOrFail($id);
            $event->delete();
            return [
                'success' => true,
                'message' => 'Evento eliminado con éxito'
            ];
        } catch (Exception $e){
            return ($e->getCode() == '23000') ? ['success' => false,'message' => 'El evento esta siendo usado por otros registros, no puede eliminar'] : ['success' => false,'message' => 'Error inesperado, no se pudo eliminar el evento'];
        }
    }









    public function import(Request $request)
    {
        if ($request->hasFile('file')) {
            try {
                $import = new BinnaclesImport();
                $import->import($request->file('file'), null, Excel::XLSX);
                $data = $import->getData();
                return [
                    'success' => true,
                    'message' =>  __('app.actions.upload.success'),
                    'data' => $data
                ];
            } catch (Exception $e) {
                return [
                    'success' => false,
                    'message' =>  $e->getMessage()
                ];
            }
        }
        return [
            'success' => false,
            'message' =>  __('app.actions.upload.error'),
        ];
    }


    public function data_table(){

        $clients = $this->table('clients');
        $categorys = $this->table('categorys');
        $services = $this->table('services');

        return compact( 'clients','categorys', 'services');
    }



    public function getRecords($request){
        $d_end = $request->d_end;
        $d_start = $request->d_start;
        $period = $request->period;
        $categorys_id = $request->categorys_id;
        $services_id = $request->services_id;
        $status = $request->status;
        $client_id = $request->client_id;
        // $pending_payment = ($request->pending_payment == "true") ? true:false;
        // $customer_id = $request->customer_id;
        // $item_id = $request->item_id;
        // $category_id = $request->category_id;


        if($d_start && $d_end){

            $records = Binnacles::where('user_id', auth()->id())
                            ->whereBetween('date', [$d_start , $d_end])
                            ->where('period', 'like', '%' . $period . '%')
                            ->where('client_id', 'like', '%' . $client_id . '%')
                            // ->where('series', 'like', '%' . $series . '%')
                            // ->where('number', 'like', '%' . $number . '%')
                            // ->where('state_type_id', 'like', '%' . $state_type_id . '%')
                            // ->whereTypeUser()
                            ->orderBy('date','desc')
                            ->orderBy('end_time','desc')
                            ->latest();

        }else{

            $records = Binnacles::where('user_id', auth()->id())
                            ->where('date', 'like', '%' . $d_start . '%')
                            ->where('period', 'like', '%' . $period . '%')
                            ->where('client_id', 'like', '%' . $client_id . '%')
                            // ->where('document_type_id', 'like', '%' . $document_type_id . '%')
                            // ->where('state_type_id', 'like', '%' . $state_type_id . '%')
                            // ->where('number', 'like', '%' . $number . '%')
                            // ->whereTypeUser()
                            ->orderBy('date','desc')
                            ->orderBy('end_time','desc')
                            ->latest();
        }

        if($status){
            $records = $records->where('status','<>', 100);
        // }else{
        //     $records = $records->where('status','<>', 101);
        }

        if($categorys_id){
            $records = $records->where('category_id', '=', $categorys_id);
        }

        if($services_id){
            $records = $records->where('service_id', '=', $services_id);
        //     $records = $records->whereHas('items', function($query) use($item_id){
        //                             $query->where('item_id', $item_id);
        //                         });
        }

        // if($category_id){

        //     $records = $records->whereHas('items', function($query) use($category_id){
        //                             $query->whereHas('relation_item', function($q) use($category_id){
        //                                 $q->where('category_id', $category_id);
        //                             });
        //                         });
        // }

        return $records;
    }


    public function tables(){
        $clients = $this->table('clients');
        $categorys = $this->table('categorys');
        $services = $this->table('services');

        return compact( 'clients','categorys', 'services');

    }

    public function table($table){
        switch ($table) {
            case 'clients':
            $clients = Persons::whereIsEnabled()->orderBy('name')->take(20)->get()->transform(function($row) {
                return [
                    'id' => $row->id,
                    'code' =>$row->code,
                    'identity_document_type_id' => $row->identity_document_type_id,
                    'name' => $row->name,
                    'number' => $row->number,
                    'description' => $row->code.' - '.$row->number.' - '.$row->name,
                ];
            });
            return $clients;
            break;

            case 'categorys':
                $categorys = Binnacles_category::get()->transform(function($row){
                    return [
                        'id' => $row->id,
                        'code' => $row->code,
                        'name' => $row->name,
                        'description' =>$row->code.' - '.$row->name,
                    ];
                });
                return $categorys;
                break;

            case 'services':
                $services = Binnacles_service::get()->transform(function($row){
                    return [
                        'id' => $row->id,
                        'category' => $row->category_id,
                        // 'category' => $row->category_id,
                        'description' =>$row->code.' - '.$row->name,
                    ];
                });
                return $services;
                break;

            default:
                return [];
                break;
        }
    }
}
