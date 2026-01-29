<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'nullable|string',
            'price' => 'required|decimal:0,2|max:999999.99|gt:0',
            'category_id' => 'nullable|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "Название" обязательно для заполнения.',
            'description.nullable' => 'Поле "Описание" м.б. нулевым',
            'description.string' => 'Поле "Описание" м.б. строковое',
            'price.gt' => 'Поле "Цена" должно больше нуля',
            'price.required' => 'Поле "Цена" обязательно для заполнения.',
            'price.decimal' => 'Поле "Цена" содержит десятичные от 0 до 2',
            'price.max' => 'Поле "Цена"  больше 999999.99',
            'category_id.required' => 'Поле "Категория" обязательно для заполнения.',
            'category_id.exists' => 'Категория не существует.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        if (Str::startsWith($this->route()->uri(), 'api/')) {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'message' => 'Ошибка валидации',
                'errors' => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY));
        }
        parent::failedValidation($validator);
    }
}
