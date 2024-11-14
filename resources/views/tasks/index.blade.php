@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($tasks as $task)
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
            <div
                class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col">
                <div class="p-6 flex-1">
                    <div class="flex items-center justify-between">
                        <a href="{{ route('tasks.show', $task->id) }}" class="text-gray-800 hover:text-blue-600">
                            <h2 class="font-semibold text-xl text-inherit">{{ $task->title }}</h2>
                        </a>
                        <span
                            class="flex items-center px-2 py-1 text-xs font-semibold rounded {{ $status_classes }} text-nowrap">
                            {{ $status_icon }} {{ $status_text }}
                        </span>
                    </div>
                    <p class="text-gray-600 mt-4">{{ $task->description }}</p>
                </div>
                <div class="px-6 py-4 bg-gray-50 flex items-center justify-between">
                    <p class="text-sm text-gray-500">
                        Due: {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                    </p>
                    <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-600 hover:text-blue-800 text-sm">
                        View Details &rarr;
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
