@extends ('layouts.app')
@section ('content')
	<div class="container">
      <div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Compra</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'compras/compra','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="id_compra">ID</label>
            	<input type="text" name="id_compra" class="form-control" placeholder="ID...">
            </div>
            <div class="form-group">
            	<label for="fecha_compra">Fecha de Compra</label>
            	<input type="text" name="fecha_compra" class="form-control" placeholder="Fecha de compra...">
            </div>
             <div class="form-group">
                  <label for="condicion">Condicion</label>
                  <input type="text" name="condicion" class="form-control" placeholder="Condicion...">
            </div>
             <div class="form-group">
                  <label for="total_compra">Total</label>
                  <input type="text" name="total_compra" class="form-control" placeholder="Total Compra...">
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