<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Incidence;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('departments.index',['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $department = new Department();
        $department->depname = $request->depname;
        $department->save();
        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('departments.show',['department'=>$department]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('departments.edit',['department'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $department->depname = $request->depname;
        $department->updated_at = now();
        $department->save();
        return view('departments.show',['department'=>$department]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        // Check if the department has associated incidences
        if ($department->incidences()->count() > 0) {
            return redirect()->route('departments.index')
                ->with('error', 'This department cannot be deleted as it has associated incidences.');
        }
    
        // If there are no associated incidences, proceed with deletion
        $department->delete();
    
        return redirect()->route('departments.index')
            ->with('success', 'Department deleted successfully.');
    }
}
