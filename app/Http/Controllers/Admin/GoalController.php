<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index()
    {
        $goals = Goal::all();
        return view('admin.goals.index', compact('goals'));
    }

    public function create()
    {
        return view('admin.goals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Goal::create($request->all());
        return redirect()->route('admin.goals.index')->with('success', 'Goal created successfully.');
    }

    public function show(Goal $goal)
    {
        return view('admin.goals.show', compact('goal'));
    }

    public function edit(Goal $goal)
    {
        return view('admin.goals.edit', compact('goal'));
    }

    public function update(Request $request, Goal $goal)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $goal->update($request->all());
        return redirect()->route('admin.goals.index')->with('success', 'Goal updated successfully.');
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();
        return redirect()->route('admin.goals.index')->with('success', 'Goal deleted successfully.');
    }
}
