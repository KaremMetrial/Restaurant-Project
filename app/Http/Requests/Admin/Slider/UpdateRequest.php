<?php

    namespace App\Http\Requests\Admin\Slider;

    use Illuminate\Contracts\Validation\ValidationRule;
    use Illuminate\Foundation\Http\FormRequest;

    class UpdateRequest extends FormRequest
    {
        /**
         * Determine if the user is authorized to make this request.
         */
        public function authorize(): bool
        {
            return auth()->user()->role === 'admin';
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array<string, ValidationRule|array<mixed>|string>
         */
        public function rules(): array
        {
            return [
                'image' => ['nullable', 'image', 'max:1024', 'mimes:jpeg,png,jpg,gif,svg'],
                'title' => ['nullable', 'string', 'max:255'],
                'offer' => ['nullable', 'string', 'max:255'],
                'sub_title' => ['nullable', 'string', 'max:255'],
                'short_description' => ['nullable', 'string', 'max:255'],
                'link' => ['nullable', 'string', 'max:255'],
                'status' => ['boolean'],
            ];
        }
    }
