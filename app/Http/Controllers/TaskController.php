<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category)
    {
        return view('categories.tasks.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Category $category)
    {
        $validation = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|in:pending,in_progress,done',
        ]);

        $validation['user_id'] = auth()->id();

        $category->tasks()->create($validation);

        return redirect()->route('categories.show', $category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category, Task $task)
    {
        return view('categories.tasks.show', compact('category', 'task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, Task $task)
    {
        return view('categories.tasks.edit', compact('category', 'task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category, Task $task)
    {
        $validation = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|in:pending,in_progress,done',
        ]);

        $task->update($validation);

        return redirect()->route('categories.show', $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, Task $task)
    {
        $task->delete();

        return redirect()->route('categories.show', $category);
    }
}
