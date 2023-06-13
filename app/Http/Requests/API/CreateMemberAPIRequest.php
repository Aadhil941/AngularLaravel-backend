<?php

namespace App\Http\Requests\API;

use App\Models\Member;
use InfyOm\Generator\Request\APIRequest;

class CreateMemberAPIRequest extends APIRequest
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
            'name' => 'required|max:25|regex:[^[a-zA-Z0-9\\s]*$]|unique:members,name,NULL,id,deleted_at,NULL',
            'contact_no' => ['max:12', "unique:members,contact_no,NULL,id,deleted_at,NULL"],
            'address' => 'nullable|max:100',
        ];
    }
    
    public function messages()
    {
        return [
            'name.unique' => 'Member Name already exist!',
            'name.required' => 'Member Name reqiured!',
            'contact_no.unique' => 'Member Contact No already exist!',
        ];
    }
}
