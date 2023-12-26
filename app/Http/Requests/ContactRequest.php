<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:100', 'string'],
            'subject' => ['required', 'max:200'],
            'email' => ['required', 'max:200', 'email'],
            'message' => ['required', 'max:200'],
        ];
    }

    public function messages() //funcaão criada para exibir as mensagem
    {
        return [
            'name.required'=>'O campo nome é obrigatório !',
            'subject'=>'O campo assunto é obrigatório !',
            'subject.max'=>'O campo assunto deve ter no maximo 200 caracteres !',
            'email.required'=>'O campo email é obrigatório !',
            'message.required'=>'O campo mensagem é obrigatório !',
            'message.max'=>'O campo mensagem deve ter no maximo 200 caracteres !'
        ];
    }
}
