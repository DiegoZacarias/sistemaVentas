<?php

namespace chessShop\Http\Controllers;

use Illuminate\Http\Request;

use chessShop\Http\Requests;

use chessShop\DetalleCompra;
use Illuminate\Support\Facades\Redirect;
use chessShop\Http\Requests\DetalleCompraFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class DetalleCompraController extends Controller
{
     public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $detallecompras=DB::table('detalle_compra as dc')
            
            ->join('compras as c','dc.id_compra','=','c.id_compra') //we connect the FKs
            ->join('producto as p','dc.id_producto','=','p.id_producto')

            ->select('dc.id_detalle','c.id_compra as compra','p.id_producto as producto','dc.cantidad','dc.precio_unitario','dc.subtotal')
            ->where('id_detalle','LIKE','%'.$query.'%')
            ->orderBy('id_detalle','desc')
            ->paginate(7);
            return view('compras.detallecompra.index',["detallecompras"=>$detallecompras,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $compras=DB::table('compras')->get();
        $productos=DB::table('producto')->get();
        return view("compras.detallecompra.create",["compras"=>$compras],["productos"=>$productos]);
    }
    public function store (DetalleCompraFormRequest $request)
    {
        $detallecompra=new DetalleCompra;
        $detallecompra->id_detalle=$request->get('id_detalle');
        $detallecompra->id_compra=$request->get('id_compra');
        $detallecompra->id_producto=$request->get('id_producto');
        $detallecompra->cantidad=$request->get('cantidad');
        $detallecompra->precio_unitario=$request->get('precio_unitario');
        $detallecompra->subtotal=$request->get('subtotal');
        $detallecompra->save();
        return Redirect::to('compras/detallecompra');

    }
    public function show($id)
    {
        return view("compras.detallecompra.show",["detallecompra"=>DetalleCompra::findOrFail($id)]);
    }
    public function edit($id)
    {
        $detallecompra=DetalleCompra::findOrFail($id);
        $compras=DB::table('compras')->get();
        $productos=DB::table('producto')->get();
        return view("compras.detallecompra.edit",["detallecompra"=>$detallecompra,"compras"=>$compras],["detallecompra"=>$detallecompra,"productos"=>$productos]);
    }
    public function update(DetalleCompraFormRequest $request,$id)
    {
        $detallecompra=DetalleCompra::findOrFail($id);
        $detallecompra->id_detalle=$request->get('id_detalle');
        $detallecompra->id_compra=$request->get('id_compra');
        $detallecompra->id_producto=$request->get('id_producto');
        $detallecompra->cantidad=$request->get('cantidad');
        $detallecompra->precio_unitario=$request->get('precio_unitario');
        $detallecompra->subtotal=$request->get('subtotal');
        $detallecompra->update();
        return Redirect::to('compras/detallecompra');
    }
    public function destroy($id)
    {
        $detallecompra = DetalleCompra::findOrFail($id);
        $detallecompra->delete();

        Session::flash('mensaje','Registro eliminado correctamente.');

        return Redirect::to('compras/detallecompra');
    }
}
