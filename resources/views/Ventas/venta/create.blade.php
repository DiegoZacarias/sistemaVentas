@extends ('layouts.app')
@section ('content')
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Venta</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'ventas/venta','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="id_venta">ID</label>
            	<input type="text" name="id_venta" required value="{{old('id_venta')}}" class="form-control" placeholder="ID...">
            </div>
            <div class="form-group">
            	<label for="fecha_venta">Fecha de Venta</label>
            	<input type="text" name="fecha_venta" class="form-control" placeholder="Fecha de venta...">
            </div>
             <div class="form-group">
                  <label for="condicion_venta">Condicion</label>
                  <input type="text" name="condicion_venta" class="form-control" placeholder="Condicion...">
            </div>
             <div class="form-group">
                  <label for="total_venta">Total</label>
                  <input type="text" name="total_venta" class="form-control" placeholder="Total de venta...">
            </div>
            
              <div class="form-group">
                  <label>Cliente</label>
                  <select name="id_cliente" class="form-control">

                        @foreach ($clientes as $cli)
                              <option value="{{$cli->id_cliente}}">
                                   
                                  {{$cli->id_cliente}}  

                              </option>
                        @endforeach



                  </select>
                  
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