<?php

namespace chessShop\Http\Requests;

use chessShop\Http\Requests\Request;

class ProductoFormRequest extends Request
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
            'descri_producto'=>'required|max:512',
            'cantidad_existencia'=>'required',
            'precio_compra'=>'required',
            'precio_venta'=>'required',
            'id_proveedor'=>'required',
        ];
    }
}
