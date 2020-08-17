@extends('admin.layouts.master')
@section('title', '')
@section('content')
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">
            <a href="">Bảng điều khiển</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ route('post.index') }}">Bài viết</a></li>
    </ol>

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <h2>{{ $post->title }}</h2>
            <div>
                {!! $post->content !!}
            </div>

        </div>
    </div>
@endsection
