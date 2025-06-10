@extends('layouts.app')

@section('title', 'Aufgabe hinzufügen')

@section('content')

<form method="POST" action="{{route('tasks.store')}}">
@csrf
    <div>
        <label for="title">Titel</label>
        <input type="text" name="title" id="title">
    </div>
    <div>
    <label for="beschreibung">Beschreibung</label>
    <textarea name="beschreibung" id="beschreibung" rows="5"></textarea>
    </div>
    <div>
    <label for="lang_beschreibung">lang Beschreibung</label>
    <textarea name="lang_beschreibung" id="lang_beschreibung" rows="5"></textarea>
    </div>
    <div>
        <button type="submit">Aufgabe hinzufügen</button>
    </div>
</form>

@endsection
