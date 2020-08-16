@extends('admin.layouts.master')
@section('title', 'Danh sách thể loại')
@section('content')
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">
            <a href="">Bảng điều khiển</a>
        </li>
        <li class="breadcrumb-item active"><a href="">Danh mục</a></li>
    </ol>

    <div class="card">
        <div class="card-header">
            Danh mục
        </div>
        <div class="card-body">
            <a class="btn btn-success" href="{{ route('category.create') }}">Thêm mới</a>
            <table class="table table-bordered table-inverse table-responsive">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th style="width: 80%">Danh mục</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $item => $category)
                    <tr>
                        <td scope="row">{{ $item++ }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('category.edit', $category->id) }}"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('category.delete', $category->id ) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-trash" style="color: red"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
