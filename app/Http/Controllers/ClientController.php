<?php

namespace chessShop\Http\Controllers;

use Illuminate\Http\Request;

use chessShop\Http\Requests;

use chessShop\Client;
use Illuminate\Support\Facades\Redirect;
use chessShop\Http\Requests\ClientFormRequest;
use Illuminate\Support\Facades\Session;
use DB;

class ClientController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $clients=DB::table('clients')->where('name','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(7);
            return view('ventas.client.index',["clients"=>$clients,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("ventas.client.create");
    }
    public function store (ClientFormRequest $request)
    {
        $client=new Client;
        /*$client->id=$request->get('id');*/
        $client->name=$request->get('name');
        $client->ruc=$request->get('ruc');
        $client->address=$request->get('address');
        /*$client->created_at=$request->get('created_at');
        $client->updated_at=$request->get('updated_at');*/
        $client->save();
        return Redirect::to('ventas/client');

    }
    public function show($id)
    {
        return view("ventas.client.show",["client"=>Client::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("ventas.client.edit",["client"=>Client::findOrFail($id)]);
    }
    public function update(ClientFormRequest $request,$id)
    {
        $client=Client::findOrFail($id);
        /*$client->id=$request->get('id');*/
        $client->name=$request->get('name');
        $client->ruc=$request->get('ruc');
        $client->address=$request->get('address');
        /*$client->created_at=$request->get('created_at');
        $client->updated_at=$request->get('updated_at');*/
        $client->update();
        return Redirect::to('ventas/client');
    }
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        Session::flash('mensaje','Registro eliminado correctamente.');

        return Redirect::to('ventas/client');
    }
}
