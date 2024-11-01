<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discard; 
use App\Traits\UploadImageTrait;
class DiscardController extends Controller
{
   
    
        use UploadImageTrait;
    
        public function index()
        {
            $discards = Discard::all();
            return view('admin.discard.index', compact('discards'));
        }
    
        public function create()
        {
            return view('admin.discard.create');
        }
    
        public function store(Request $request)
        {
            $validated = $request->validate([
                'title' => 'nullable|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'nullable|string',
            ]);
    
            // Handle image upload
            if ($request->hasFile('image')) {
                $validated['image'] = $this->uploadImage($request->file('image'), 'topicImages');
            }
    
            // Create new discard with validated data
            Discard::create($validated);
    
            return redirect()->route('admin.discard.index')->with('success', 'Discard created successfully.');
        }
    
        public function edit(Discard $discard)
        {
            return view('admin.discard.edit', compact('discard'));
        }
    
        public function update(Request $request, Discard $discard)
        {
            $validated = $request->validate([
                'title' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'nullable|string',
            ]);
    
            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($discard->image) {
                    $this->deleteImage($discard->image, 'topicImages');
                }
    
                // Upload the new image
                $validated['image'] = $this->uploadImage($request->file('image'), 'topicImages');
            }
    
            // Update discard with validated data
            $discard->update($validated);
    
            return redirect()->route('admin.discard.index')->with('success', 'Discard updated successfully.');
        }
    
        public function destroy(Discard $discard)
        {
            // Delete the image if it exists
            if ($discard->image) {
                $this->deleteImage($discard->image, 'topicImages');
            }
    
            // Delete the discard record
            $discard->delete();
    
            return redirect()->route('admin.discard.index')->with('success', 'Discard deleted successfully.');
        }
    }
    

