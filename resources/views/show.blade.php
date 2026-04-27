@extends('layouts.app')

@section('title', $task->title)



@section('content')
    <div>
        <p class="text-bold">{{ $task->description }}</p>

        @if ($task->long_description)
            <p>{{ $task->long_description }}</p>
        @endif

        <h2>{{ $task->created_at }}</h2>
        <h2>{{ $task->updated_at }}</h2>
    </div>

    <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button style="color: red" type="submit">Delete</button>
    </form>
@endsection
