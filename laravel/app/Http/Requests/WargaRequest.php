<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WargaRequest extends FormRequest
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
            'nik_warga' => 'required|max:11',
            'no_kk' => 'required',
            'nm_lengkap' => 'required',
            'nik_warga' => 'required',
            'nm_ayah' => 'required',
            'nm_ibu' => 'required',
            'tgl_lahir' => 'required',
        ];
    }
}
