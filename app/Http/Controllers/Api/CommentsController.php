<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CommentsController extends Controller
{
    public function viewComments($id)
    {
        $comment_title = Comment::all()->where('id_field', 1)->where('id_company', $id);
        $comment_inn = Comment::all()->where('id_field', 2)->where('id_company', $id);
        $comment_description = Comment::all()->where('id_field', 3)->where('id_company', $id);
        $comment_manager = Comment::all()->where('id_field', 4)->where('id_company', $id);
        $comment_address = Comment::all()->where('id_field', 5)->where('id_company', $id);
        $comment_telephone = Comment::all()->where('id_field', 6)->where('id_company', $id);
        return response()->json([
            'comment_titles' => $comment_title,
            'comment_inns' => $comment_inn,
            'comment_descriptions' => $comment_description,
            '$comment_managers' => $comment_manager,
            '$comment_addresses' => $comment_address,
            '$comment_telephones' => $comment_telephone
        ]);
    }

    public function storeComment(Request $request)
    {
//        $date = Carbon::create(null, null, null, nall, null, null, );
        $data = $request->only(['user', 'comment', 'id_field', 'id_company']);
        $validator = Validator::make($data, [
            "comment" => ['required', 'string'],
        ]);

        if($validator->fails()){
            return response()->json([
                "status" => false,
                "errors" => $validator->messages()
            ])->setStatusCode(422);
        }
       $comment = Comment::create([
           'user' => $data['user'],
           'comment' => $data['comment'],
           'id_field' => $data['id_field'],
           'id_company' => $data['id_company'],
//           'created_at' => $date
        ]);
        return response()->json([
            "status" => true,
            "comment" => $comment
        ])->setStatusCode(201, "Comment is store");
//        $comments = ['id' => $comment->id, 'user' => $data['user'], 'comment' => $data['comment'], 'id_field' => $data['commentField']];
//        return $comments;
    }
}
