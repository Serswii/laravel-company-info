<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{

    public function store(StoreCompanyRequest $request)
    {
        $data = $request->only(['title', 'inn', 'description', 'manager', 'address', 'telephone']);
        $company = Company::create([
            'title' => $data['title'],
            'inn' => $data['inn'],
            'info_description' => $data['description'],
            'general_manager' => $data['manager'],
            'address' => $data['address'],
            'telephone' => $data['telephone']
        ]);

        if ($company){
            return redirect()->back();
        }
    }
}
