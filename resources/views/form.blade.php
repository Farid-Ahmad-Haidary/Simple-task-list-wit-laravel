@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')
@section('styles')
    <style>
        .error_message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection



@section('content')
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Add New Task</h1>
        <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}"
            method="POST">
            @csrf
            @isset($task)
                @method('PUT')
            @endisset
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                <input type="text" name="title" id="title"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('title')
                    <p class="error_message">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="5"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                @error('description')
                    <p class="error_message">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-4">
                <label for="long_description" class="block text-sm font-medium text-gray-700 mb-2">Long Description</label>
                <textarea name="long_description" id="long_description" rows="10"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                @error('long_description')
                    <p class="error_message">{{ $message }}</p>
                @enderror
            </div>


            <div class="text-center">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @isset($task)
                        Update Task
                    @else
                        Create Task
                    @endisset
                </button>
            </div>
        </form>
    </div>
@endsection
