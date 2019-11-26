<?php

namespace chessShop\Http\Controllers;

use Illuminate\Http\Request;

use chessShop\Http\Requests;
use chessShop\Compra;
use Illuminate\Support\Facades\Redirect;
use chessShop\Http\Requests\CompraFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class CompraController extends Controller
{
     public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $compras=DB::table('compras')->where('condicion','LIKE','%'.$query.'%')
            ->orderBy('id_compra','desc')
            ->paginate(7);
            return view('compras.compra.index',["compras"=>$compras,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("compras.compra.create");
    }
    public function store (CompraFormRequest $request)
    {
        $compra=new Compra;
        $compra->id_compra=$request->get('id_compra');
        $compra->fecha_compra=$request->get('fecha_compra');
        $compra->condicion=$request->get('condicion');
        $compra->total_compra=$request->get('total_compra');
        
        $compra->save();
        return Redirect::to('compras/compra');

    }



    public function show($id)
    {
        return view("compras.compra.show",["compra"=>Compra::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("compras.compra.edit",["compra"=>Compra::findOrFail($id)]);
    }
    public function update(CompraFormRequest $request,$id)
    {
        $compra=Compra::findOrFail($id);
         $compra->id_compra=$request->get('id_compra');
        $compra->fecha_compra=$request->get('fecha_compra');
        $compra->condicion=$request->get('condicion');
        $compra->total_compra=$request->get('total_compra');
        
        $compra->update();
        return Redirect::to('compras/compra');
    }
    public function destroy($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->delete();

        Session::flash('mensaje','Registro eliminado correctamente.');

        return Redirect::to('compras/compra');
    }

}
