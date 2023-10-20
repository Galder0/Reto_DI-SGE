<?php

namespace App\Http\Controllers;

use App\Models\Incidence;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidences = Incidence::all();
        $incidences->each(function ($incidence) {
            $user = User::find($incidence->user_id);
            $incidence->user_name = $user ? $user->name : 'Unknown User';
            $categoryName = $this->getCategoryName($incidence->category_id);
            $incidence->category_name = $categoryName;
        });
        return view('incidences.index',['incidences' => $incidences]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('incidences.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user_id = Auth::id();

        $incidence = new Incidence();
        $incidence->title = $request->input('title');
        $incidence->text = $request->input('text');
        $incidence->estimatedtime = $request->input('estimatedtime');
        $incidence->user_id = $user_id;
        $incidence->category_id = $request->input('category_id');
        $incidence->save();

        return redirect()->route('incidences.index')->with('success', 'Incidence created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Incidence $incidence)
    {
        $user = User::find($incidence->user_id);
            $incidence->user_name = $user ? $user->name : 'Unknown User';
            $categoryName = $this->getCategoryName($incidence->category_id);
            $incidence->category_name = $categoryName;
        return view('incidences.show',['incidence'=>$incidence]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incidence $incidence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incidence $incidence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incidence $incidence)
    {
        //
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
    public function getCategoryName($categoryId)
    {
        // Retrieve the category by ID
        $category = Category::find($categoryId);

        if ($category) {
            return $category->name;
        } else {
            return 'Unknown Category';
        }
    }
}
