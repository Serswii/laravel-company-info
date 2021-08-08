<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Field;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function viewCompany()
    {
        $company = Company::all();
        return view('index', [
            'companies' => $company
        ]);
    }

    public function companyPage($id)
    {
        $fields = array('1', '2', '3', '4', '5', '6');

        $company = Company::find($id);
        return view('company', [
            "company" => $company,
            "fields" => $fields
        ]);
    }
}
