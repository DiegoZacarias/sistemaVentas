<?php

namespace chessShop\Http\Controllers;

use Illuminate\Http\Request;

use chessShop\Http\Requests;

use chessShop\DetalleVenta;
use Illuminate\Support\Facades\Redirect;
use chessShop\Http\Requests\DetalleVentaFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class DetalleVentaController extends Controller
{
     public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $detalleventas=DB::table('detalle_venta as dv')
            
            ->join('venta as v','dv.id_venta','=','v.id_venta') //we connect the FKs
            ->join('producto as p','dv.id_producto','=','p.id_producto')

            ->select('dv.id_detalle_venta','v.id_venta as venta','p.id_producto as producto','dv.cantidad','dv.precio_unitario','dv.subtotal')
            ->where('id_detalle_venta','LIKE','%'.$query.'%')
            ->orderBy('id_detalle_venta','desc')
            ->paginate(7);
            return view('ventas.detalleventa.index',["detalleventas"=>$detalleventas,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $ventas=DB::table('venta')->get();
        $productos=DB::table('producto')->get();
        return view("ventas.detalleventa.create",["ventas"=>$ventas],["productos"=>$productos]);
    }
    public function store (DetalleVentaFormRequest $request)
    {
        $detalleventa=new DetalleVenta;
        $detalleventa->id_detalle_venta=$request->get('id_detalle_venta');
        $detalleventa->id_venta=$request->get('id_venta');
        $detalleventa->id_producto=$request->get('id_producto');
        $detalleventa->cantidad=$request->get('cantidad');
        $detalleventa->precio_unitario=$request->get('precio_unitario');
        $detalleventa->subtotal=$request->get('subtotal');
        $detalleventa->save();
        return Redirect::to('ventas/detalleventa');

    }
    public function show($id)
    {
        return view("ventas.detalleventa.show",["detalleventa"=>DetalleVenta::findOrFail($id)]);
    }
    public function edit($id)
    {
        $detalleventa=DetalleVenta::findOrFail($id);
        $ventas=DB::table('venta')->get();
        $productos=DB::table('producto')->get();
        return view("ventas.detalleventa.edit",["detalleventa"=>$detalleventa,"ventas"=>$ventas],["detalleventa"=>$detalleventa,"productos"=>$productos]);
    }
    public function update(DetalleVentaFormRequest $request,$id)
    {
        $detalleventa=DetalleVenta::findOrFail($id);
        $detalleventa->id_detalle_venta=$request->get('id_detalle_venta');
        $detalleventa->id_venta=$request->get('id_venta');
        $detalleventa->id_producto=$request->get('id_producto');
        $detalleventa->cantidad=$request->get('cantidad');
        $detalleventa->precio_unitario=$request->get('precio_unitario');
        $detalleventa->subtotal=$request->get('subtotal');
        $detalleventa->update();
        return Redirect::to('ventas/detalleventa');
    }
    public function destroy($id)
    {
        $detalleventa = DetalleVenta::findOrFail($id);
        $detalleventa->delete();

        Session::flash('mensaje','Registro eliminado correctamente.');

        return Redirect::to('ventas/detalleventa');
    }
}
