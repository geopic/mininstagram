<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        return view('dashboard', [
            'posts' => $this->getUserPosts($request)
        ]);
    }

    /**
     * Fetch all posts for the user's dashboard.
     */
    public function getUserPosts($userId): View
    {
        $user = User::findOrFail($userId); // Retrieve the user or fail if not found
        $posts = $user->posts; // Use the relationship to get the posts

        return view('posts.user_posts', ['user' => $user, 'posts' => $posts]);
    }
}
