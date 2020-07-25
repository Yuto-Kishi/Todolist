@extends('layouts.admin')
@section('title', 'To Do List')

@section('content')
    <div class="container">
        <div class="row">
            <h2>To Do List</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\TodoController@add') }}" role="button" class="btn btn-primary">New Upload</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\TodoController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">Title</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value={{ $cond_title }}>
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="Search">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="admin-todo col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">Title</th>
                                <th width="10%">Due date</th>
                                <th width="10%">State</th>
                                <th width="10%">Manuals</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $todo)
                                <tr>
                                    <th>{{ $todo->id }}</th>
                                    <td>{{ str_limit($todo->title, 250) }}</td>
                                    <td>{{ str_limit($todo->due_date, 14) }}</td>
                                    <td>{{ str_limit($todo->state, 20) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\TodoController@edit', ['id' => $todo->id]) }}">Edit</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\TodoController@delete', ['id' => $todo->id]) }}">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection