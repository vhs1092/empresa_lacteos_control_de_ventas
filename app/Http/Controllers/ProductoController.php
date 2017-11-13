<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests\ProductoRequest;

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
        $tipos = TipoProducto::pluck('name', 'id');
        return view('producto.create', compact('tipos'));
    }

    public function store(ProductoRequest $request){

        try {
            
         $producto = new Producto([
            'name'      =>  $request->name,
            'id_tipo_producto'     =>  $request->id_tipo_producto,
            'description'     =>  $request->description,
            'weight'     =>  $request->weight,
            'unidad'     =>  $request->unidad,
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
        $tipos = TipoProducto::pluck('name', 'id');

        return view('producto.edit',[
            'producto'=>$producto,
            'tipos'=>$tipos
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
            $producto->unidad =  $request->unidad;
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

        public function changeStatus(Request $request){

            $producto = Producto::findOrFail($request->producto);
            $producto->status = $request->status;
            $producto->save();

            toast()->success('Producto actualizado con exito!');

            return redirect()
            ->route('producto.index');

    }


}
