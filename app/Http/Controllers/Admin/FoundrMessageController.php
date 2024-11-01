<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoundrMessage; // Make sure to import the FoundrMessage model
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;

class FoundrMessageController extends Controller
{
    use UploadImageTrait; // Use the UploadImageTrait

    public function index()
    {
        $messages = FoundrMessage::all();
        return view('admin.foundr_message.index', compact('messages'));
    }

    public function create()
    {
        return view('admin.foundr_message.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $this->uploadImage($request->file('image'), 'topicImages');
        }

        // Create the new message with validated data
        FoundrMessage::create($validated);
        return redirect()->route('admin.foundr_messages.index')->with('success', 'Message created successfully.');
    }

    public function edit($id)
    {
        $message = FoundrMessage::findOrFail($id);
        return view('admin.foundr_message.edit', compact('message'));
    }

    public function update(Request $request, FoundrMessage $message)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        // Handle image upload if a new image was provided
        if ($request->hasFile('image')) {
            // Optionally, delete the old image if it exists
            if ($message->image) {
                $this->deleteImage($message->image, 'topicImages');
            }
            $validated['image'] = $this->uploadImage($request->file('image'), 'topicImages');
        } else {
            // If no new image is uploaded, keep the existing filename
            $validated['image'] = $message->image;
        }

        // Update the message with the validated data
        $message->update($validated);
        return redirect()->route('admin.foundr_messages.index')->with('success', 'Message updated successfully.');
    }

    public function destroy(FoundrMessage $message)
    {
        // Optionally delete the image when deleting the message
        if ($message->image) {
            $this->deleteImage($message->image, 'topicImages');
        }

        // Delete the message
        $message->delete();
        return redirect()->route('admin.foundr_messages.index')->with('success', 'Message deleted successfully.');
    }
}
