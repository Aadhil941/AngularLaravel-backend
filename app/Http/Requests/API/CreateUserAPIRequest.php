<?php

namespace App\Http\Requests\API;

use App\Models\User;
use InfyOm\Generator\Request\APIRequest;
use Illuminate\Validation\Rules\Password;

class CreateUserAPIRequest extends APIRequest
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
            'name' => 'required|max:25|regex:[^[a-zA-Z0-9\\s]*$]',
            'email' => 'email|max:25|required|unique:users,email,NULL,id',
            'password' => ['required', Password::min(5)->mixedCase()->numbers()->symbols()],
        ];
    }

    
    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ];
    }
}
