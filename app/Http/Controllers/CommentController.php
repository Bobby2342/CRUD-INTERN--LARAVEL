<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function commentSubmit(Request $request)
    {

        $request->validate([

            'comment_body'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imagePath = $request->file('image')->store('images', 'public');


        $input = [
            'comment_body' => $request->input('comment_body'),
            'user_id' => auth()->user()->id,
            'product_id' => $request->input('product_id'),
            'image' => ''.$imagePath,

        ];

        $parentId = $request->input('parent_id');
        if ($parentId) {
            $parentComment = Comment::findOrFail($parentId);
            $comment = $parentComment->replies()->create($input);
        } else {
            $comment = Comment::create($input);
        }
        return back();
    }


}
