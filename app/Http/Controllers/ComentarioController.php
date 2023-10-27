<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Incidence;

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
        $incidence_id = $request->collect('incidence_id')[0];
        
        return view('comentarios.create', ['incidence_id'=>$incidence_id]);
    }
    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
    
        $incidence = Incidence::find($request->incidence_id); // Assuming incidence_id is the field you want to use
        $comentario = new Comentario();
        $comentario->texto = $request->texto;
        $comentario->incidence_id = $incidence->id;
        $comentario->user_id = $user_id;
        $comentario->save();
    
        return redirect()->route('incidences.show', $incidence);
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
        return redirect()->route('incidences.show', ['incidence' => $comentario->incidence_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        $comentario->delete();
        return redirect()->route('comentarios.index');
    }

    public function getUserById($userId)
    {
        // Retrieve the user by ID
        $user = User::find($userId);

        if ($user) {
            $userName = $user->name;
            return "User's name: $userName";
        } else {
            return "User not found";
        }
    }

 
}
