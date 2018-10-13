<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiSave extends FormRequest
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
            'petugas' => 'Required',
            'toko' => 'Required',
            
        ];
    }

    public function messages()
    {
        return [
        'petugas.required' => 'Nama Petugas Toko tidak boleh kosong',
        'toko.required' => 'Nama Toko tidak boleh kosong',
       
        ];
    }
}
