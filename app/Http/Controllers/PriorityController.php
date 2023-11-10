<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priorities = Priority::all();

        return view('priorities.index', compact('priorities'));
    }

    public function create()
    {
        return view('priorities.create');
    }

    public function store(Request $request)
    {
        $priority = new Priority();
        $priority->name = $request->input('name');
        $priority->order = $request->input('order');
        $priority->save();

        return redirect()->route('priorities.index')->with('success', 'Priority created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Priority $priority)
    {
        return view('priorities.show', compact('priority'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Priority $priority)
    {
        return view('priorities.edit', compact('priority'));
    }

    public function update(Request $request, Priority $priority)
    {
        
        $priority->name = $request->name;
        $priority->order = $request->order;
        $priority->updated_at = now();
        $priority->save();
        return redirect()->route('priorities.index')->with('success', 'Priority updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Priority $priority)
    {
        // Find all incidences with the given priority and set their priority_id to null
        \App\Models\Incidence::where('priority_id', $priority->id)->update(['priority_id' => null]);

        // Now, delete the priority
        $priority->delete();

        return redirect()->route('priorities.index')->with('success', 'Priority deleted successfully');
    }

}
