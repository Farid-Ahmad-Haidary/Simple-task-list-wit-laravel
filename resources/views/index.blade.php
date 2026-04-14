@extends('layouts.app')

@section('title', 'This is the manin page of Application')


@section('content')
    <div>
        @if (count($tasks))
            <ul>
                @foreach ($tasks as $task)
                    <h1>
                        <a href="{{ route('tasks.show', ['id' => $task->id]) }}"> {{ $task->title }}</a>
                    </h1>
                @endforeach
            </ul>

        @endif

    </div>
@endsection
