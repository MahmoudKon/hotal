<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        $id = isset($this->id) ? 'nullable|' : 'required|';
        return [
            'phone'                 => 'required|string|min:11|max:20|unique:users,phone|unique:employees,phone,' . $this->id,
            'username'              => 'required|string|unique:users,username|unique:employees,username,' . $this->id,
            'email'                 => 'required|email|unique:users,email|unique:employees,email,' . $this->id,
            'personal_id'           => 'required|numeric|unique:employees,personal_id,' . $this->id,
            'address'               => 'required|string|min:5',
            'birthday'              => 'required|before:today',
            'password'              => $id . 'min:3|max:25|confirmed',
            'password_confirmation' => 'same:password',
            'image'                 => 'image|mimes:png,jpg,jpeg,gif,size:4020',
            'role'                  => 'required|exists:roles,name'
        ];
    }
}
