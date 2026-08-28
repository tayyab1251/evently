<?php

namespace App\Http\Requests\Event;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class CreateEventRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:150'],

            'category_id' => ['required', 'integer', 'exists:categories,id'],

            'description' => ['required', 'string', 'min:20', 'max:5000'],

            'location_name' => ['required', 'string', 'min:2', 'max:150'],

            'address' => ['required', 'string', 'min:5', 'max:500'],

            'city_id' => ['required', 'exists:cities,id'],

            // 'latitude' => ['nullable', 'numeric', 'between:-90,90'],

            // 'longitude' => ['nullable', 'numeric', 'between:-180,180'],

            'map_url' => ['nullable', 'url', 'max:2048'],

            'type' => ['required', 'in:free,paid'],

            'price' => ['required_if:type,paid', 'nullable', 'numeric', 'min:0', 'max:99999999.99'],

            'start_at' => ['required', 'date'],

            'end_at' => ['required', 'date', 'after:start_at'],

            'max_attendees' => ['required', 'integer', 'min:1', 'max:1000000'],

            'primary_image' => ['image', 'mimes:jpg,jpeg,png', 'max:2048'],

            'cover_image' => ['image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    // Define custome messages for category_id validation failure
    #[Override]
    public function messages()
    {
        return [
            'category_id.required' => 'The category field is required.',
            'category_id.integer' => 'The category field must be an integer.',
            'category_id.exists' => 'The category does not exist in system.',

            'city_id.required'  => 'The city field is required.',
            'city_id.exists' => 'The city does not exist in system.',

        ];
    }
}
