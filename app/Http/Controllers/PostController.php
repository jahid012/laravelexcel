<?php

namespace App\Http\Controllers;

use App\Events\PostCreate;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //Post::first()->delete();
        //Post::onlyTrashed()->restore();
        dd(Post::withTrashed()->get()->toArray());

    }

    public function create()
    {
        return view('add-post');

    }

    public function store(Request $request)
    {


        $request->validate([
            'title' => 'required',
            'body'  => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request ->body;
        $post->user_id = auth()->user()->id;
        $post->save();

        $data = ['title'=>$request->title, 'author' =>auth()->user()->name];

        event(new PostCreate($data));

        return route('dashboard');

    }
}
