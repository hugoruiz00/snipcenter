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
            'name' => 'required|between:10,150',
            'body' => 'required|between:20,5000',
            'tags' => 'required|between:2,5',
        ];
    }

    public function messages()
    {
        return [
            'tags' => 'Ingrese entre 2 y 5 etiquetas',
        ];
    }
}
