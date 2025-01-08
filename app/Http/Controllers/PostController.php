<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::with('instrument')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'instrument_id' => 'required|exists:instruments,id',
            'duration' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'instrument_id' => $request->instrument_id,
            'instructor_id' => $request->user()->id,
            'duration' => $request->duration,
            'price' => $request->price,
        ]);

        return response()->json($post, 201);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['message' => 'Post deleted successfully']);
    }
}
