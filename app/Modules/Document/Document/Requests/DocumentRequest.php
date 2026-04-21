<?php

namespace App\Modules\Document\Document\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'files' => 'required|array',
            'files.*' => 'file|max:10240|mimes:jpeg,png,avif,gif,pdf,doc,docx,xls,xlsx,ppt,pptx,txt',
        ];

        // For update requests, make validation more flexible
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {

        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'files.required' => 'Please upload at least one file.',
            'files.array' => 'The files must be an array.',
            'files.*.file' => 'Each item must be a valid file.',
            'files.*.max' => 'Each file must not exceed 10MB in size.',
            'files.*.mimes' => 'Allowed file types are: jpeg, png, avif, gif, pdf, doc, docx, xls, xlsx, ppt, pptx, txt.',
        ];

    }
}
