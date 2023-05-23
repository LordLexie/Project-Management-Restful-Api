<?php

namespace App\Http\Requests\v1;

use App\Models\Role;
use App\Models\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        return [
            'name'=>'string|required|max:100',
            'email'=>'string|required|max:100',
            'password'=>'required',
            'role_id'=>['numeric','required',Rule::exists(Role::class,'id')],
        ];
    }
}
