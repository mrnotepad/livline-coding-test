<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

// Custom request class for validating task-related data

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Allow all users to make this request by default
    }

    /**
     * Define validation rules for task input.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:50',       // Title is required, must be a string, max length 50 characters
            'description' => 'nullable|string|max:255', // Description is optional, must be a string, max length 255 characters
        ];
    }

    /**
     * Handle failed validation for the request.
     *
     * @param Validator $validator
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator): void
    {
        // Throw an HTTP exception with a JSON response if validation fails
        throw new HttpResponseException(
            response()->json([
                'status' => 'error', // Indicates validation error
                'message' => 'Validation failed', // General validation error message
                'errors' => $validator->errors(), // Detailed validation errors
            ], 422) // HTTP status code for Unprocessable Entity
        );
    }

    /**
     * Validate the task ID explicitly.
     *
     * @param mixed $id
     * @throws HttpResponseException
     */
    public static function validateTaskId($id): void
    {
        // Ensure the task ID is a valid integer
        if (!is_numeric($id) || (int)$id != $id) {
            throw new HttpResponseException(
                response()->json([
                    'status' => 'error', // Indicates an error
                    'message' => 'Invalid task ID. It should be an integer.', // Error message for invalid ID
                ], 400) // HTTP status code for Bad Request
            );
        }
    }
}