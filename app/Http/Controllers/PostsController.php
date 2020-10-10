<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use \App\Models\Post;

class PostsController extends Controller
{
    
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$users = auth()->user()->following()->pluck('profiles.user_id');

		$posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
		
		return view('posts.index', compact('posts'));
	}

	public function create()
	{
		return view('posts.create');
	}

	public function show(Post $post)
	{
		return view('posts.show', [
			'post' => $post,
		]);
		// return view('posts.show', compact('post'));
		// to make it shorter (passing the value to the model)
	}

	public function store()
	{
		$data = request()->validate([
			// for the fields that isn't necessarily be validated just 
			// leave blank its assignment value as below
			// 'willnotbevalidated' => '',
			'caption' => 'required',
			'image' => ['required', 'image'],
		]);

		$imagePath = request('image')->store('uploads', 'public');

		$image = Image::make(public_path("storage/{$imagePath}"))->fit(400,400);
		$image->save();

		// \App\Models\Post::create($data);
		auth()->user()->posts()->create([
			'caption' => $data['caption'],
			'image' => $imagePath,
		]);


		return redirect('/profile/' . auth()->user()->id);
	}


}
