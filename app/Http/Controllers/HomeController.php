<?php

namespace App\Http\Controllers;

use App\Models\Incidence;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        $incidences = Incidence::latest()->get();
        $incidences->each(function ($incidence) {
            $user = User::find($incidence->user_id);
            $incidence->user_name = $user ? $user->name : 'Unknown User';
            $categoryName = $this->getCategoryName($incidence->category_id);
            $incidence->category_name = $categoryName;
        });
       
        return view('home', ['incidences' => $incidences]);
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