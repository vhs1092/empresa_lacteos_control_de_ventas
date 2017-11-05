<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Session;

class ProductoController extends Controller
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
        $producto = Producto::all();

        return view('producto.index',compact('producto'));
    }


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

    }




}
