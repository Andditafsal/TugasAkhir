<?php

namespace App\Http\Requests\jenissurat;

use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;


use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'kode_surat' => 'required',
            'kode_sekolah' => 'required',
            'tahun_surat' => 'required',
            'name' => 'required',
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
