<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\TipoProducto;
use Illuminate\Support\Facades\DB;
use Session;

class TipoProductoController extends Controller
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
        $tipo_producto = TipoProducto::all();

        return view('tipo_producto.index',compact('tipo_producto'));
    }


    public function create(Request $request)
    {

        return view('tipo_producto.create');
    }

    public function store(Request $request){

        $validator = \Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('tipo_producto.index')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            
         $tipo_producto = new TipoProducto([
            'name'      =>  $request->name,
            'description'     =>  $request->description,
        ]);
        $tipo_producto->save();

    
        toast()->success('Tipo de producto creado con exito!');
        
        return redirect()
            ->route('tipo_producto.index');


        }catch (\Exception $e){
        
        toast()->error($e->getMessage(), 'Ha ocurrido un error');

            return redirect()
                ->route('tipo_producto.index');

        }
        
    }

  
    public function edit($id)
    {
        $tipo_producto       = TipoProducto::find($id);

        return view('tipo_producto.edit',[
            'tipo_producto'=>$tipo_producto
        ]);
    }



    public function update($id,Request $request)
    {


        $validator = \Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {

            return redirect()
                ->route('tipo_producto.index')
                ->withErrors($validator)
                ->withInput();
        }

        try{


            $tipo_producto = TipoProducto::findOrFail($id);

            $tipo_producto->name = $request->name;
            $tipo_producto->description =  $request->description;

            $tipo_producto->save();

        toast()->success('Tipo de producto actualizado con exito!');
        
        return redirect()
            ->route('tipo_producto.index');


        }catch (\Exception $e){

        toast()->error('Ha occurrido un error!');
           
            return redirect()
            ->route('tipo_producto.index');

        }

    }




}
