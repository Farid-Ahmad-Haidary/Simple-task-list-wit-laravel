@extends('layouts.app')

@section('title', $task->title)



@section('content')
    <div>
        <p>{{ $task->description }}</p>

        @if ($task->long_description)
            <p>{{ $task->long_description }}</p>
        @endif

        <h2>{{ $task->created_at }}</h2>
        <h2>{{ $task->updated_at }}</h2>
    </div>
@endsection
