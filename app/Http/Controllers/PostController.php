<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validating the inputs
        $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|max:255',
                'body' => 'required'
            ));

        // storing in the database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;

        try{
            $post->save();
            Session::flash('success', 'The blog post was successfully saved!');
            return redirect()->route('posts.show', $post->id);
        }catch(\Illuminate\Database\QueryException $exception){ // to handle PDOExceptions and give user a understandable reasons
            if(strpos($exception->getMessage(), 'posts_slug_unique') !== false){
                $message = "due to duplicate entry for 'Slug'. Please enter different value.";
            }
            Session::flash('error', 'The blog post was NOT saved, '.$message);
            return redirect()->route('posts.create', $post->id);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|max:255',
                'body' => 'required'
            ));

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');

        try{
            //following is automatically insert value to updated_at column of Posts table
            $post->save();
            Session::flash('success', 'Post successfully updated.');
            return redirect()->route('posts.show', $post->id);
        }catch(\Illuminate\Database\QueryException $exception){ // to handle PDOExceptions and give user a understandable reasons
            if(strpos($exception->getMessage(), 'posts_slug_unique') !== false){
                $message = "due to duplicate entry for 'Slug'. Please enter different value.";
            }
            Session::flash('error', 'The blog post is NOT updated, '.$message);
            return redirect()->route('posts.create', $post->id);
        }

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        $post->delete();

        Session::flash('success', 'Post successfully deleted');

        return redirect()->route('posts.index');

    }
}
