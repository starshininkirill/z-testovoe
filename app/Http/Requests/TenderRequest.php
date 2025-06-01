<?php

namespace App\Http\Requests;

use App\Enums\Tender\TenderStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TenderRequest extends FormRequest
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
        $rules = [];

        if ($this->method() == "GET") {
            $rules = array_merge($rules, [
                'name' => 'sometimes|nullable|string|max:50',
                'date' => 'sometimes|nullable|date|date_format:Y-m-d',
                'per_page' => 'sometimes|integer|max:100|min:1'
            ]);
        } else if ($this->method() == 'POST') {
            $rules = array_merge($rules, [
                'name' => 'required|string|min:3|max:400',
                'status' => [
                    'required',
                    'string',
                    Rule::in(TenderStatusEnum::getStatuses()),
                ],
                'number' => 'required|string|min:1|max:50',
                'external_code' => 'required|integer|min:1|max_digits:19',
            ]);
        }

        return $rules;
    }
}
