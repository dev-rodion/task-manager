@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <div class="max-w-3xl mx-auto">
        <h1 class="font-bold text-2xl text-gray-800 mb-6">Edit Task</h1>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <x-task-form :task="$task" :action="route('tasks.update', $task->id)" method="PUT">
                Update Task
            </x-task-form>
        </div>
    </div>
@endsection
