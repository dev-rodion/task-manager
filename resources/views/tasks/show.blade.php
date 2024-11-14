@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                @php
                    $status_classes = '';
                    $status_icon = '';

                    switch ($task->status) {
                        case 'todo':
                            $status_classes = 'bg-red-100 text-red-800';
                            $status_icon = '❗';
                            $status_text = 'To Do';
                            break;
                        case 'in_progress':
                            $status_classes = 'bg-yellow-100 text-yellow-800';
                            $status_icon = '⏳';
                            $status_text = 'In Progress';
                            break;
                        case 'completed':
                            $status_classes = 'bg-green-100 text-green-800';
                            $status_icon = '✅';
                            $status_text = 'Finished';
                            break;
                    }
                @endphp
                <div class="flex items-center justify-between">
                    <h1 class="font-bold text-2xl text-gray-800">{{ $task->title }}</h1>
                    <span class="flex items-center px-3 py-1 text-sm font-semibold rounded {{ $status_classes }}">
                        {{ $status_icon }} {{ $status_text }}
                    </span>
                </div>
                <p class="text-gray-600 mt-4">{{ $task->description }}</p>
                <div class="mt-6">
                    <p class="text-sm text-gray-500">
                        <strong>Due Date:</strong> <span
                            class="font-medium">{{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}</span>
                    </p>
                    <p class="text-sm text-gray-500">
                        <strong>Created At:</strong>
                        <span class="font-medium">{{ $task->created_at->format('M d, Y \a\t h:i A') }}</span>
                    </p>
                    <p class="text-sm text-gray-500">
                        <strong>Last Updated:</strong>
                        <span class="font-medium">{{ $task->updated_at->format('M d, Y \a\t h:i A') }}</span>
                    </p>
                    {{-- created by --}}
                    <p class="text-sm text-gray-500">
                        <strong>Created By:</strong> <span class="font-medium">{{ $task->user->name }} ({{ $task->user->email }})</span>
                    </p>
                </div>
            </div>
            <div class="px-6 py-4 bg-gray-50 flex items-center justify-between">
                <div>
                    <a href="{{ route('tasks.edit', $task->id) }}"
                       class="text-blue-600 hover:text-blue-800 font-semibold">
                        Edit Task
                    </a>
                </div>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this task?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">
                        Delete Task
                    </button>
                </form>
            </div>
        </div>
        <div class="mt-6">
            <a href="{{ route('tasks') }}" class="text-gray-600 hover:text-gray-800 flex items-center">
                &larr; Back to All Tasks
            </a>
        </div>
    </div>
@endsection
