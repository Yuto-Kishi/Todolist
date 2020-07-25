@extends('layouts.admin')
@section('title', 'To Do Listの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>To Do List編集</h2>
                <form action="{{ action('Admin\TodoController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">To Do</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $todo_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="due_date">Deadline</label> 
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="due_date" value="{{ $todo_form->due_date }}">
                        </div>
                    </div>
                    <div class="form-group row">
             　　　    <label class ="col-md-2">The Current Status</label>
             　　　    <div class="col-md-10">
             　　　        <input type="radio" name="state" value="Done">Done{{ old('status') }}
             　　　        <input type="radio" name="state" value="In Progress">In Progress{{ old('status') }}
             　　　        <input type="radio" name="state" value="Untouched">Untouched{{ old('status') }}
             　　　    </div>
             　　　</div>
             　　　 <input type="hidden" name="id" value="{{$todo_form->id}} ">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="Upload+">
                        </div>
                    </div>
                </form>
                <div calss="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>edit history</h2>
                        <ul class="list-group">
                            @if ($todo_form->histories != NULL)
                            @foreach ($todo_form->histories as $history)
                            <li class="list-group-item">{{ $history->edited_at }}</li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection