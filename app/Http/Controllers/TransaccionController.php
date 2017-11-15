<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\TipoTransaccion;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Response;
use Session;


class TransaccionController extends Controller
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
        //$producto = Producto::all();

        //return view('transaccion.index',compact('producto'));
        return view('transaccion.index');
    }

/*
    public function create(Request $request)
    {

        return view('producto.create');
    }

    public function store(Request $request){

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'stock' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('producto.index')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            
         $producto = new Producto([
            'name'      =>  $request->name,
            'id_tipo_producto'     =>  $request->id_tipo_producto,
            'description'     =>  $request->description,
            'weight'     =>  $request->weight,
            'stock'     =>  $request->stock,
            'status'     =>  1,
        ]);
        $producto->save();

    
        toast()->success('Producto creado con exito!');
        
        return redirect()
            ->route('producto.index');


        }catch (\Exception $e){
        
        toast()->error($e->getMessage(), 'Ha ocurrido un error');

            return redirect()
                ->route('producto.index');

        }
        
    }

  
    public function edit($id)
    {
        $producto       = Producto::find($id);

        return view('producto.edit',[
            'producto'=>$producto
        ]);
    }



    public function update($id,Request $request)
    {


        $validator = \Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {

            return redirect()
                ->route('producto.index')
                ->withErrors($validator)
                ->withInput();
        }

        try{

            $producto = Producto::findOrFail($id);
            $producto->name = $request->name;
            $producto->description =  $request->description;
            $producto->id_tipo_producto =  $request->id_tipo_producto;
            $producto->weight =  $request->weight;
            $producto->stock =  $request->stock;

            $producto->save();

        toast()->success('Producto actualizado con exito!');
        
        return redirect()
            ->route('producto.index');


        }catch (\Exception $e){

        toast()->error('Ha occurrido un error!');
           
            return redirect()
            ->route('producto.index');

        }

    }*/


    public function create(){
        $tipo_transaccion = TipoTransaccion::all();

        //return view('transaccion.index',compact('producto'));
        return view('transaccion.create',compact('tipo_transaccion'));
    }

    public function get_tipotransaccion(Request $request){
          
          $id=$request->input('id');     
          $tipo_transaccion = TipoTransaccion::find($id);
          return Response::json($tipo_transaccion);

    }

    public function get_clientes(Request $request){
          
          $id=$request->input('term');     
          $clientes = Cliente::Where('name', 'like', '%' . $id . '%')->limit(25)->get();
          foreach ($clientes as $cliente) {
              $results[] = ['label'=>$cliente->name,'value'=>$cliente->id." | ".$cliente->name];
          }
          return Response::json($results);
    }

    public function get_productos(Request $request){
          
          $id=$request->input('term');     
          $productos = Producto::Where('name', 'like', '%' . $id . '%')->limit(25)->get();
          foreach ($productos as $producto) {
              $results[] = ['label'=>$producto->name,'value'=>$producto->id." | ".$producto->name];
          }
          return Response::json($results);

    }


}