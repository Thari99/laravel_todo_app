@extends('layout.app')
<h1>Todo home </h1>
@section('content')
    <div class="container">

        <div class="row">

            <h1>Todo list</h1>
        </div>
        <div class="col-log-12">
            <form action="{{ route('todo.store') }}" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Add new todo">
                <button type="submit" >Submit</button>

            </form>
        </div>

        <div class="col-lg-12">
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                            <tr>
                                <td>{{ $key++ }}</td>
                                <td>{{ $task->title }}</td>
                                <td>
                                    @if ($task->done == 1)
                                        <span class="badge bg-success">Completed</span>
                                    @else
                                        <span class="badge bg-warning">Pending</span>

                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('todo.delete', $task->id) }}" class="btn btn-danger">Delete</a>
                                    <a href="{{ route('todo.done', $task->id) }}" class="btn btn-success">Done</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>

@endsection
