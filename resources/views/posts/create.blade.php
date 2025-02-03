@extends('layouts.app')

@section('content')
<div class="container">
    <h2>إضافة مقال جديد</h2>
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">عنوان المقال</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">وصف المقال</label>
            <textarea name="description" class="form-control" id="description" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">حفظ المقال</button>
    </form>
</div>
@endsection
