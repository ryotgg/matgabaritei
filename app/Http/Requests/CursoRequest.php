<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
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
            'name' => 'required|max:100',
            'slug' => 'required|unique:cursos|max:255',
        ];
    }

    public function messages()
    {
        return [
            'slug.unique' => 'O slug precisa ser único',
            'slug.required' => 'O slug é obrigatório',
            'name.required' => 'O nome é obrigatório',
        ];
    }
}
