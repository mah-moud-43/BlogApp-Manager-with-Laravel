@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-12 text-end">
            <a href="{{ route('posts.create') }}" class="btn btn-success">إضافة مقال جديد</a>
        </div>
    </div>
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->description, 100) }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">عرض المقال</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
