<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiUpdate extends FormRequest
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
            'toko' => 'Required',
            'transaksi' => 'Required',
        ];
    } 

    public function messages()
    {
        return [
        'toko.required' => 'Nama Toko tidak boleh kosong',
        'transaksi.required' => 'Nama Petugas Toko tidak boleh kosong',
        ];
    }
}
