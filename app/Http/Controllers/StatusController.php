<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = Status::all();

        return view('statuses.index', compact('statuses'));
    }

    public function create()
    {
        return view('statuses.create');
    }

    public function store(Request $request)
    {
        $status = new Status();
        $status->name = $request->input('name');
        $status->save();

        return redirect()->route('statuses.index')->with('success', 'Status created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        return view('statuses.show', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        return view('statuses.edit', compact('status'));
    }

    public function update(Request $request, Status $status)
    {
        
        $status->name = $request->name;
        $status->save();
        return redirect()->route('statuses.index')->with('success', 'Status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        // Find all incidences with the given status and set their status_id to null
        \App\Models\Incidence::where('status_id', $status->id)->update(['status_id' => null]);

        // Now, delete the status
        $status->delete();

        return redirect()->route('statuses.index')->with('success', 'Status deleted successfully');
    }
}
