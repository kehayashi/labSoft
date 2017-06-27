<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'latitude' => 'required',
            'longitude' => 'required',
            'cod_municipio' => 'required|not_in:null',
            'cod_distrito' => 'required|not_in:null',
            'cod_local' => 'required|not_in:null',
            'nome_cadastrador' => 'required|max:30',
            'datas' => 'required',
            //'primeiroNome' => 'required'
            //'telefone' => 'required'
        ];
    }

    public function messages(){
        return [
            'latitude.required' => 'Preencha o campo LATITUDE',
            'longitude.required' => 'Preencha o campo LONGITUDE',
            'cod_municipio.required' => 'selecione MUNICIPIO',
            'cod_distrito.required' => 'selecione DISTRITO',
            'cod_local.required' => 'selecione LOCALIDADE',
            'nome_cadastrador.required' => 'Preencha o campo NOME CADASTRADOR',
            'datas.required' => 'Preencha o campo DATA DO FORMULÁRIO',
            //'primeiroNome.required' => 'Preenchea o campo NOME 1 do núcleo familiar'
            //'telefone.required' => 'Preencha o campo TELEFONE'
        ];
    }
}
