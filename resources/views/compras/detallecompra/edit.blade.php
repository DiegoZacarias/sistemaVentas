@extends ('layouts.app')
@section ('content')
	<div class="container">
  <div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Detalle Compra con ID: {{ $detallecompra->id_detalle}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($detallecompra,['method'=>'PATCH','route'=>['compras.detallecompra.update',$detallecompra->id_detalle]])!!}
            {{Form::token()}}
             <div class="form-group">
              <label for="id_detalle">ID de Detalle Compra</label>
              <input type="text" name="id_detalle" value="{{$detallecompra->id_detalle}}" class="form-control" placeholder="ID de detalle compra...">
            </div>
             <div class="form-group">
                  <label>ID de Compra</label>
                  <select name="id_compra" class="form-control">

                        @foreach ($compras as $com)
                              @if($com->id_compra ==$detallecompra->id_compra)

                              <option value="{{$com->id_compra}}" selected>
                                   
                                  {{$com->id_compra}}  

                              </option>
                              @else
                               <option value="{{$com->id_compra}}">
                                   
                                  {{$com->id_compra}}  

                              </option>
                              @endif
                        @endforeach



                  </select>
                  
            </div>
             <div class="form-group">
                  <label>ID de Producto</label>
                  <select name="id_producto" class="form-control">

                        @foreach ($productos as $pro)
                              @if($pro->id_producto ==$detallecompra->id_producto)

                              <option value="{{$pro->id_producto}}" selected>
                                   
                                  {{$pro->id_producto}}  

                              </option>
                              @else
                               <option value="{{$pro->id_producto}}">
                                   
                                  {{$pro->id_producto}}  

                              </option>
                              @endif
                        @endforeach



                  </select>
                  
            </div>
            <div class="form-group">
              <label for="cantidad">Cantidad</label>
              <input type="text" name="cantidad" class="form-control" value="{{$detallecompra->cantidad}}" placeholder="Cantidad...">
            </div>
             <div class="form-group">
                  <label for="precio_unitario">Precio Unitario</label>
                  <input type="text" name="precio_unitario" class="form-control" value="{{$detallecompra->precio_unitario}}" placeholder="Precio Unitario...">
            </div>
             <div class="form-group">
                  <label for="subtotal">Subtotal</label>
                  <input type="text" name="subtotal" class="form-control" value="{{$detallecompra->subtotal}}" placeholder="Subtotal...">
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