@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('تعديل المقال') }}</div>

                <div class="card-body">
                    <!-- التحقق من الأخطاء -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- نموذج تعديل المقال -->
                    <form method="POST" action="{{ route('posts.update', $post->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">عنوان المقال</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">وصف المقال</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $post->description) }}</textarea>
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-success">تحديث المقال</button>
                        </div>
                    </form>

                    <!-- زر العودة إلى الصفحة السابقة -->
                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{ route('posts.index') }}" class="btn btn-secondary">العودة إلى المقالات</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
