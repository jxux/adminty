<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// Use App\Http\Resources\Admin\UserCollection;
// Use App\Http\Resources\Admin\UserResource;
// Use App\Http\Requests\Admin\UserRequest;

use Illuminate\Foundation\Auth\RegistersUsers;
// use Illuminate\Support\Facades\Hash;
// use Carbon\Carbon;
// use App\Models\User;

class UserController extends Controller{
    use RegistersUsers;

    public function index(){
        return view('page.users.index');
    }

    // public function record($id){
    //     $record = new UserResource(User::findOrFail($id));
    //     return $record;
    // }

    // public function records(){
    //     $records = User::all();
    //     return new UserCollection($records);
    // }

    // public function store(UserRequest $request){
    //     $id = $request->input('id');

    //     //VALIDAR EMAIL DISPONIBLE
    //     if (!$id){
    //         $verify = User::where('email', $request->input('email'))->first();
    //         if ($verify) {
    //             return [
    //                 'success' => false,
    //                 'message' => 'Email no disponible.'
    //             ];
    //         }
    //     }

    //     $user = User::firstOrNew(['id' => $id]);
    //     $user->dni = $request->input('dni');
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');
    //     $user->date_birthday = $request->input('date_birthday');
    //     $user->password = $request->input('password');

    //     if (!$id) {
    //         $user->password = Hash::make($request->input('password'));

    //     } else {
    //         // if (config('password_change')) {
    //             // $request->user()->fill([
    //             //     'password' => Hash::make($request->newPassword)
    //             // ]);
    //         $user->password = Hash::make($request->input('password'));
    //         // }
    //     }

    //     $user->save();


    //     return [
    //         'success' => true,
    //         'message' => ($id) ? 'Usuario actualizado' : 'Usuario registrado'
    //     ];
    // }

    // public function destroy($id){
    //     $user = User::findOrFail($id);
    //     $user->delete();

    //     return [
    //         'success' => true,
    //         'message' => 'Usuario eliminado con éxito'
    //     ];
    // }
}
