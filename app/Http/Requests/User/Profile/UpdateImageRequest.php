<?php

    namespace App\Http\Requests\User\Profile;

    use Illuminate\Contracts\Validation\ValidationRule;
    use Illuminate\Foundation\Http\FormRequest;

    class UpdateImageRequest extends FormRequest
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
                'avatar' => ['nullable', 'image', 'max:1024', 'mimes:jpeg,png,jpg,gif,svg'],
            ];
        }
    }
