@extends('layouts.auth')
@section('head')
<body class="bodycolortasklist">
<div class="container loginmargin">
  <div class="row">
      <div class=" ">
              <div class="text-center text-white">
                <h2>Task List</h2>
            </div>
                <table class="table table-fit mt-5 table-dark table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">name</th>
                      <th scope="col">description</th>
                      <th scope="col">status</th>
                      <th scope="col">due_date</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($tasklist as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>
                        <form method="post" action="{{ route('tasks.updateStatus', ['id' => $task->id]) }}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn accept-btn" data-task-id="{{ $task->id }}">
                                <i class="text-warning">Accepted</i>
                            </button>
                        </form>
                            {{-- <a href="{{ route('tasks.updateStatus', ['id' => $task->id]) }}?_method=PATCH" class="btn accept-btn" data-task-id="{{ $task->id }}">
                                <i class="text-warning">Accepted</i>
                            </a> --}}

                            <a href="delete_task/{{$task->id}}" class="btn delete-btn" data-task-id="{{ $task->id }}">
                                <i class="material-icons text-danger">delete</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
        </div>
      </div>
    </div>
</div>    
</body>
@endsection