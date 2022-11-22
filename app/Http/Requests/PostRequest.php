<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:10|max:150',
            'body' => 'required|min:20|max:5000',
            'tags' => 'required|min:2|max:5',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
            'body' => 'contenido',
        ];
    }

    public function messages()
    {
        return [
            'tags.required' => 'Ingrese por lo menos 2 etiquetas',
            'tags.min' => 'Ingrese por lo menos :min etiquetas',
            'tags.max' => 'No ingrese más de :max etiquetas',
        ];
    }
}
