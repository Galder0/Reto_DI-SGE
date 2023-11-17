<?php

namespace App\Http\Controllers;

use App\Models\Incidence;
use App\Models\User;
use App\Models\Category;
use App\Models\Comentario;
use App\Models\Department;
use App\Models\Priority;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IncidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidences = Incidence::latest()->get();
        $incidences->each(function ($incidence) {
            $user = User::find($incidence->user_id);
            $incidence->user_name = $user ? $user->name : 'Unknown User';
            $categoryName = $this->getCategoryName($incidence->category_id);
            $incidence->category_name = $categoryName;
            $departmentName = $this->getDepartmentName($incidence->department_id);
            $incidence->department_name = $departmentName;
        });
        
        return view('incidences.index',['incidences' => $incidences]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        $departments = Department::all();

        $priorities = Priority::all();

        $statuses = Status::all();

        return view('incidences.create', ['categories' => $categories, 'departments' => $departments, 'priorities' => $priorities, 'statuses' => $statuses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'title' => 'required',
        'text' => 'required',
        'estimatedtime' => 'required|numeric',
        'department_id' => 'required|exists:departments,id', // Adjust the validation rule as needed
        'category_id' => 'required|exists:categories,id',   // Adjust the validation rule as needed
        'priority_id' => 'required|exists:priorities,id',   // Adjust the validation rule as needed
        'status_id' => 'required|exists:statuses,id',       // Adjust the validation rule as needed
    ]);

    $user_id = Auth::id();

    // Create a new incidence instance
    $incidence = new Incidence();

    // Set the attributes from the request
    $incidence->title = $request->input('title');
    $incidence->text = $request->input('text');
    $incidence->estimatedtime = $request->input('estimatedtime');
    $incidence->user_id = $user_id;
    $incidence->department_id = $request->input('department_id');
    $incidence->category_id = $request->input('category_id');
    $incidence->priority_id = $request->input('priority_id');
    $incidence->status_id = $request->input('status_id');

    // Save the incidence if all attributes are set
    $incidence->save();

    return redirect()->route('incidences.index')->with('success', 'Incidence created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(Incidence $incidence)
    {
        
        $user = User::find($incidence->user_id);
        $incidence->user_name = $user ? $user->name : 'User not avaliable';

        $currentUser = Auth::user();
        $incidence->user_department = $currentUser ? $currentUser->department_id : 'Department not avaliable';
    
        $categoryName = $this->getCategoryName($incidence->category_id);
        $incidence->category_name = $categoryName;

        $departmentName = $this->getDepartmentName($incidence->department_id);
        $incidence->department_name = $departmentName;
    
        // Retrieve comments associated with the $incidence using its ID
        $comentarios = Comentario::where('incidence_id', $incidence->id)->get();
    
        // Loop through comments to find and set user names for each comment
        foreach ($comentarios as $comentario) {
            $user2 = User::find($comentario->user_id);
            $comentario->user_name = $user2 ? $user2->name : 'Unknown User';
        }
    
        return view('incidences.show', ['incidence' => $incidence, 'comentarios' => $comentarios]);
    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incidence $incidence)
    {
        if (auth()->user()->id !== $incidence->user_id) {
            // If not, deny access and show an error message or redirect as needed
            return redirect()->route('incidences.index')->with('error', 'You do not have permission to edit this incidence.');
        }
        $categories = Category::all();
        $priorities = Priority::all();
        $departments = Department::all();
        $statuses = Status::all();
        return view('incidences.edit',['incidence'=>$incidence, 'categories'=>$categories, 'priorities'=>$priorities, 'departments' => $departments, 'statuses' => $statuses]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incidence $incidence)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'estimatedtime' => 'required|numeric',
            'department_id' => 'required|exists:departments,id', // Adjust the validation rule as needed
            'category_id' => 'required|exists:categories,id',   // Adjust the validation rule as needed
            'priority_id' => 'required|exists:priorities,id',   // Adjust the validation rule as needed
            'status_id' => 'required|exists:statuses,id',       // Adjust the validation rule as needed
        ]);

        $user_id = Auth::id();

        // Set the attributes from the request
        $incidence->title = $request->input('title');
        $incidence->text = $request->input('text');
        $incidence->estimatedtime = $request->input('estimatedtime');
        $incidence->user_id = $user_id;
        $incidence->priority_id = $request->input('priority_id');
        $incidence->department_id = $request->input('department_id');
        $incidence->category_id = $request->input('category_id');
        $incidence->status_id = $request->input('status_id');
        $incidence->updated_at = now();

        // Save the updated incidence
        $incidence->save();

        return redirect()->route('incidences.index')->with('success', 'Incidence edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incidence $incidence)
{
    if (auth()->user()->id !== $incidence->user_id) {
        // If not, deny access and show an error message or redirect as needed
        return redirect()->route('incidences.index')->with('error', 'You do not have permission to delete this incidence.');
    }

    // Add the logic to delete the incidence here
    $incidence->delete();

    return redirect()->route('incidences.index')->with('success', 'Incidence deleted successfully.');
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
            return 'Category not avaliable';
        }
    }
    public function getDepartmentName($departmentId)
    {
        // Retrieve the department by ID
        $department = Department::find($departmentId);

        if ($department) {
            $departmentName = $department->depname;
            return "$departmentName";
        } else {
            return "Department not found";
        }
    }
}
