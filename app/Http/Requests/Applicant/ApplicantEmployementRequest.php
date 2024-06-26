<?php

namespace App\Http\Requests\Applicant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class ApplicantEmployementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return in_array(Auth::user()->position_id, [1, 2]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|min:3',
            'middle_name' => 'required|string',
            'last_name' => 'required|string|min:3',
            'gender' => 'required|in:M,F',
            'age' => 'integer|required|max:200',
            'address' => 'string|required',
            'birthday' => 'required',
            'phone' => 'string|min:11|required',
            'email' => 'string|required|email',
            'image' => 'file|nullable|max:10240',
            'position_id' => 'required|integer',
            'notes' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First Name is required',
            'middle_name.required' => 'Middle Name is Required',
            'last_name.required' => 'Last Name is required',
            'gender.required' => 'Gender is required',
            'gender.in' => 'Gender must be in options',
            'age.required' => 'Age is required',
            'age.max' => 'Age must not exceed 200',
            'address.required' => 'Address is required',
            'phone.required' => 'Phone number is required',
            'phone.min' => 'Phone number must at least 11 length',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be valid',
            'image.max' => 'Image must not exceed 6MB',
            'position_id.required' => 'Position is required'
        ];
    }
}