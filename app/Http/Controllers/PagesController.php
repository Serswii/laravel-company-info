<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Company;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function viewCompany()
    {
        $company = Company::all();
        return view('index', [
            'companies' => $company
        ]);
    }
    public function viewComments($id)
    {
        if (Auth::check()) {
            $comments = Comment::all()->where('id_user', Auth::id())->where('id_company', $id);
            return $comments;
        }
    }

    public function companyPage($id)
    {
        $field = new PagesController();
        $comments = $field->viewComments($id);
        $fields = array('1', '2', '3', '4', '5', '6');
        if (Auth::check()) {
            $count_id1 = Comment::where('id_user', Auth::id())->where('id_field', 1)->where('id_company', $id)->count();
            $count_id2 = Comment::where('id_user', Auth::id())->where('id_field', 2)->where('id_company', $id)->count();
            $count_id3 = Comment::where('id_user', Auth::id())->where('id_field', 3)->where('id_company', $id)->count();
            $count_id4 = Comment::where('id_user', Auth::id())->where('id_field', 4)->where('id_company', $id)->count();
            $count_id5 = Comment::where('id_user', Auth::id())->where('id_field', 5)->where('id_company', $id)->count();
            $count_id6 = Comment::where('id_user', Auth::id())->where('id_field', 6)->where('id_company', $id)->count();
            $company = Company::find($id);
            return view('company', [
                "company" => $company,
                "fields" => $fields,
                'count_id1' => $count_id1,
                'count_id2' => $count_id2,
                'count_id3' => $count_id3,
                'count_id4' => $count_id4,
                'count_id5' => $count_id5,
                'count_id6' => $count_id6,
                'comments' => $comments
            ]);
        }
            $company = Company::find($id);
            return view('company', [
                "company" => $company,
                "fields" => $fields,
            ]);
    }
}
