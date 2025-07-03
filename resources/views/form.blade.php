@extends('layouts.app')

@section('title', isset($task) ? 'Aufgabe bearbeiten' : 'Aufgabe hinzufügen')

@section('content')

@section('styles')
    <style>
        .fahler-nachricht{
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

<form method="POST" action="{{ isset($task) ?  route('tasks.update', ['task' => $task->id]) : route('tasks.store')}}">
@csrf
@isset($task)
 @method('PUT')
@endisset
    <div>
        <label for="title">Titel</label>
        <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}">
        @error('title')
            <p class="fahler-nachricht">{{"Das Feld Titel ist erforderlich."}}</p>
        @enderror
    </div>
    <div>
        <label for="beschreibung">Beschreibung</label>
        <textarea name="beschreibung" id="beschreibung" rows="5" >{{ $task->Beschreibung ?? old('beschreibung') }}</textarea>
        @error('beschreibung')
            <p class="fahler-nachricht">{{"Das Feld Beschreibung ist erforderlich."}}</p>
        @enderror
    </div>
    <div>
        <label for="lang_beschreibung">lang Beschreibung</label>
        <textarea name="lang_beschreibung" id="lang_beschreibung" rows="10" >{{ $task->lang_Beschreibung ?? old('lang_beschreibung') }}</textarea>
        @error('lang_beschreibung')
            <p class="fahler-nachricht">{{"Das Feld lang Beschreibung ist erforderlich."}}</p>
        @enderror
    </div>
    <div>
        <button type="submit">
            @isset($task)
                Aufgabe bearbeiten
            @else
                Aufgabe hinzufügen
            @endisset
        </button>
    </div>
</form>

@endsection
