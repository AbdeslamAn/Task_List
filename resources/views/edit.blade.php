@extends('layouts.app')

@section('title', 'Aufgabe ändern')

@section('content')

@section('styles')
    <style>
        .fahler-nachricht{
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

<form method="POST" action="{{route('tasks.update', ['id' => $task->id])}}">
@csrf
@method('PUT')
    <div>
        <label for="title">Titel</label>
        <input type="text" name="title" id="title" value="{{$task->title}}">
        @error('title')
            <p class="fahler-nachricht">{{"Das Feld Titel ist erforderlich."}}</p>
        @enderror
    </div>
    <div>
        <label for="beschreibung">Beschreibung</label>
        <textarea name="beschreibung" id="beschreibung" rows="5">{{$task->beschreibung}}</textarea>
        @error('beschreibung')
            <p class="fahler-nachricht">{{"Das Feld Beschreibung ist erforderlich."}}</p>
        @enderror
    </div>
    <div>
        <label for="lang_beschreibung">lang Beschreibung</label>
        <textarea name="lang_beschreibung" id="lang_beschreibung" rows="10">{{$task->lang_beschreibung}}</textarea>
        @error('lang_beschreibung')
            <p class="fahler-nachricht">{{"Das Feld lang Beschreibung ist erforderlich."}}</p>
        @enderror
    </div>
    <div>
        <button type="submit">Aufgabe hinzufügen</button>
    </div>
</form>

@endsection
