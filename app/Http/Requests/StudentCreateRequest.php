<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
            'name' => 'required|max:100',
            'student_id' => 'required|unique:students|max:10',
            'class_id' => 'required',
            'gender' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Name',
            'student_id' => 'Student ID',
            'class_id' => 'Class',
            'gender' => 'Gender',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'student_id.required' => 'Student ID is required',
            'student_id.max' => 'Student ID maximum :max characters.',
            'class_id.required' => 'Class is required.',
            'gender.required' => 'Gender is required.',
        ];
    }
}
