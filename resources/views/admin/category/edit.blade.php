@extends('admin.layouts.master')
@section('title', 'Add New Category')
@section('content')
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">
            <a href="">Bảng điều khiển</a>
        </li>
        <li class="breadcrumb-item active"><a href="">Tạo mới Danh mục</a></li>
    </ol>

    <div class="card">
        <div class="card-header">
            Tạo mới Danh mục
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('category.update', $category->id) }}">
                @csrf
                <div class="form-group">
                    <label>Tên danh mục</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}" autofocus required>
                </div>

                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                <a class="btn btn-secondary" href="{{ route('category.index') }}">Bỏ qua</a>
            </form>
        </div>
    </div>
@endsection

