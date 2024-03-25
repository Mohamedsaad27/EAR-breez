<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'subtitle' => 'string|max:255',
            'description' => 'string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric|min:0',
            'offer' => 'nullable|numeric|min:0|max:80',
            'color' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'category_id' => 'required|string|max:255',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title field must be a string.',
            'title.max' => 'The title may not be greater than :max 255 characters.',
            'subtitle.string' => 'The subtitle field must be a string.',
            'subtitle.max' => 'The subtitle may not be greater than :max 255 characters.',
            'description.string' => 'The description field must be a string.',
            'quantity.required' => 'The quantity field is required.',
            'quantity.integer' => 'The quantity field must be an integer.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price field must be a number.',
            'price.min' => 'The price must be at least :min.',
            'offer.numeric' => 'The offer field must be a number.',
            'offer.max' => 'The offer may not be greater than :80 max.',
            'color.required' => 'The color field is required.',
            'color.string' => 'The color field must be a string.',
            'color.max' => 'The color may not be greater than :max 255 characters.',
            'size.required' => 'The size field is required.',
            'size.string' => 'The size field must be a string.',
            'size.max' => 'The size may not be greater than :max 255 characters.',
            'category.required' => 'The category field is required.',
            'category.string' => 'The category field must be a string.',
            'category.max' => 'The category may not be greater than :max 255 characters.',

            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than :max 2048 kilobytes.',
        ];
    }

}
