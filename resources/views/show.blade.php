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
@endsection
