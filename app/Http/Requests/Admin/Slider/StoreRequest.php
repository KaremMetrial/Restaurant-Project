<?php

    namespace App\Http\Requests\Admin\Slider;

    use Illuminate\Contracts\Validation\ValidationRule;
    use Illuminate\Foundation\Http\FormRequest;

    class StoreRequest extends FormRequest
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
                'image' => ['required', 'image', 'max:1024', 'mimes:jpeg,png,jpg,gif,svg'],
                'title' => ['required', 'string', 'max:255'],
                'offer' => ['nullable', 'string', 'max:255'],
                'sub_title' => ['required', 'string', 'max:255'],
                'short_description' => ['required', 'string', 'max:255'],
                'link' => ['nullable', 'string', 'max:255'],
                'status' => ['boolean'],
            ];
        }
    }
