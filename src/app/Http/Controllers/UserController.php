<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(): View
    {
        $user = Auth::user();
        $posts = Post::latest()->paginate(4);
        return view('user.profile', ['posts' => $posts]);
    }

    public function home(): View
    {
        $posts = Post::latest()->paginate(4);
        return view('user.home', ['posts' => $posts]);
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('view.login');
    }

}
