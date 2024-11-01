<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Incorpation;
use Illuminate\Http\Request;

class IncorpationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all records from incorpation table
        $incorpations = Incorpation::all();
        return view('admin.incorpations.index', compact('incorpations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return a view to create a new Incorpation
        return view('admin.incorpations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new Incorpation record
        Incorpation::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Redirect with a success message
        return redirect()->route('admin.incorpations.index')->with('success', 'Incorpation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Incorpation $incorpation)
    {
        // Show details of a specific Incorpation
        return view('admin.incorpations.show', compact('incorpation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incorpation $incorpation)
    {
        // Return a view to edit a specific Incorpation
        return view('admin.incorpations.edit', compact('incorpation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incorpation $incorpation)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update the incorpation record
        $incorpation->update($request->only('title', 'description'));

        // Redirect with a success message
        return redirect()->route('admin.incorpations.index')->with('success', 'Incorpation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incorpation $incorpation)
    {
        // Delete the incorpation record from the database
        $incorpation->delete();

        // Redirect with a success message
        return redirect()->route('admin.incorpations.index')->with('success', 'Incorpation deleted successfully.');
    }
}
