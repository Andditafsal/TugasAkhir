<?php

namespace App\Http\Requests\suratkeluar;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class CreateRequest extends FormRequest
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

            // 'dokumen_surat' => 'required|file|mimes:doc,pdf,docx|max:2048',


            'jenis_surat_id' => 'required',
            'perihal' => 'required',
            'lampiran' => 'file|mimes:pdf|max:2048',
            'kepada' => 'required',
            'tanggal_surat' => 'required',
            'nama_kegitan' => '',
            'hari_kegiatan' => '',
            'tanggal_kegiatan' => '',
            'waktu_mulai_kegiatan' => '',
            'waktu_selesai_kegiatan' => '',
            'tempat_kegiatan' => '',
            'catatan_kegiatan' => '',
            'masalah_kegiatan' => '',
            'nama_industri' => '',
            'alamat_industri' => '',
            'kelas_siswa' => '',
            'jurusan_siswa' => '',
            'tahun_ajaran' => '',
            'nip' => '',
            'pangkat'  => '',
            'jabatan'  => '',
            'gol'  => '',
            'nama_ortu' => '',
            'kelas_siswa' => '',


        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $response = new JsonResponse([
            'messages' => $validator->errors(),
            'status_code' => 422
        ], 422);
        throw new ValidationException($validator, $response);
    }
}
