<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\CommentType;

class MedicalCommentRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'texto' => ['required', 'string', 'max:5000'],
            'categoria' => ['required', new Enum(CommentType::class)],
        ];
    }
}
