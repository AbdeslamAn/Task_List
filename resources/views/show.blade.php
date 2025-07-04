@extends('layouts.app')

@section('title', $task->title)

@section('content')

<div class="mb-4">
    <a href="{{ route('tasks.index') }}"
            class="link">← Zurück zur Aufgabenliste</a>
</div>
{{-- <h1>{{$task->title}}</h1> --}}
<p class="mb-4 text-slate-700">{{$task->Beschreibung}}</p>

@if ($task->lang_Beschreibung)
    <p class="mb-4 text-slate-700">{{$task->lang_Beschreibung}}</p>
@endif

<p class="mb-4 text-sm text-slate-500">Erstellen : {{$task->created_at->diffForHumans()}} • Bearbeiten : {{$task->updated_at->diffForHumans()}}</p>

<p class="mb-4">
    @if ($task->abgeschlossen)
        <span class="font-medium text-green-500">Abgeschlossen</span>
    @else
        <span class="font-medium text-red-500">Unvollständig</span>
    @endif
</p>
<div class="flex gab-3">
    <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
        class="btn">Bearbeiten</a>

    <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
        @csrf
        @method('PUT')
        <button type="submit" class="btn">
            {{ $task->abgeschlossen ? 'Als unvollständig markieren' : 'Als abgeschlossen markieren' }}
        </button>
    </form>

    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn"> Löschen </button>
    </form>
</div>
@endsection
