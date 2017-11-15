<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\TipoTransaccion;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests\TipoTransaccionRequest;


class TipoTransaccionController extends Controller
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
        $tipo_transaccion = TipoTransaccion::all();

        //return view('transaccion.index',compact('producto'));
        return view('tipo_transaccion.index',compact('tipo_transaccion'));
    }


    public function create(Request $request)
    {
        $tipo = [
        1 => 'Suma',
        2 => 'Resta'
        ];

        $maneja_cliente = [
        1 => 'Si',
        2 => 'No'
        ];

        return view('tipo_transaccion.create', compact('tipo', 'maneja_cliente'));
    }

    public function store(TipoTransaccionRequest $request){

        try {
            
         $tipo_transaccion = new TipoTransaccion([
            'name'      =>  $request->name,
            'description'     =>  $request->description,
            'tipo'     =>  $request->tipo,
            'maneja_cliente'     =>  $request->maneja_cliente,
            'correlativo'     =>  $request->correlativo,
            'status'     =>  1,
        ]);

        $tipo_transaccion->save();

    
        toast()->success('Tipo de transacción creada con exito!');
        
        return redirect()
            ->route('tipo_transaccion.index');


        }catch (\Exception $e){
        
        toast()->error($e->getMessage(), 'Ha ocurrido un error');

            return redirect()
                ->route('tipo_transaccion.index');

        }
        
    }

  
    public function edit($id)
    {
        $tipo_transaccion       = TipoTransaccion::find($id);
        
        $tipo = [
        1 => 'Suma',
        2 => 'Resta'
        ];

        $maneja_cliente = [
        1 => 'Si',
        2 => 'No'
        ];

        return view('tipo_transaccion.edit',[
            'tipo_transaccion'=>$tipo_transaccion,
            'tipo'=>$tipo,
            'maneja_cliente'=>$maneja_cliente
        ]);
    }



    public function update($id, TipoTransaccionRequest $request)
    { 
        try{

            $tipo_transaccion = TipoTransaccion::findOrFail($id);
            $tipo_transaccion->name = $request->name;
            $tipo_transaccion->description =  $request->description;
            $tipo_transaccion->tipo =  $request->tipo;
            $tipo_transaccion->maneja_cliente =  $request->maneja_cliente;
            $tipo_transaccion->correlativo =  $request->correlativo;

            $tipo_transaccion->save();

        toast()->success('Tipo de transacción actualizada con exito!');
        
        return redirect()
            ->route('tipo_transaccion.index');


        }catch (\Exception $e){

        toast()->error('Ha occurrido un error!');
           
            return redirect()
            ->route('tipo_transaccion.index');

        }

    }


    public function changeStatus(Request $request){

            $tipo_transaccion = TipoTransaccion::findOrFail($request->tipo_transaccion);
            $tipo_transaccion->status = $request->status;
            $tipo_transaccion->save();

            toast()->success('Estado actualizado con exito!');

            return redirect()
            ->route('tipo_transaccion.index');

    }


}