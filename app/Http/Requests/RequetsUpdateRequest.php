<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequetsUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'location'=> 'required','string',
            'service'=> 'required','string',
            'status'=> 'string',
            'priority'=> 'string',
            'department'=> 'required','string',
            'requested_by'=> 'required','string',
            'assigned_by'=> 'required','string',
        ];
    }
}
