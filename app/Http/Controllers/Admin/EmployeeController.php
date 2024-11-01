<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;

class EmployeeController extends Controller
{
    use UploadImageTrait;

    public function index()
    {
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'job_title' => 'required|string|max:255',
        'academic_degrees' => 'nullable|string',
        'professional_experiences' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->all();

    // Handle image upload
    if ($request->hasFile('image')) {
        $data['image'] = $this->uploadImage($request->file('image'), 'topicImages');
    }

    Employee::create($data);

    return redirect()->route('admin.employees.index')->with('success', 'تم إنشاء الموظف بنجاح.');
}


public function edit(Employee $employee)
{
    return view('admin.employees.edit', compact('employee'));
}

public function update(Request $request, Employee $employee)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'job_title' => 'required|string|max:255',
        'academic_degrees' => 'nullable|string',
        'professional_experiences' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->all();

    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($employee->image) {
            $this->deleteImage($employee->image, 'topicImages');
        }

        // Upload the new image
        $data['image'] = $this->uploadImage($request->file('image'), 'topicImages');
    }

    $employee->update($data);

    return redirect()->route('admin.employees.index')->with('success', 'تم تحديث بيانات الموظف بنجاح.');
}

public function destroy(Employee $employee)
{
    // Delete the image if it exists
    if ($employee->image) {
        $this->deleteImage($employee->image, 'topicImages');
    }

    $employee->delete();

    return redirect()->route('admin.employees.index')->with('success', 'تم حذف الموظف بنجاح.');
}

}