<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function storeCompany(Request $request)
    {
        $data = $request->only(['title', 'inn', 'info_description', 'general_manager', 'address', 'telephone']);
        $rules = [
            'title' => 'required|unique:companies',
            'inn' => 'required|unique:companies|integer',
            'manager' => 'required',
            'telephone' => 'required|integer',
            'address' => 'required',
            'description' => 'required'
        ];
        $validator = Validator::make($data, $rules, $messages = [
            'required' => 'Обязательное заполнение поля',
            "integer" => "Введите цифры в поле",
            'title.unique' => "Такая компания уже существует",
            'inn.unique' => "Такой ИНН уже существует"
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $validator->messages()
            ])->setStatusCode(422);
        }
        $company = Company::create([
            'title' => $data['title'],
            'inn' => $data['inn'],
            'info_description' => $data['info_description'],
            'general_manager' => $data['general_manager'],
            'address' => $data['address'],
            'telephone' => $data['telephone']
        ]);

        return response()->json([
            "status" => true,
            "company" => $company
        ])->setStatusCode(201, "Company is store");
    }
}


