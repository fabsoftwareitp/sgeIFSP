<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrabalhoRequest extends FormRequest
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
     * https://laravel.com/docs/master/validation#available-validation-rules
     * @return array
     */
    public function rules()
    {
        return [                      
            'autor' => 'required|string',
            'coautores' => 'nullable',
            'nome' => 'required|string',
            'linkVid' => 'required|url',
            'trabalhoPdf' => 'required|mimes:pdf',
            'diarioPdf' => 'required|mimes:pdf'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O :attribute deve ser informado',
            'linkVid.url' => 'O link para o vídeo informado é inválido',
            'trabalhoPdf.required' => 'A submissão do trabalho é obrigatória',
            'diarioPdf.required' => 'A submissão do diário de bordo é obrigatória',
            'mimes' => 'O arquivo dever estar em formato PDF',
        ];
    }
    public function attributes()
    {
        return [
            'nome' => 'título do projeto',
            'linkVid' => 'link para o vídeo',
        ];
    }
}