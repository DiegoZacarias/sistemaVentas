@extends ('layouts.app')
@section ('content')
	<div class="container">
  <div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Detalle de Compra</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'compras/detallecompra','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="id_detalle">ID de Detalle Venta</label>
            	<input type="text" name="id_detalle" required value="{{old('id_detalle')}}" class="form-control" placeholder="ID de detalle compra...">
            </div>
             <div class="form-group">
                  <label>ID de Compra</label>
                  <select name="id_compra" class="form-control">

                        @foreach ($compras as $com)
                              <option value="{{$com->id_compra}}">

                                   
                                  {{$com->id_compra}}  

                              </option>
                        @endforeach



                  </select>
                  
            </div>
             <div class="form-group">
                  <label>ID de Producto</label>
                  <select name="id_producto" class="form-control">

                        @foreach ($productos as $pro)
                              <option value="{{$pro->id_producto}}">
                                   
                                  {{$pro->id_producto}}  

                              </option>
                        @endforeach



                  </select>
                  
            </div>
            <div class="form-group">
            	<label for="cantidad">Cantidad</label>
            	<input type="text" name="cantidad" class="form-control" placeholder="Cantidad...">
            </div>
             <div class="form-group">
                  <label for="precio_unitario">Precio Unitario</label>
                  <input type="text" name="precio_unitario" class="form-control" placeholder="Precio Unitario...">
            </div>
             <div class="form-group">
                  <label for="subtotal">Subtotal</label>
                  <input type="text" name="subtotal" class="form-control" placeholder="Subtotal...">
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