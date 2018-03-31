<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\TipoTransaccion;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\TransaccionHeader;
use App\Models\TransaccionDetail;
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
         $transaccion_header=TransaccionHeader::All();
        //return view('transaccion.index',compact('producto'));
        return view('transaccion.index',compact('transaccion_header'));
    }


    public function create(){
        $tipo_transaccion = TipoTransaccion::all();

        //return view('transaccion.index',compact('producto'));
        return view('transaccion.create',compact('tipo_transaccion'));
    }


     public function detail(Request $request){
        $transaccion_detail = TransaccionDetail::join('tipo_transaccion','transaccion_detail.id_tipo_transaccion','=','tipo_transaccion.id')
        ->join('producto','transaccion_detail.id_producto','=','producto.id')
        ->select('transaccion_detail.numero_linea','tipo_transaccion.name AS tipo','transaccion_detail.numero','producto.name AS producto','transaccion_detail.cantidad')
        ->where([['transaccion_detail.numero','=',$request->input('numero')],['transaccion_detail.id_tipo_transaccion','=',$request->input('id_tipo_transaccion')]])
         ->getQuery()
         ->get();

        //return view('transaccion.index',compact('producto'));
        return view('transaccion.detail',compact('transaccion_detail'));
    }

    public function store(Request $request){
        //$producto = Producto::all();

        //return view('transaccion.index',compact('producto'));
        $tipo_transaccion = TipoTransaccion::find($request->input('tipo_transaccion'));
        $numero=$tipo_transaccion->correlativo;
        $trans = TransaccionHeader::where([['id_tipo_transaccion','=',$tipo_transaccion->id],['numero','=',$numero]])
        ->first(); // model or null
        if ($trans) {
             // Do stuff if exist.
            toast()->error('Ha occurrido un error!, Ya existe una transaccion con este numero');
            
            return redirect()->route('transaccion.index');
         }
   
        $fecha=date("Y-m-d H:i:s");
        //$fecha=date("Y-m-d");
        $codigocliente=explode("|", $request->input('cliente'));
       if(!$codigocliente[0]){
          $codigocliente[0]=null;
       }
    
        DB::beginTransaction();
        try{

             $transaccion_head = new TransaccionHeader([
            'numero'      =>  $numero,
            'observaciones'     =>  $request->observaciones,
            'description'     =>  $request->description,
            'fecha'     =>  $fecha,
            'id_tipo_transaccion'     =>  $request->tipo_transaccion,
            'id_cliente'     =>  $codigocliente[0],
            'status'     =>  1,
            ]);
            $transaccion_head->save();

            
            for ($x = 1; $x < ($request->nlineas)+1; $x++) {

                $producto=explode("|", $request->input('producto_'.$x));
                $cantidad=$request->input('cantidad_'.$x);
               
                if($cantidad < 0){
                  toast()->error('MySql error invalid cantidad value!');
                   return redirect()->route('transaccion.index');
                }

                $transaccion_detail=new TransaccionDetail
                ([
                    'id_tipo_transaccion'     =>  $request->tipo_transaccion,
                    'numero'      =>  $numero,
                    'id_producto'     =>  $producto[0],
                    'cantidad'     =>  $cantidad,
                    'numero_linea' => $x,
                    'status'     =>  1,
                ]);
                 $transaccion_detail->save();

                 if($tipo_transaccion->tipo==1){
                    $tablaproducto=Producto::find($producto[0]);
                    $tablaproducto->stock=$tablaproducto->stock+$cantidad;
                    $tablaproducto->save();
                 }else{
                    $tablaproducto=Producto::find($producto[0]);
                    $cant=$tablaproducto->stock-$cantidad;
                    if($cant<0){
                         toast()->error('Ha occurrido un error: No hay suficiente producto: '.$producto[1]);
                         echo "error No hay suficiente producto: ";
                         DB::rollback();
                         return redirect()->route('transaccion.index');
                    }else{
                           $tablaproducto->stock=$cant;
                           $tablaproducto->save();
                       }
                 }
                  
              } 

        $tipo_transaccion->correlativo=$numero+1;
        $tipo_transaccion->save();

        toast()->success('Transaccion actualizado con exito!');
        DB::commit();
        return redirect()->route('transaccion.index');

        }catch (\Exception $e){

            toast()->error('Ha occurrido un error!');
            echo "Ha occurrido un error! ".$e;
            DB::rollback();
           return redirect()->route('transaccion.index');

        }   
    }//fin de salvar transaccion


    public function get_tipotransaccion(Request $request){
          
          $id=$request->input('id');     
          $tipo_transaccion = TipoTransaccion::find($id);
          return Response::json($tipo_transaccion);

    }

    public function get_clientes(Request $request){
          
          $id=$request->input('term');     
          $clientes = Cliente::Where('name', 'like', '%' . $id . '%')->limit(25)->get();
          if(sizeof($clientes) > 0){
          foreach ($clientes as $cliente) {
              $results[] = ['label'=>$cliente->name,'value'=>$cliente->id." | ".$cliente->name];
          }
        }else{
          $results = [];
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