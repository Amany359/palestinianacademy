<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoardSchedule;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;

class BoardScheduleController extends Controller

{

    use UploadImageTrait;  
    public function index()
    {
        $boardSchedules = BoardSchedule::with('employee')->get();
        return view('admin.board_schedule.index', compact('boardSchedules'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('admin.board_schedule.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'employee_id' => 'required|exists:employees,id',
        ]);
        $imageName = null;
        if ($request->hasFile('image')) {
            
            $imageName = $this->uploadImage($request->file('image'), 'images/board_schedule');
        }

        BoardSchedule::create($request->all());

        return redirect()->route('admin.board_schedule.index')->with('success', 'Board Schedule created successfully.');
    }

    public function show($id)
    {
        $boardSchedule = BoardSchedule::with('employee')->findOrFail($id);
        return view('admin.board_schedule.show', compact('boardSchedule'));
    }

    public function edit($id)
    {
        $boardSchedule = BoardSchedule::findOrFail($id);
        $employees = Employee::all();
        return view('admin.board_schedule.edit', compact('boardSchedule', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'employee_id' => 'required|exists:employees,id',
        ]);

        if ($request->hasFile('image')) {
            
            if ($boardSchedule->image) {
                $this->deleteImage($boardSchedule->image, 'images/board_schedule');
            }

            // رفع الصورة الجديدة باستخدام التريت
            $imageName = $this->uploadImage($request->file('image'), 'images/board_schedule');
            $boardSchedule->image = $imageName;
        }

        return redirect()->route('admin.board_schedule.index')->with('success', 'Board Schedule updated successfully.');
    }

    public function destroy($id)
    {
        if ($boardSchedule->image) {
            $this->deleteImage($boardSchedule->image, 'images/board_schedule');
        }

        return redirect()->route('admin.board_schedule.index')->with('success', 'Board Schedule deleted successfully.');
    }
}
