@extends ('layouts.app')
@section ('content')
	<div class="container">
      <div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cliente: {{ $client->name}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($client,['method'=>'PATCH','route'=>['ventas.client.update',$client->id]])!!}
            {{Form::token()}}
             
            <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" name="name" class="form-control" value="{{$client->name}}">
            </div>
             <div class="form-group">
                  <label for="ruc">RUC</label>
                  <input type="text" name="ruc" class="form-control" value="{{$client->ruc}}">
            </div>
            <div class="form-group">
                  <label for="address">Direccion</label>
                  <input type="text" name="address" class="form-control" value="{{$client->address}}">
            </div>
            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <!--<button class="btn btn-danger" type="reset">Cancelar</button>-->
                  <a href="{{ url()->previous() }}" class="btn btn-danger">Cancelar</a>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
      </div>
@endsection