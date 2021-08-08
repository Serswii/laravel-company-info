<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:companies',
            'inn' => 'required|unique:companies|integer',
            'address', 'telephone', 'description', 'manager' => 'required',
            'telephone' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'required' => "Введите данные в поле :attribute",
            'title.unique' => "Такая компания уже существует",
            'inn.unique' => "Такой ИНН уже существует",
            'telephone.integer' => "Введены некоректные данные"
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'Компания',
            'inn' => 'ИНН',
            'description' => 'Описания',
            'telephone' => 'Телефон',
            'manager' => 'Генеральный директор',
            'address' => 'Адрес'
        ];
    }
}
