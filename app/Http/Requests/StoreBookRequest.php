<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'publication_date' => 'required|date',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'nullable|image',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
