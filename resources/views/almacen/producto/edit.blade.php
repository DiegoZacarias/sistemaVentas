@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Producto: {{ $producto->descri_producto}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($producto,['method'=>'PATCH','route'=>['almacen.producto.update',$producto->id_producto]])!!}
            {{Form::token()}}
              <div class="form-group">
              <label for="id_producto">ID</label>
              <input type="text" name="id_producto"  class="form-control" value="{{$producto->id_producto}}" placeholder="ID...">
            </div>
            <div class="form-group">
              <label for="descri_producto">Descripcion</label>
              <input type="text" name="descri_producto" class="form-control" value="{{$producto->descri_producto}}" placeholder="Descripcion...">
            </div>
             <div class="form-group">
                  <label for="cantidad_existencia">Cantidad existente</label>
                  <input type="text" name="cantidad_existencia" class="form-control" value="{{$producto->cantidad_existencia}}"placeholder="Cantidad existente...">
            </div>
             <div class="form-group">
                  <label for="precio_compra">Precio de compra</label>
                  <input type="text" name="precio_compra" class="form-control" value="{{$producto->precio_compra}}" placeholder="Precio de compra...">
            </div>
            <div class="form-group">
              <label for="precio_venta">Precio de Venta</label>
              <input type="text" name="precio_venta" class="form-control" value="{{$producto->precio_venta}}" placeholder="Precio de venta...">
            </div>
              <div class="form-group">
                  <label>Proveedor</label>
                  <select name="id_proveedor" class="form-control">

                        @foreach ($proveedores as $prov)
                              
                              @if($prov->id_proveedor ==$producto->id_proveedor)

                              <option value="{{$prov->id_proveedor}}" selected>
                                   
                                  {{$prov->id_proveedor}}  

                              </option>
                              @else
                               <option value="{{$prov->id_proveedor}}">
                                   
                                  {{$prov->id_proveedor}}  

                              </option>
                              @endif
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
@endsection