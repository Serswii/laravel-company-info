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
        $fields = array('title', 'inn', 'info_description', 'general_manager', 'address', 'telephone');

        $company = Company::find($id);
        return view('company', [
            "company" => $company,
            "fields" => $fields
        ]);
    }
}
