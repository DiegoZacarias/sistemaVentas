<?php

namespace chessShop\Http\Controllers;

use Illuminate\Http\Request;

use chessShop\Http\Requests;
use chessShop\Cliente;
use Illuminate\Support\Facades\Redirect;
use chessShop\Http\Requests\ClienteFormRequest;
use Illuminate\Support\Facades\Session;
use DB;


class ClienteController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $clientes=DB::table('cliente')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('id_cliente','desc')
            ->paginate(7);
            return view('ventas.cliente.index',["clientes"=>$clientes,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("ventas.cliente.create");
    }
    public function store (ClienteFormRequest $request)
    {
        $cliente=new Cliente;
        $cliente->id_cliente=$request->get('id_cliente');
        $cliente->nombre=$request->get('nombre');
        $cliente->apellido=$request->get('apellido');
        $cliente->direccion=$request->get('direccion');
        $cliente->telefono=$request->get('telefono');
        $cliente->save();
        return Redirect::to('ventas/cliente');

    }
    public function show($id)
    {
        return view("ventas.cliente.show",["cliente"=>Cliente::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("ventas.cliente.edit",["cliente"=>Cliente::findOrFail($id)]);
    }
    public function update(ClienteFormRequest $request,$id)
    {
        $cliente=Cliente::findOrFail($id);
         $cliente->id_cliente=$request->get('id_cliente');
        $cliente->nombre=$request->get('nombre');
        $cliente->apellido=$request->get('apellido');
        $cliente->direccion=$request->get('direccion');
        $cliente->telefono=$request->get('telefono');
        $cliente->update();
        return Redirect::to('ventas/cliente');
    }
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        Session::flash('mensaje','Registro eliminado correctamente.');

        return Redirect::to('ventas/cliente');
    }





}
