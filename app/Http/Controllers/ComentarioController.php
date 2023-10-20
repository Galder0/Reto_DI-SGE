<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\Post;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //TODO: mirar esto y hacerlo mejor
        $post_id = $request->collect('post_id')[0];

        return view('comentarios.create', ['post_id'=>$post_id]);
    }
    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = Post::find($request->post_id);
        $comentario = new Comentario();
        $comentario->texto = $request->texto;
        $comentario->post_id = $post->id;
        $comentario->save();
        return redirect()->route('posts.show',$post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        return view('comentarios.edit',['comentario'=>$comentario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {   
        
        $comentario->texto = $request->texto;
        $comentario->save();
        return redirect()->route('posts.show', ['post' => $comentario->post_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        //
    }

 
}
