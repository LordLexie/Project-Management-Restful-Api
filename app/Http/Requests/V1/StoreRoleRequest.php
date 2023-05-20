<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string|max:100|unique:roles,name',
        ];
    }

    

    /*
    public function messages(): array
    {
        return [
            'name.required' => 'A role name is required',
            'name.unique' => 'A role name must be unique',
        ];
    }
    */
}
