@extends('layouts.app')

@section('title', $task->title)

@section('content')
{{-- <h1>{{$task->title}}</h1> --}}
<p>{{$task->Beschreibung}}</p>

@if ($task->lang_Beschreibung)
    <p>{{$task->lang_Beschreibung}}</p>
@endif

<p>{{$task->created_at}}</p>
<p>{{$task->updated_at}}</p>

<div>
    <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Bearbeiten</a>
</div>
<div>
    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit"> Löschen </button>
    </form>
</div>
@endsection
