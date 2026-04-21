@extends('layouts.app')

@section('title', 'This is the main page of Application')

@section('styles')
    <style>
        .tasks-list {
            list-style: none;
            padding: 0;
        }
        
        .tasks-list li {
            margin-bottom: 15px;
        }
        
        .tasks-list a {
            display: block;
            padding: 12px 20px;
            background-color: #f0f0f0;
            color: #333;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
    </style>
@endsection

@section('content')
    <div>
        @if (count($tasks))
            <ul class="tasks-list">
                @foreach ($tasks as $task)
                    <li>
                        <a href="{{ route('tasks.show', ['id' => $task->id]) }}">
                            {{ $task->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>هیچ کاری وجود ندارد!</p>
        @endif
    </div>
@endsection