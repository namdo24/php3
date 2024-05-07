<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => ['required', 'unique:users', 'max:255'],
            'password' => 'required|confirmed',
            
        ];
    }
    public function messages(){
        return[
            'name.required'=>':attribute Tên để trống kìa',
            'email.required'=>':attribute Email để trống kìa',

        ];
    }
    public function attributes(){
        return [
            'name'=>'tên',
            'email'=>'hòm thư điện tử'
        ];
    }
}
