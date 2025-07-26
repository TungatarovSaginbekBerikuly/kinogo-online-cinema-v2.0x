<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\CommentLike;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|min:10|max:500',
            'film_id' => 'required|exists:films,id',
        ]);

        $comment = Comment::create([
            'message' => $validated['message'],
            'film_id' => $validated['film_id'],
            'user_id' => auth()->id(),
        ]);

        $comment->load('user');

        return redirect()->back()->with('success', 'Комментарий добавлен!');
    }

    public function like(Comment $comment)
    {
        $userId = auth()->id();

        CommentLike::updateOrCreate(
            ['comment_id' => $comment->id, 'user_id' => $userId],
            ['is_like' => true]
        );

        return back(); // или response()->json([...]) если используешь AJAX
    }

    public function dislike(Comment $comment)
    {
        $userId = auth()->id();

        CommentLike::updateOrCreate(
            ['comment_id' => $comment->id, 'user_id' => $userId],
            ['is_like' => false]
        );

        return back(); // можно redirect()->back() или return response()
    }

    public function undo(Comment $comment)
    {
        $userId = auth()->id();

        CommentLike::where('comment_id', $comment->id)
                   ->where('user_id', $userId)
                   ->delete();

        return back();
    }
}
