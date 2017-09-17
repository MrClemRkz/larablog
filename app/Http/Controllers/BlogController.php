<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getSingle($slug){
    	// fetch on the datbase on slug
    	$post = Post::where('slug', '=', $slug)->first();

    	// return the view and pass it on the object
    	return view('blog.single')->withPost($post);
    }
}
