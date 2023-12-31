<?php

namespace App\Http\Requests\Auth;

use DragonCode\Support\Facades\Helpers\Str;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        $this->request->add(['username' => Str::slug($this->username)]);

        return [
            'name'     => 'required',
            'username' => 'required|unique:users,username|min:3|max:30',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ];
    }
}
