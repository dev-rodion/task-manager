@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <div class="max-w-3xl mx-auto">
        <h1 class="font-bold text-2xl text-gray-800 mb-6">Create Task</h1>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <x-task-form :action="route('tasks.store')">
                Create Task
            </x-task-form>
        </div>
    </div>
@endsection
