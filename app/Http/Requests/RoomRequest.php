<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'number'        => 'required|unique:rooms,number,' . $this->id,
            'info'          => 'required|string|min:5',
            'people_count'  => 'required|integer|between:2,9',
            'price'         => 'required',
            'floor_id'      => 'required|exists:floors,id',
            'image.*'       => 'image|mimes:png,jpg,jpeg',
        ];
    }
}
