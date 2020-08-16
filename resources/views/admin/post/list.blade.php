@extends('admin.layouts.master')
@section('title', 'Danh sách bài viết')
@section('content')
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">
            <a href="">Bảng điều khiển</a>
        </li>
        <li class="breadcrumb-item active"><a href="">Bài viết</a></li>
    </ol>

    <div class="card">
        <div class="card-header">
           Danh sách bài viết
        </div>
        <div class="card-body">
            <a class="btn btn-success" href="{{ route('post.create') }}">Thêm mới</a>
            <table class="table table-bordered table-inverse table-responsive">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Tác giả</th>
                    <th>Danh mục</th>
                    <th>Ngày viết</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $item => $post)
                    <tr>
                        <td scope="row">{{ $item++ }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <a href="{{ route('post.edit', $post->id) }}"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('post.delete', $post->id ) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-trash" style="color: red"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
