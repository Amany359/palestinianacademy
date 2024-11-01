<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoordDirector;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;

class BoordDirectorController extends Controller
{
    use UploadImageTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all records from boord_directors table
        $boordDirectors = BoordDirector::all();
        return view('admin.boord_directors.index', compact('boordDirectors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return a view to create a new BoordDirector
        return view('admin.boord_directors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'nullable',
        ]);

        // Handle image upload if present
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = $this->uploadImage($request->file('image'));
        }

        // Create a new BoordDirector record
        BoordDirector::create([
            'title' => $request->title,
            'image' => $imageName,
            'description' => $request->description,
        ]);

        // Redirect with a success message
        return redirect()->route('admin.boordDirectors.index')->with('success', 'Boord Director created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BoordDirector $boordDirector)
    {
        // Show details of a specific BoordDirector
        return view('admin.boord_directors.show', compact('boordDirector'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BoordDirector $boordDirector)
    {
        // Return a view to edit a specific BoordDirector
        return view('admin.boord_directors.edit', compact('boordDirector'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BoordDirector $boordDirector)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Validate image file
            'description' => 'nullable',
        ]);

        // Handle image replacement if a new one is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($boordDirector->image) {
                $this->deleteImage($boordDirector->image);
            }

            // Upload the new image and store its filename
            $imageName = $this->uploadImage($request->file('image'));
            $boordDirector->image = $imageName;
        }

        // Update the other fields
        $boordDirector->update($request->only('title', 'description'));

        // Redirect with a success message
        return redirect()->route('admin.boordDirectors.index')->with('success', 'Boord Director updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BoordDirector $boordDirector)
    {
        // Delete the image file if it exists
        if ($boordDirector->image) {
            $this->deleteImage($boordDirector->image);
        }

        // Delete the BoordDirector record from the database
        $boordDirector->delete();

        // Redirect with a success message
        return redirect()->route('admin.boordDirectors.index')->with('success', 'Boord Director deleted successfully.');
    }
}
