<?php

namespace App\Http\Controllers;

use App\Models\Task;
use function view;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('due_date', 'asc')->get();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    public function update($id)
    {
        $task = Task::findOrFail($id);

        $validatedData = request()->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'status' => 'required|string|in:todo,in_progress,completed',
        ]);

        $task->update($validatedData);

        return redirect()->route('tasks.show', $task->id)->with('success', 'Task updated successfully.');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->route('tasks')->with('success', 'Task deleted successfully.');
    }
}
