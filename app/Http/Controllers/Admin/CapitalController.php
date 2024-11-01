<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Capital;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;

class CapitalController extends Controller
{
    use UploadImageTrait;

    public function index()
    {
        $capitals = Capital::with('employee')->get();
        return view('admin.capital.index', compact('capitals'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('admin.capital.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'employee_id' => 'required|exists:employees,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'employee_id', 'description']);

        // Upload image if available
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'), 'topicImages');
        }

        Capital::create($data);

        return redirect()->route('admin.capital.index')->with('success', 'Capital created successfully.');
    }

    public function edit(Capital $capital)
    {
        $employees = Employee::all();
        return view('admin.capital.edit', compact('capital', 'employees'));
    }

    public function update(Request $request, Capital $capital)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'employee_id' => 'required|exists:employees,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'employee_id', 'description']);

        // Upload new image and delete old one if necessary
        if ($request->hasFile('image')) {
            $this->deleteImage($capital->image, 'topicImages');
            $data['image'] = $this->uploadImage($request->file('image'), 'topicImages');
        }

        $capital->update($data);

        return redirect()->route('admin.capital.index')->with('success', 'Capital updated successfully.');
    }

    public function destroy(Capital $capital)
    {
        // Delete image if it exists
        if ($capital->image) {
            $this->deleteImage($capital->image, 'topicImages');
        }

        $capital->delete();

        return redirect()->route('admin.capital.index')->with('success', 'Capital deleted successfully.');
    }
}
