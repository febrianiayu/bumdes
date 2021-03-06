<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TokoSave extends FormRequest
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
            'nama_toko' => 'Required',
            'alamat' => 'Required',
            'petugas' => 'Required',
        ];
    }
    public function messages()
    {
        return[
        'nama_toko.required' => 'Nama Toko tidak boleh kosong',
        'alamat.required' => 'Alamat tidak boleh kosong',
        'petugas.required' => 'Petugas tidak boleh kosong', 
        ];
    }
}
