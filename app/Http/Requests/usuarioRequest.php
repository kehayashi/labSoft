<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class usuarioRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'nome' => 'required',
            'email' => 'required|email',
            'tipo_usuario' => 'required|not_in:null',
            'senha' => 'required'
        ];
    }

    public function messages(){
        return [

        ];
    }
}
