<?php

    namespace App\Http\Requests\User\Profile;

    use Illuminate\Contracts\Validation\ValidationRule;
    use Illuminate\Foundation\Http\FormRequest;

    class UpdateRequest extends FormRequest
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
                'name' => ['required', 'string', 'max:255'],
                'avatar' => ['nullable', 'image', 'max:1024', 'mimes:jpeg,png,jpg,gif,svg'],
                'email' => [
                    'required',
                    'string',
                    'lowercase',
                    'email',
                    'max:255',
                    'unique:users,email,' . $this->user()->id
                ],
            ];
        }
    }
