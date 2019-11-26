<html>
    <head>
        <style>
            .header{background:#eee;color:#444;border-bottom:1px solid #ddd;padding:10px;}

            .client-detail{background:#ddd;padding:10px;}
            .client-detail th{text-align:left;}

            .items{border-spacing:0;}
            .items thead{background:#ddd;}
            .items tbody{background:#eee;}
            .items tfoot{background:#ddd;}
            .items th{padding:10px;}
            .items td{padding:10px;}

            h1 small{display:block;font-size:16px;color:#888;}

            table{width:100%;}
            .text-right{text-align:right;}
        </style>
    </head>
    <body>

    <div class="container">
<div class="row">
    <div class="col-md-12">
        <h2 lass="page-header">Listado de Compras</h2>
    
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Fecha de Compra</th>
                    <th class="text-center">Condicion</th>
                    <th class="text-right">Total de Compra</th>
                 
                </thead>
               @foreach ($compras as $com)
                <tr>
                    <td>{{ $com->id_compra}}</td>
                    <td>{{ $com->fecha_compra}}</td>
                    <td class="text-center">{{ $com->condicion}}</td>
                    <td class="text-right">$ {{ $com->total_compra}}</td>
                    
                 
                </tr>
                @include('compras.compra.modal')
                @endforeach
            
            </table>




        </div>
        {{$compras->render()}}  
    </div>
    
</div>
</div>
</div>
</div>

@endsection
 <body>
</html>