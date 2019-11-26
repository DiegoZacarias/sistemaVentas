<?php

namespace chessShop\Http\Controllers;

use Illuminate\Http\Request;

use chessShop\Http\Requests;

use chessShop\Venta;
use Illuminate\Support\Facades\Redirect;
use chessShop\Http\Requests\VentaFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class VentaController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $ventas=DB::table('venta as v')
            
            ->join('cliente as c','v.id_cliente','=','c.id_cliente')
            ->select('v.id_venta','v.fecha_venta','v.condicion_venta','v.total_venta','c.id_cliente as cliente')
            ->where('id_venta','LIKE','%'.$query.'%')
            ->orderBy('id_venta','desc')
            ->paginate(7);
            return view('ventas.venta.index',["ventas"=>$ventas,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $clientes=DB::table('cliente')->get();
        return view("ventas.venta.create",["clientes"=>$clientes]);
    }
    public function store (VentaFormRequest $request)
    {
        $venta=new Venta;
        $venta->id_venta=$request->get('id_venta');
        $venta->fecha_venta=$request->get('fecha_venta');
        $venta->condicion_venta=$request->get('condicion_venta');
        $venta->total_venta=$request->get('total_venta');
        $venta->id_cliente=$request->get('id_cliente');
        $venta->save();
        return Redirect::to('ventas/venta');

    }
    public function show($id)
    {
        return view("ventas.venta.show",["venta"=>Venta::findOrFail($id)]);
    }
    public function edit($id)
    {
        $venta=Venta::findOrFail($id);
        $clientes=DB::table('cliente')->get();
        return view("ventas.venta.edit",["venta"=>$venta,"clientes"=>$clientes]);
    }
    public function update(VentaFormRequest $request,$id)
    {
        $venta=Venta::findOrFail($id);
          $venta->id_venta=$request->get('id_venta');
        $venta->fecha_venta=$request->get('fecha_venta');
        $venta->condicion_venta=$request->get('condicion_venta');
        $venta->total_venta=$request->get('total_venta');
        $venta->id_cliente=$request->get('id_cliente');
        $venta->update();
        return Redirect::to('ventas/venta');
    }
    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();

        Session::flash('mensaje','Registro eliminado correctamente.');

        return Redirect::to('ventas/venta');
    }
}
