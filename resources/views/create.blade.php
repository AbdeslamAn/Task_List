@extends('layouts.app')

@section('title', 'Aufgabe hinzufügen')

@section('content')



<form method="POST" action="{{route('tasks.store')}}">
@csrf
    <div>
        <label for="title">Titel</label>
        <input type="text" name="title" id="title">
        @error('title')
            <p>{{"Das Feld Titel ist erforderlich."}}</p>
        @enderror
    </div>
    <div>
        <label for="beschreibung">Beschreibung</label>
        <textarea name="beschreibung" id="beschreibung" rows="5"></textarea>
        @error('beschreibung')
            <p>{{"Das Feld Beschreibung ist erforderlich."}}</p>
        @enderror
    </div>
    <div>
        <label for="lang_beschreibung">lang Beschreibung</label>
        <textarea name="lang_beschreibung" id="lang_beschreibung" rows="10"></textarea>
        @error('lang_beschreibung')
            <p>{{"Das Feld lang Beschreibung ist erforderlich."}}</p>
        @enderror
    </div>
    <div>
        <button type="submit">Aufgabe hinzufügen</button>
    </div>
</form>

@endsection
