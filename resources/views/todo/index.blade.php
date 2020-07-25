@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#80080">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="title p-2">
                                    <h1>{{ str_limit($headline->title, 70) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ str_limit($headline->due_date, 70) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#f0f">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->title, 150) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#80080">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection