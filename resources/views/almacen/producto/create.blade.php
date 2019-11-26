@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Articulo</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'almacen/producto','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="id_producto">ID</label>
            	<input type="text" name="id_producto" required value="{{old('id_producto')}}" class="form-control" placeholder="ID...">
            </div>
            <div class="form-group">
            	<label for="descri_producto">Descripcion</label>
            	<input type="text" name="descri_producto" class="form-control" placeholder="Descripcion...">
            </div>
             <div class="form-group">
                  <label for="cantidad_existencia">Cantidad existente</label>
                  <input type="text" name="cantidad_existencia" class="form-control" placeholder="Cantidad existente...">
            </div>
             <div class="form-group">
                  <label for="precio_compra">Precio de compra</label>
                  <input type="text" name="precio_compra" class="form-control" placeholder="Precio de compra...">
            </div>
            <div class="form-group">
            	<label for="precio_venta">Precio de Venta</label>
            	<input type="text" name="precio_venta" class="form-control" placeholder="Precio de venta...">
            </div>
              <div class="form-group">
                  <label>Proveedor</label>
                  <select name="id_proveedor" class="form-control">

                        @foreach ($proveedores as $prov)
                              <option value="{{$prov->id_proveedor}}">
                                   
                                  {{$prov->id_proveedor}}  

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
@endsection