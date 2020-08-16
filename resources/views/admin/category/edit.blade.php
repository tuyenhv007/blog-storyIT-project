@extends('admin.layouts.master')
@section('title', 'Chỉnh sửa thể loại')
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
                @if($errors->all())
                    <div class="alert alert-danger" role="alert">
                        <strong>Lỗi phát sinh khi thêm thể loại!</strong>
                    </div>
                @endif
                <div class="form-group">
                    <label class="{{ $errors->first('name') ? 'text-danger' : '' }}">Tên thể loại (*)</label>
                    <input type="text" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                           value="{{ $category->name }}" name="name" autofocus required>
                    @if($errors->first('name'))
                        <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                <a class="btn btn-secondary" href="{{ route('category.index') }}">Bỏ qua</a>
            </form>
        </div>
    </div>
@endsection

