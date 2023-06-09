<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSupport extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'subject' => 'required|min:3|max:255|unique:supports',
            'body' => [
                'required',
                'min:3',
                'max:10000'
            ]
        ];

        if($this->method() === 'PUT'){
        
            $rules['subject'] = [
                'required',
                'min:3',
                'max:255',
                Rule::unique('supports')-> ignore($this->support) // pegando o id do parametro dinamico {support}
                //Rule::unique('supports')-> ignore($this->id) mudou o nome do parametro dinamico para support
                //"unique:supports,subject, {$this->id}, id"
                //unico na tab. supports, mas ignora qnd o id for o mesmo
            ];
        }
        return $rules;
    }
}
