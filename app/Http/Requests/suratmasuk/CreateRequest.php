<?php

namespace App\Http\Requests\suratmasuk;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;

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
            'nama' => 'required',
            'tanggal' => 'required',
            'alamat_surat' => 'required',
            'perihal_masuk' => 'required',
            'tanggal_surat' => 'required',
            'nomor_masuk' => 'required',
            'dokumen_surat' => 'required|file|mimes:doc,pdf,docx|max:2048',
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