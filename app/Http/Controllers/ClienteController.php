<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Session;

class ClienteController extends Controller
{
    
    public function __construct()
    {

        $this->middleware(
            'needsRole:admin,employee,true',[
            'except' => [

            ]
        ]);

    }

    public function index(){

        $cliente = Cliente::all();

        return view('cliente.index',compact('cliente'));
    }


    public function create()
    {
        return view('cliente.create');
    }

    public function store(ClienteRequest $request){

        try {
            
         $cliente = new Cliente([
            'name'      =>  $request->name,
            'razon_social'     =>  $request->razon_social,
            'nit'     =>  $request->nit,
            'address'     =>  $request->address,
            'telephone'     =>  $request->telephone,
            'status'     =>  1,
        ]);
        
        $cliente->save();

    
        toast()->success('Cliente creado con exito!');
        
        return redirect()
            ->route('cliente.index');


        }catch (\Exception $e){
        
        toast()->error($e->getMessage(), 'Ha ocurrido un error');

            return redirect()
                ->route('cliente.index');

        }
        
    }

  
    public function edit($id)
    {
        $cliente       = Cliente::find($id);

        return view('cliente.edit',[
            'cliente'=>$cliente
        ]);
    }



    public function update($id, ClienteRequest $request)
    {


        try{

            $cliente = Cliente::findOrFail($id);
            $cliente->name = $request->name;
            $cliente->razon_social =  $request->razon_social;
            $cliente->nit =  $request->nit;
            $cliente->address =  $request->address;
            $cliente->telephone =  $request->telephone;
            $cliente->save();

        toast()->success('Cliente actualizado con exito!');
        
        return redirect()
            ->route('cliente.index');


        }catch (\Exception $e){

        toast()->error('Ha occurrido un error!');
           
            return redirect()
            ->route('cliente.index');

        }

    }

    public function changeStatus(Request $request){

            $cliente = Cliente::findOrFail($request->cliente);
            $cliente->status = $request->status;
            $cliente->save();

            toast()->success('Cliente actualizado con exito!');

            return redirect()
            ->route('cliente.index');

    }

}
