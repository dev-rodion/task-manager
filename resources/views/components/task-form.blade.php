@props(['task' => null, 'action', 'method' => 'POST'])

<form action="{{ $action }}" method="POST" class="p-6">
    @csrf
    @method($method)
    <div class="mb-4">
        <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $task->title ?? '') }}"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200 @error('title') border-red-500 @enderror">
        @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
        <textarea name="description" id="description" rows="5"
                  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200 @error('description') border-red-500 @enderror">{{ old('description', $task->description ?? '') }}</textarea>
        @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="due_date" class="block text-gray-700 font-semibold mb-2">Due Date</label>
        <input type="date" name="due_date" id="due_date"
               value="{{ old('due_date', isset($task) ? (new DateTime($task->due_date))->format('Y-m-d') : '') }}"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200 @error('due_date') border-red-500 @enderror">
        @error('due_date')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
        <select name="status" id="status"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200 @error('status') border-red-500 @enderror">
            <option value="todo" {{ old('status', $task->status ?? '') == 'todo' ? 'selected' : '' }}>To Do</option>
            <option value="in_progress" {{ old('status', $task->status ?? '') == 'in_progress' ? 'selected' : '' }}>In
                Progress
            </option>
            <option value="completed" {{ old('status', $task->status ?? '') == 'completed' ? 'selected' : '' }}>
                Completed
            </option>
        </select>
        @error('status')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex items-center justify-between">
        <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
            {{ $slot }}
        </button>
        <a href="{{ route('tasks.index') }}" class="text-gray-600 hover:text-gray-800">
            Cancel
        </a>
    </div>
</form>
