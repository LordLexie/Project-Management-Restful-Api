<?php

namespace App\Http\Requests\V1;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;


class RolePermissionRequest extends FormRequest
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
            'permission_id' => ['required','string','max:255','unique:permissions,name', Rule::exists(Permission::class,'id')],
            'role_id' => ['required','string','max:255','unique:roles,name', Rule::exists(Role::class,'id')],
        ];
    }
}
