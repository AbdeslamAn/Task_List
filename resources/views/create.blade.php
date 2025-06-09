@extends('layouts.app')

@section('title', 'Add Task')

@section('content')

<form method="POST" action="{{routr('tasks.store')}}">
@csrf
</form>

@endsection
