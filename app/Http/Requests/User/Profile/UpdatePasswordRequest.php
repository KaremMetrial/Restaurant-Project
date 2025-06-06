<?php

    namespace App\Http\Requests\User\Profile;

    use Illuminate\Contracts\Validation\ValidationRule;
    use Illuminate\Foundation\Http\FormRequest;

    class UpdatePasswordRequest extends FormRequest
    {
        /**
         * Determine if the user is authorized to make this request.
         */
        public function authorize(): bool
        {
            return auth()->id() === $this->user()->id;
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array<string, ValidationRule|array<mixed>|string>
         */
        public function rules(): array
        {
            return [
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ];
        }

        public function messages(): array
        {
            return [
                'current_password.current_password' => 'Current password is incorrect.',
            ];
        }
    }
