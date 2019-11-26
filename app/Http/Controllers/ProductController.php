<?php

namespace chessShop\Http\Controllers;

use Illuminate\Http\Request;

use chessShop\Http\Requests;

use chessShop\Product;
use Illuminate\Support\Facades\Redirect;
use chessShop\Http\Requests\ProductFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $products=DB::table('products')->where('name','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(7);
            return view('almacen.product.index',["products"=>$products,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.product.create");
    }
    public function store (ProductFormRequest $request)
    {
        $product=new Product;
        /*$product->id=$request->get('id');*/
        $product->name=$request->get('name');
        $product->price=$request->get('price');
        /*$product->created_at=$request->get('created_at');
        $product->updated_at=$request->get('updated_at');*/
        $product->save();
        return Redirect::to('almacen/product');

    }
    public function show($id)
    {
        return view("almacen.product.show",["product"=>Product::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.product.edit",["product"=>Product::findOrFail($id)]);
    }
    public function update(ProductFormRequest $request,$id)
    {
        $product=Product::findOrFail($id);
        $product->id=$request->get('id');
        $product->name=$request->get('name');
        $product->price=$request->get('price');
        $product->created_at=$request->get('created_at');
        $product->updated_at=$request->get('updated_at');
        $product->update();
        return Redirect::to('almacen/product');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        Session::flash('mensaje','Registro eliminado correctamente.');

        return Redirect::to('almacen/product');
    }

}
