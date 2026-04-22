@extends('layouts.app')

@section('title', 'Edit Task')
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
        <h1 class="text-2xl font-bold mb-6 text-center">Edit Task</h1>
        <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ $task->title }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('title')
                    <p class="error_message">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="5"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $task->description }}</textarea>
                @error('description')
                    <p class="error_message">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-4">
                <label for="long_description" class="block text-sm font-medium text-gray-700 mb-2">Long Description</label>
                <textarea name="long_description" id="long_description" rows="10"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $task->long_description }}</textarea>
                @error('long_description')
                    <p class="error_message">{{ $message }}</p>
                @enderror
            </div>


            <div class="text-center">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">Edit
                    Task</button>
            </div>
        </form>
    </div>
@endsection
