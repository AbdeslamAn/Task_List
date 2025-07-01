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
@forelse ($tasks as $task)
            <div><a href="{{route('tasks.show',['task' =>$task->id])}}">{{$task->title}}</a></div>
@empty
    <div>There are no tasks</div>
@endforelse
@endsection
