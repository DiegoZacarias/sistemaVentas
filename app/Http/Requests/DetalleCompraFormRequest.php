<?php

namespace chessShop\Http\Requests;

use chessShop\Http\Requests\Request;

class DetalleCompraFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_detalle'=>'required',
            'id_compra'=>'required',
            'id_producto'=>'required',
            'cantidad'=>'required',
            'precio_unitario'=>'required',
            'subtotal'=>'required',
        ];
    }
}
