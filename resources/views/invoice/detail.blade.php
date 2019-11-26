@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">
                Comprobante # {{ str_pad ($model->id, 7, '0', STR_PAD_LEFT) }}
            </h2>

            <div class="well well-sm">
                <div class="row">
                    <div class="col-xs-6">
                        <input class="form-control typeahead" type="text" readonly value="{{ $model->client->name }}" />
                    </div>
                    <div class="col-xs-2">
                        <input class="form-control" type="text" readonly value="{{ $model->client->ruc }}" />
                    </div>
                    <div class="col-xs-4">
                        <input class="form-control" type="text" readonly value="{{ $model->client->address }}" />
                    </div>
                </div>
            </div>

            <hr />

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Producto</th>
                    <th style="width:100px;">Cantidad</th>
                    <th style="width:100px;">P.U</th>
                    <th style="width:100px;">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($model->detail as $d)
                <tr>
                    <td>{{$d->product->name}}</td>
                    <td class="text-right">{{$d->quantity}}</td>
                    <td class="text-right">₲ {{number_format($d->unitPrice)}}</td>
                    <td class="text-right">₲ {{number_format($d->total)}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3" class="text-right"><b>IVA</b></td>
                    <td class="text-right">₲ {{ number_format($model->iva) }}</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right"><b>Sub Total</b></td>
                    <td class="text-right">₲ {{ number_format($model->subTotal) }}</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right"><b>Total</b></td>
                    <td class="text-right">₲ {{ number_format($model->total) }}</td>
                </tr>
                </tfoot>
            </table>
                            
                            <a class="btn btn-default btn-lg btn-block" href="{{ url('invoice/pdf/' . $model->id) }}"><i class="fa fa-file-pdf-o"></i> Descargar comprobante</a>

        </div>

    </div>
</div>
@endsection