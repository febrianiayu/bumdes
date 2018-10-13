<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangSave extends FormRequest
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
        'id_barang' =>'Required',
        'nama_barang' =>'Required', 
        'jenis' => 'Required',
        'satuan' => 'Required',
        'harga_beli' => 'Required|integer|between:1,10000000',
        'harga' => 'Required|integer|between:1,10000000',
        'stok' => 'Required|integer|between:1,10000000',
        ];
    }

    public function messages()
    {
        return[
        'id_barang.required' => 'Id Barang tidak boleh kosong',
        'nama_barang.required' =>'Nama tidak boleh kosong',
        'jenis.required' =>'Jenis tidak boleh kosong',
        'satuan.required' => 'Satuan tidak boleh kosong',
        'harga_beli.required' => 'Harga Beli tidak boleh kosong',
        'harga_beli.between' => 'Harga Beli tidak boleh negatif',
        'harga.required' => 'Harga Jual tidak boleh kosong',
        'harga.between' => 'Harga Jual tidak boleh negatif',
        'stok.required' => 'Stok tidak boleh kosong',
        'stok.between' => 'Stok tidak boleh negatif',
        ];
    }
}
