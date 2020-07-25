{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'Taskの新規作成'を埋め込む --}}
@section('title', 'Taskの新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Task add</h2>
                <form action="{{ action('Admin\TodoController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group">
                　　　<label for="title">To Do</label>
                　　　<input type="text" class="form-control" name="title" value="{{ old('title') }}" />
              　　　</div>
              　　　　<div class="form-group">
                　　　<label for="due_date">Due date</label>
               　　　　 <input type="text" class="form-control" name="due_date" value="{{ old('due_date') }}" />
             　　　　 </div>
             　　　<div class="form-group row">
             　　　    <label class ="col-md-2">state of progress</label>
             　　　    <div class="col-md-10">
             　　　        <input type="radio" name="state" value="Complete">Completed{{ old('state') }}
             　　　        <input type="radio" name="state" value="In Progress">In Progress{{ old('state') }}
             　　　        <input type="radio" name="state" value="Untouched">Untouched{{ old('state') }}
             　　　    </div>
             　　　</div>
                    {{ csrf_field() }}
                    <div class="text-right">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
                </form>
            </div>
        </div>
    </div>
@endsection