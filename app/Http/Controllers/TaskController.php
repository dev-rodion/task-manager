<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        // Fetch all tasks from the database
        $tasks = Task::orderBy('due_date', 'asc')->get();

        // Pass the tasks to the view
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
    }

    public function edit($id)
    {
    }

    public function update($id)
    {
    }

    public function destroy($id)
    {
    }
}
