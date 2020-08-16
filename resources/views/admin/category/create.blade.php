@extends('admin.layouts.master')
@section('title', 'Add New Category')
@section('content')
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">
            <a href="">Bảng điều khiển</a>
        </li>
        <li class="breadcrumb-item active"><a href="">Tạo mới thể loại</a></li>
    </ol>

    <div class="card">
        <div class="card-header">
            Tạo mới thể loại
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('category.store') }}">
                @csrf
                @if($errors->all())
                    <div class="alert alert-danger" role="alert">
                        <strong>Lỗi phát sinh khi thêm thể loại!</strong>
                    </div>
                @endif
                <div class="form-group">
                    <label class="{{ $errors->first('name') ? 'text-danger' : '' }}">Tên thể loại (*)</label>
                    <input type="text" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                           value="{{ old('name') }}" name="name" autofocus required>
                    @if($errors->first('name'))
                        <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Thêm</button>
                <a class="btn btn-secondary" href="{{ route('category.index') }}">Bỏ qua</a>
            </form>
        </div>
    </div>
@endsection

