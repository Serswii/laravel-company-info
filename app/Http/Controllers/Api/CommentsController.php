<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CommentsController extends Controller
{
    public function viewComment()
    {
        
    }
    public function storeComment(Request $request)
    {
        $data = $request->only(['user', 'comment', 'id_field']);
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
            'id_field' => $data['id_field']
        ]);
        return response()->json([
            "status" => true,
            "comment" => $comment
        ])->setStatusCode(201, "Comment is store");
//        $comments = ['id' => $comment->id, 'user' => $data['user'], 'comment' => $data['comment'], 'id_field' => $data['commentField']];
//        return $comments;
    }
}
