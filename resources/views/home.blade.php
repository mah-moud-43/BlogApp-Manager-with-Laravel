@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- الأزرار العلوية -->
                    <div class="d-flex justify-content-center mb-3">
                        <a href="{{ route('posts.index') }}" class="btn btn-primary mx-2">عرض المقالات</a>
                        <a href="{{ route('posts.create') }}" class="btn btn-success mx-2">إنشاء مقال جديد</a>
                    </div>

                    <!-- زر لتسجيل الخروج في أسفل الصفحة على اليمين -->
                    <div class="d-flex justify-content-end mt-3">
                        <a href="{{ route('logout') }}" class="btn btn-danger"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </div>

                    <!-- نموذج لتسجيل الخروج -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
