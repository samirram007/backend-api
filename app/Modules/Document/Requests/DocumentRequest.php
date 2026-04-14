<?php

namespace App\Modules\Document\Requests;

use App\Enums\DocumentPrivacyLevel;
use App\Enums\DocumentStorageType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DocumentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'files' => ['required', 'array'],
            'files.*' => ['file'],
            'caption' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'storage_type' => ['nullable', Rule::in(DocumentStorageType::getValues())],
            'privacy_level' => ['nullable', Rule::in(DocumentPrivacyLevel::getValues())],
            'description' => ['sometimes', 'required', 'string', 'max:255'],
            'tags' => ['nullable', 'string'],
        ];

        // For update requests, make validation more flexible
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $id = $this->route('document');
            $rules['name'] = ['sometimes', 'required', 'string', 'max:255', 'unique:documents,name,' . $id,];
            $rules['code'] = ['sometimes', 'required', 'string', 'max:255', 'unique:documents,code,' . $id,];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'name.unique' => 'The name has already been taken.',
            'code.required' => 'The code field is required.',
            'code.string' => 'The code must be a string.',
            'code.max' => 'The code may not be greater than 255 characters.',
            'code.unique' => 'The code has already been taken.',
            'description.required   ' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than 255 characters.',
            'status.required' => 'The status field is required.',
            'status.string' => 'The status must be a string.',
        ];
    }
}
