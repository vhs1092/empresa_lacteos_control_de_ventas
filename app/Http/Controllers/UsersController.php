<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Artesaos\Defender\Defender;
use Artesaos\Defender\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UsuarioRequest;

class UsersController extends Controller
{

    public function __construct()
    {

        $this->middleware(
            'needsRole:admin|employee,true',[
            'except' => [

            ]
        ]);

    }


    public function index(){
        $users = User::all();

        return view('users.index',compact('users'));
    }


    public function create(Request $request)
    {
        $roles      = array_pluck(config('app2._roles'),'str','id');
        $rol_id = null;

        return view('users.create',compact('roles','rol_id'));
    }

    public function store(UsuarioRequest $request){

        try {

         $user = new User([
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'password'  =>  \Hash::make($request->password),
            'status'    =>  1,
        ]);
        $user->save();

        $role = \Defender::findRoleById($request->rol_id);
        
        //from select input
        $user->attachRole($role);

       
        toast()->success('Usuario creado con exito!', 'Usuario creado');
        
        return redirect()
            ->route('user.index');


        }catch (\Exception $e){
        
        toast()->error($e->getMessage(), 'Ha ocurrido un error');

            return redirect()
                ->route('user.index');

        }
        
    }

    public function resetPassword($id){

        $id_user = $id;
        $user       = User::find($id_user);
        $agency_id = $user->agency_id;


        try {
            $pwd_generated = str_random(12);
            $user->password = \Hash::make($pwd_generated);
            $user->save();
            $this->sendAdminResetUserPasswordEmail($user,$pwd_generated);
            return redirect()->route('agency.show', ['id' =>$agency_id]);

        }catch (\Exception $e) {
            return redirect()
                ->route('agency.show', ['id' =>$agency_id])
                ->withErrors($e->getMessage())
                ->withInput();
        }
    }

     public function sendAdminResetUserPasswordEmail($user,$pass_str)
    {
        Mail::send('emails.reset_pass', compact('user','pass_str'), function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Password Reset!');
        });
    }

    public function edit($id)
    {
        $user       = User::with(['roles'])->find($id);

        $rolId     = array_pluck($user->roles, 'id');

        if(!$rolId)
            $rolId[0] = 0;

        $roles      = array_pluck(config('app2._roles'),'str','id');

        return view('users.edit',[
            'user'=>$user,
            'roles'=>$roles,
            'rol_id'=>$rolId[0],
        ]);
    }



    public function update($id,Request $request)
    {


        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:5',
            'email' => 'required|email|max:255|unique:users,id',
            'rol_id'=>'required|integer|min:1'
        ]);

        if ($validator->fails()) {

            return redirect()
                ->route('user.index')
                ->withErrors($validator)
                ->withInput();
        }

        try{


            $user = User::findOrFail($id);
            $roles = $user->roles;

            //remove previous roles only is permitted one role by user
            //if current role != new role
            if( isset($roles[0]) &&
                count($roles[0]) &&
                $request->rol_id!=$roles[0]->id){

                foreach($roles as $r){
                    $user->detachRole($r->id);
                }

                $role = \Defender::findRoleById($request['rol_id']);
                $user->attachRole($role);
            }


            $user->name = $request->name;
            $user->email =  $request->email;

            $user->save();

            toast()->success('Usuario actualizado con exito!');

            return redirect()
            ->route('user.index');



        }catch (\Exception $e){

           
        toast()->error($e->getMessage(), 'Ha ocurrido un error');

            return redirect()
                ->route('user.index');

        }

    }


    public function sendEmail($userData)
    {

        Mail::send('emails.welcome', ['user' => $userData], function ($m) use ($userData) {
            $m
                ->from(config('app2._email.from'), config('app.name'))
                ->to($userData['email'], $userData['name'])
                ->subject('Welcome to '. config('app.name'));
        });
    }



    public function changeStatus(Request $request){

            $user = User::findOrFail($request->user);
            $user->status = $request->status;
            $user->save();

            toast()->success('Usuario actualizado con exito!');

            return redirect()
            ->route('user.index');

    }
}
