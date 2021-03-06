<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_user' => 'required',
            'nova_url' => 'required'
            'antiga_url' => 'required'
            'validade_url' => 'required'
        ];
    }


}
