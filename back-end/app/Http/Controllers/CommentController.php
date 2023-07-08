<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Get all comments.
     */
    public function get(CommentService $service)
    {
        $comments = Comment::query()
            ->where('post_id', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        $data = $service->buildCommentsTree($comments);

        return response()->json($data);
    }

    /**
     * Store comment.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'parent_id' => 'nullable|integer',
            'user_name' => 'required|string|max:256',
            'content' => 'required|string|max:512',
        ]);
 
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $attributes = $request->all();
        $attributes['post_id'] = 1;
        $attributes['layer'] = 0;

        if (isset($attributes['parent_id'])) {
            $parentComment = Comment::find($attributes['parent_id']);

            if ($parentComment === null) {
                return response()->json(['Parent comment does not exist'], 422);
            }

            $attributes['layer'] = $parentComment->layer + 1;

            if ($attributes['layer'] > CommentService::MAX_LAYERS) {
                return response()->json(['Too much layers'], 422);
            }
        }

        $comment = Comment::create($attributes);

        return response()->json(['comment' => $comment]);
    }
}
