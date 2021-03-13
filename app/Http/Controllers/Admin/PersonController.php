<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Catalogs\Country;
use App\Models\Catalogs\Department;
use App\Models\Catalogs\District;
use App\Models\Catalogs\IdentityDocumentType;
use App\Models\Catalogs\Province;

use App\Models\System\Configuration;

use App\Models\Admin\Persons;
use App\Http\Requests\Admin\PersonRequest;


use App\Http\Resources\Admin\PersonCollection;
Use App\Http\Resources\Admin\PersonResource;

// use App\Models\Admin\PersonType;


class PersonController extends Controller{
    public function index(){
       return view('Admin.person');
    }

    public function columns(){
        return [
            'code' => 'Codigo',
            'name' => 'Nombre',
            'number' => 'Número',
            'document_type' => 'Tipo de documento'
        ];
    }

    public function records(Request $request){
        $records = Persons::where($request->column, 'like', "%{$request->value}%")
                            ->orderBy('code');
        return new PersonCollection($records->paginate(20));
    }

    public function record($id){
        $record = new PersonResource(Persons::findOrFail($id));
        return $record;
    }

    public function tables(){
        $countries = Country::whereActive()->orderByDescription()->get();
        $departments = Department::whereActive()->orderByDescription()->get();
        $provinces = Province::whereActive()->orderByDescription()->get();
        $districts = District::whereActive()->orderByDescription()->get();
        $identity_document_types = IdentityDocumentType::whereActive()->get();
        // $person_types = PersonType::get();
        $locations = $this->getLocationCascade();
        $configuration = Configuration::first();
        $api_service_token = $configuration->token_apiruc == 'false' ? config('configuration.api_service_token') : $configuration->token_apiruc;

        return compact('countries', 'departments', 'provinces', 'districts', 'identity_document_types', 'locations','api_service_token');
    }

    public function getLocationCascade(){
        $locations = [];
        $departments = Department::where('active', true)->get();
        foreach ($departments as $department)
        {
            $children_provinces = [];
            foreach ($department->provinces as $province)
            {
                $children_districts = [];
                foreach ($province->districts as $district)
                {
                    $children_districts[] = [
                        'value' => $district->id,
                        'label' => $district->description
                    ];
                }
                $children_provinces[] = [
                    'value' => $province->id,
                    'label' => $province->description,
                    'children' => $children_districts
                ];
            }
            $locations[] = [
                'value' => $department->id,
                'label' => $department->description,
                'children' => $children_provinces
            ];
        }

        return $locations;
    }

    public function enabled($type, $id){

        $person = Persons::findOrFail($id);
        $person->enabled = $type;
        $person->save();

        $type_message = ($type) ? 'habilitado':'inhabilitado';

        return [
            'success' => true,
            'message' => "Cliente {$type_message} con éxito"
        ];

    }

    public function store(PersonRequest $request){
        // if($request->state){
        //     if($request->state != "ACTIVO"){

        //         return [
        //             'success' => false,
        //             'message' =>'El estado del contribuyente no es activo, no puede registrarlo',
        //         ];

        //     }
        // }

        $id = $request->input('id');
        $person = Persons::firstOrNew(['id' => $id]);
        $person->fill($request->all());
        $person->save();

        // $person->addresses()->delete();
        // $addresses = $request->input('addresses');
        // foreach ($addresses as $row)
        // {
        //     $person->addresses()->updateOrCreate( ['id' => $row['id']], $row);
        // }

        return [
            'success' => true,
            'message' => ($id)?'Cliente editado con éxito':'Cliente registrado con éxito',
            'id' => $person->id
        ];
    }


    public function destroy($id){
        try {
            $person = Persons::findOrFail($id);
            // $person_type = ($person->type == 'customers') ? 'Cliente':'Proveedor';
            $person->delete();
            return [
                'success' => true,
                'message' => 'Cliente eliminado con éxito'
            ];
        } catch (Exception $e) {
            return ($e->getCode() == '23000') ?
            ['success' => false,'message' => "El cliente esta siendo usado por otros registros, no puede eliminar"]
            :
            ['success' => false,'message' => "Error inesperado, no se pudo eliminar el cliente"];
        }
    }

}
