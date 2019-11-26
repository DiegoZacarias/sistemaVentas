<?php

namespace chessShop\Http\Controllers;

use Illuminate\Http\Request;

use chessShop\Http\Requests;
use chessShop\Proveedor;
use Illuminate\Support\Facades\Redirect;
use chessShop\Http\Requests\ProveedorFormRequest;
use Illuminate\Support\Facades\Session;
use DB;


class ProveedorController extends Controller
{
    
     public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $proveedores=DB::table('proveedor')->where('descri_proveedor','LIKE','%'.$query.'%')
            ->orderBy('id_proveedor','desc')
            ->paginate(7);
            return view('compras.proveedor.index',["proveedores"=>$proveedores,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("compras.proveedor.create");
    }
    public function store (ProveedorFormRequest $request)
    {
        $proveedor=new Proveedor;
        $proveedor->id_proveedor=$request->get('id_proveedor');
        $proveedor->descri_proveedor=$request->get('descri_proveedor');
        $proveedor->direccion_prov=$request->get('direccion_prov');
        $proveedor->telefono_prov=$request->get('telefono_prov');
        
        $proveedor->save();
        return Redirect::to('compras/proveedor');

    }
    public function show($id)
    {
        return view("compras.proveedor.show",["proveedor"=>Proveedor::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("compras.proveedor.edit",["proveedor"=>Proveedor::findOrFail($id)]);
    }
    public function update(ProveedorFormRequest $request,$id)
    {
        $proveedor=Proveedor::findOrFail($id);
        $proveedor->id_proveedor=$request->get('id_proveedor');
        $proveedor->descri_proveedor=$request->get('descri_proveedor');
        $proveedor->direccion_prov=$request->get('direccion_prov');
        $proveedor->telefono_prov=$request->get('telefono_prov');
        
        $proveedor->update();
        return Redirect::to('compras/proveedor');
    }
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        Session::flash('mensaje','Registro eliminado correctamente.');

        return Redirect::to('compras/proveedor');
    }
}
