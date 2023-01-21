<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class GetPostController extends Controller
{
    public function index()
    {
        try {
            $posts = Post::with('categorys')->orderBy('id', 'desc')->get();
            return response()->json([
                'success' => true,
                'posts' => $posts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
     public function viewPosts()
    {
        try {
            $posts = Post::where('views', '>', 0)->orderBy('id', 'desc')->get();
            return response()->json([
                'success' => true,
                'posts' => $posts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
        public function getPostById($id)
    {
        try {
            $posts = Post::with('categorys')->findOrFail($id);
            $posts->views = $posts->views + 1;
            $posts->save();
            return response()->json([
                'success' => true,
                'posts' => $posts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
    public function searchPost($search)
    {
        try {
            $posts = Post::where('title', 'LIKE', '%' . $search . '%')->orderBy('id', 'desc')->get();
            return response()->json([
                'success' => true,
                'posts' => $posts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
