<?php

namespace chessShop\Http\Controllers;

use Illuminate\Http\Request;

use chessShop\Http\Requests;

use chessShop\Producto;
use Illuminate\Support\Facades\Redirect;
use chessShop\Http\Requests\ProductoFormRequest;
use Illuminate\Support\Facades\Session;
use DB;


class ProductoController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $productos=DB::table('producto as p')
            
            ->join('proveedor as prov','p.id_proveedor','=','prov.id_proveedor')
            ->select('p.id_producto','p.descri_producto','p.cantidad_existencia','p.precio_compra','p.precio_venta','prov.id_proveedor as proveedor')
            ->where('descri_producto','LIKE','%'.$query.'%')
            ->orderBy('id_producto','desc')
            ->paginate(7);
            return view('almacen.producto.index',["productos"=>$productos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $proveedores=DB::table('proveedor')->get();
        return view("almacen.producto.create",["proveedores"=>$proveedores]);
    }
    public function store (ProductoFormRequest $request)
    {
        $producto=new Producto;
        $producto->id_producto=$request->get('id_producto');
        $producto->descri_producto=$request->get('descri_producto');
        $producto->cantidad_existencia=$request->get('cantidad_existencia');
        $producto->precio_compra=$request->get('precio_compra');
        $producto->precio_venta=$request->get('precio_venta');
        $producto->id_proveedor=$request->get('id_proveedor');
        $producto->save();
        return Redirect::to('almacen/producto');

    }
    public function show($id)
    {
        return view("almacen/producto.show",["producto"=>Producto::findOrFail($id)]);
    }
    public function edit($id)
    {
        $producto=Producto::findOrFail($id);
        $proveedores=DB::table('proveedor')->get();
        return view("almacen.producto.edit",["producto"=>$producto,"proveedores"=>$proveedores]);
    }
    public function update(ProductoFormRequest $request,$id)
    {
        $producto=Producto::findOrFail($id);
          $producto->id_producto=$request->get('id_producto');
        $producto->descri_producto=$request->get('descri_producto');
        $producto->cantidad_existencia=$request->get('cantidad_existencia');
        $producto->precio_compra=$request->get('precio_compra');
        $producto->precio_venta=$request->get('precio_venta');
        $producto->id_proveedor=$request->get('id_proveedor');
        $producto->update();
        return Redirect::to('almacen/producto');
    }
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        Session::flash('mensaje','Registro eliminado correctamente.');

        return Redirect::to('almacen/producto');
    }

}
