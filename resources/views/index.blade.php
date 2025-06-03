<h1>The List of tasks :</h1>

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


@forelse ($tasks as $task)
            <div><a href="{{route('tasks.show',['id' =>$task->id])}}">{{$task->title}}</a></div>
@empty
    <div>There are no tasks</div>
@endforelse