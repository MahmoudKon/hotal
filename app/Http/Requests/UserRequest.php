<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'phone'                 => 'required|string|min:11|max:20|unique:employees,phone|unique:users,phone,' . $this->id,
            'username'              => 'required|string|unique:employees,username|unique:users,username,' . $this->id,
            'email'                 => 'required|email|unique:employees,email|unique:users,email,' . $this->id,
            'personal_id'           => 'required|numeric|unique:users,personal_id,' . $this->id,
            'password'              => $id . 'min:3|max:25|confirmed',
            'password_confirmation' => 'same:password',
        ];
    }
}
