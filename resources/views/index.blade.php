@extends('layouts.app')

@section('title', 'The List of tasks :')


{{-- <div>
    @if (count($tasks))
        @foreach ($tasks as $task)
            <div>{{$task->title}}</div>
        @endforeach
        @else
        <div>There are no tasks</div>
    @endif
</div> --}}

{{-- or --}}

{{-- @forelse ($tasks as $task)
            <div>{{$task->title}}</div>
@empty
    <div>There are no tasks</div>
@endforelse --}}

@section('content')

<nav class="mb-4">
    <a href="{{ route('tasks.create') }}"
            class="font-medium text-gray-700 underline decoration-pink-500">Aufgabe hinzufügen</a>
</nav>
@forelse ($tasks as $task)
            <div>
                <a href="{{route('tasks.show',['task' =>$task->id])}}"
                    @class(['line-through' => $task->abgeschlossen])>{{$task->title}}</a>
            </div>
@empty
    <div>There are no tasks</div>
@endforelse

@if ($task->count())
    <nav class="mt-4">
        {{ $tasks->links() }}
    </nav>
@endif
@endsection
