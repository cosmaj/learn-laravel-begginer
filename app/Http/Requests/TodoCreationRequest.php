<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoCreationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    //Form rules to be checked
    public function rules()
    {
        return [
            'title' => 'required|max:255',
        ];
    }

    // Custom error messages
    public function messages(){
        return [
            'title.required' => 'Todo Title is required',
            'title.max' => 'Todo title should not exceed 255 chars',
        ];
    }
}
