<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CommentsController extends Controller
{

//    public function viewCommentsTitle($id)
//    {
////        if (Auth::check()) {
//            $comment_title = Comment::all()->where('user', "Serswii")->where('id_field', 1)->where('id_company', $id);
//            return response()->json($comment_title);
////        }
//    }
//    public function viewCommentsInn($id)
//    {
////        if (Auth::check()) {
//        $comment_inn = Comment::all()->where('user', "Serswii")->where('id_field', 2)->where('id_company', $id);
//        $comment_telephone = Comment::all()->where('user', "Serswii")->where('id_field', 6)->where('id_company', $id);
//        return response()->json($comment_inn);
////        }
//    }
//    public function viewCommentsDescription($id)
//    {
////        if (Auth::check()) {
//        $comment_description = Comment::all()->where('user', "Serswii")->where('id_field', 3)->where('id_company', $id);
//        return response()->json($comment_description);
////        }
//    }
//
//    public function viewCommentsManager($id)
//    {
////        if (Auth::check()) {
//        $comment_manager = Comment::all()->where('user', "Serswii")->where('id_field', 4)->where('id_company', $id);
//        return response()->json($comment_manager);
////        }
//    }
//    public function viewCommentsAddress($id)
//    {
////        if (Auth::check()) {
//        $comment_address = Comment::all()->where('user', "Serswii")->where('id_field', 5)->where('id_company', $id);
//        return response()->json($comment_address);
////        }
//    }
//    public function viewCommentsTelephone($id)
//    {
////        if (Auth::check()) {
//        $comment_telephone = Comment::all()->where('user', "Serswii")->where('id_field', 6)->where('id_company', $id);
//        return response()->json($comment_telephone);
////        }
//    }

    public function storeComment(Request $request)
    {
//        $date = Carbon::create(null, null, null, nall, null, null, );
        $data = $request->only(['id_user', 'comment', 'id_field', 'id_company']);
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
           'id_user' => $data['id_user'],
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
