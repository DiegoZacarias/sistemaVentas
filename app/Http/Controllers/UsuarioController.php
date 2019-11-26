<?php

namespace chessShop\Http\Controllers;

use Illuminate\Http\Request;

use chessShop\Http\Requests;



use chessShop\Usuario;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use chessShop\Http\Requests\UsuarioFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class UsuarioController extends Controller
{
     public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $usuarios=DB::table('usuario_pro')
            ->where('nombre','LIKE','%'.$query.'%')
            ->orwhere('id_usuario','LIKE','%'.$query.'%')
            ->orderBy('id_usuario','desc')
            ->paginate(7);
            return view('almacen.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.usuario.create");
    }
    public function store (UsuarioFormRequest $request)
    {
        $usuario=new Usuario;
        $usuario->id_usuario=$request->get('id_usuario');
        $usuario->nombre=$request->get('nombre');
        $usuario->pass=$request->get('pass');
        
        $usuario->save();
        return Redirect::to('almacen/usuario');

    }
    public function show($id)
    {
        return view("almacen.usuario.show",["usuario"=>Usuario::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.usuario.edit",["usuario"=>Usuario::findOrFail($id)]);
    }
    public function update(UsuarioFormRequest $request,$id)
    {
        $usuario=Usuario::findOrFail($id);
         $usuario->id_usuario=$request->get('id_usuario');
        $usuario->nombre=$request->get('nombre');
        $usuario->pass=$request->get('pass');
        $usuario->update();
        return Redirect::to('almacen/usuario');
    }
    public function destroy($id)
    {
       
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        Session::flash('mensaje','Registro eliminado correctamente.');

        return Redirect::to('almacen/usuario');
    }


}
