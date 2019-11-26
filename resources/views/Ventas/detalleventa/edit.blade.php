@extends ('layouts.app')
@section ('content')
	<div class="container">
  <div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Detalle Venta con ID: {{ $detalleventa->id_detalle_venta}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($detalleventa,['method'=>'PATCH','route'=>['ventas.detalleventa.update',$detalleventa->id_detalle_venta]])!!}
            {{Form::token()}}
             <div class="form-group">
              <label for="id_detalle_venta">ID de Detalle Venta</label>
              <input type="text" name="id_detalle_venta" value="{{$detalleventa->id_detalle_venta}}" class="form-control" placeholder="ID de detalle venta...">
            </div>
             <div class="form-group">
                  <label>ID de Venta</label>
                  <select name="id_venta" class="form-control">

                        @foreach ($ventas as $ven)
                              @if($ven->id_venta ==$detalleventa->id_venta)

                              <option value="{{$ven->id_venta}}" selected>
                                   
                                  {{$ven->id_venta}}  

                              </option>
                              @else
                               <option value="{{$ven->id_venta}}">
                                   
                                  {{$ven->id_venta}}  

                              </option>
                              @endif
                        @endforeach



                  </select>
                  
            </div>
             <div class="form-group">
                  <label>ID de Producto</label>
                  <select name="id_producto" class="form-control">

                        @foreach ($productos as $pro)
                              @if($pro->id_producto ==$detalleventa->id_producto)

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
              <input type="text" name="cantidad" class="form-control" value="{{$detalleventa->cantidad}}" placeholder="Cantidad...">
            </div>
             <div class="form-group">
                  <label for="precio_unitario">Precio Unitario</label>
                  <input type="text" name="precio_unitario" class="form-control" value="{{$detalleventa->precio_unitario}}" placeholder="Precio Unitario...">
            </div>
             <div class="form-group">
                  <label for="subtotal">Subtotal</label>
                  <input type="text" name="subtotal" class="form-control" value="{{$detalleventa->subtotal}}" placeholder="Subtotal...">
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