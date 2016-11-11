<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' => 'required|max:255',
            'rt' => 'required|max:5',
            'rw' => 'required|max:5',
            'kelurahan' => 'required|max:128',
            'kecamatan' => 'required|max:128',
            'kota' => 'required|max:128',
            'provinsi' => 'required|max:128',
            'no_hp' => 'required|max:15',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
        ];
    }
}
