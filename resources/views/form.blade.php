@extends('layouts.app')

@section('title', isset($task) ? 'Aufgabe bearbeiten' : 'Aufgabe hinzufügen')

@section('content')



<form method="POST" action="{{ isset($task) ?  route('tasks.update', ['task' => $task->id]) : route('tasks.store')}}">
@csrf
@isset($task)
 @method('PUT')
@endisset
    <div class="mb-4">
        <label for="title">Titel</label>
        <input type="text" name="title" id="title"
            class="@error('title') border-red-500 @enderror border"
         value="{{ $task->title ?? old('title') }}">
        @error('title')
            <p class="error">{{"Das Feld Titel ist erforderlich."}}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="beschreibung">Beschreibung</label>
        <textarea name="beschreibung" id="beschreibung"
        class="@error('beschreibung') border-red-500 @enderror border"
        rows="5" >{{ $task->Beschreibung ?? old('beschreibung') }}</textarea>
        @error('beschreibung')
            <p class="error">{{"Das Feld Beschreibung ist erforderlich."}}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="lang_beschreibung">lang Beschreibung</label>
        <textarea name="lang_beschreibung" id="lang_beschreibung"
        class="@error('lang_beschreibung') border-red-500 @enderror border"
        rows="10" >{{ $task->lang_Beschreibung ?? old('lang_beschreibung') }}</textarea>
        @error('lang_beschreibung')
            <p class="error">{{"Das Feld lang Beschreibung ist erforderlich."}}</p>
        @enderror
    </div>
    <div class="flex gap-3 items-center">
        <button type="submit" class="btn">
            @isset($task)
                Aufgabe bearbeiten
            @else
                Aufgabe hinzufügen
            @endisset
        </button>
        <a href="{{route('tasks.index')}}"  class="btn2">Abbrechen</a>
    </div>
</form>

@endsection
