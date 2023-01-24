<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        $posts=Post::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(8);
        return view('dashboard', compact('posts'));
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'titulo'=>['required', 'string', 'min:3', 'unique:posts,titulo'],
            'contenido'=>['required', 'string', 'min:5', 'max:250'],
            'estado'=>['required', 'in:Publicado,Borrador'],
            'imagen'=>['required', 'image']
        ]);
        $imagen=$request->imagen->store('posts');
        Post::create([
            'titulo'=>$request->titulo,
            'slug'=>Str::slug($request->titulo),
            'imagen'=>$imagen,
            'contenido'=>$request->contenido,
            'user_id'=>auth()->user()->id,
            'estado'=>$request->estado
        ]);
        return redirect()->route('dashboard')->with('info', 'Se guardó el post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'titulo'=>['required', 'string', 'min:3', 'unique:posts,titulo,'.$post->id],
            'contenido'=>['required', 'string', 'min:5', 'max:250'],
            'estado'=>['required', 'in:Publicado,Borrador'],
            'imagen'=>['nullable', 'image']
        ]);
        
        $imagen=($request->imagen)? $request->imagen->store('posts') : $post->imagen;
        $imagen1=$post->imagen;
       
        $post->update([
            'titulo'=>$request->titulo,
            'slug'=>Str::slug($request->titulo),
            'imagen'=>$imagen,
            'contenido'=>$request->contenido,
            'user_id'=>auth()->user()->id,
            'estado'=>$request->estado
        ]);

        if($request->imagen) Storage::delete($imagen1);
        
        return redirect()->route('dashboard')->with('info', 'Se Editó el post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->imagen);
        $post->delete();
        return redirect()->route('dashboard')->with('info', 'Post Borrado');
    }
}
