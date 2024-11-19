<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:50',       // Required field, max 50 characters
            'description' => 'nullable|string|max:255', // Optional field, max 255 characters
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422)
        );
    }


    /**
     * Validate the task ID.
     */
    public static function validateTaskId($id): void
    {
        if (!is_numeric($id) || (int)$id != $id) {
            throw new HttpResponseException(
                response()->json([
                    'status' => 'error',
                    'message' => 'Invalid task ID. It should be an integer.',
                ], 400)
            );
        }
    }
}