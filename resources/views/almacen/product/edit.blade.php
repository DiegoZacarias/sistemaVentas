@extends ('layouts.app')
@section ('content')
	<div class="container">
  <div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Producto: {{ $product->name}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($product,['method'=>'PATCH','route'=>['almacen.product.update',$product->id]])!!}
            {{Form::token()}}
              <div class="form-group">
                  <label for="id">ID</label>
                  <input type="text" name="id" class="form-control" value="{{$product->id}}">
            </div>
            <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" name="name" class="form-control" value="{{$product->name}}">
            </div>
             <div class="form-group">
                  <label for="price">Precio</label>
                  <input type="text" name="price" class="form-control" value="{{$product->price}}">
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