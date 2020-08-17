@extends('admin.layouts.master')
@section('title', 'Thêm mới bài viết')
@section('content')
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">
            <a href="">Bảng điều khiển</a>
        </li>
        <li class="breadcrumb-item active"><a href="">Sửa bài viết </a></li>
    </ol>

    <div class="card">
        <div class="card-header">
            Sửa blog
        </div>
        <div class="card-body">
            <form method="post" action="">
                @csrf
                @if($errors->all())
                    <div class="alert alert-danger" role="alert">
                        <strong>Có lỗi khi sửa bài viết!</strong>
                    </div>
                @endif
                <div class="form-group">
                    <label class="{{ $errors->first('title') ? 'text-danger' : '' }}">Tiêu đề</label>
                    <input type="text" class="form-control {{ $errors->first('title') ? 'is-invalid' : '' }}"
                           name="title" autofocus required value="{{ $post->title }}">
                    @if($errors->first('title'))
                        <p class="alert alert-danger">{{ $errors->first('title') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label class="{{ $errors->first('desc') ? 'text-danger' : '' }}">Mô tả</label>
                    <input type="text" class="form-control {{ $errors->first('desc') ? 'is-invalid' : '' }}"
                           name="desc" required value="{{ $post->description }}">
                    @if($errors->first('desc'))
                        <p class="alert alert-danger">{{ $errors->first('desc') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label class="{{ $errors->first('content') ? 'text-danger' : '' }}">Nội dung</label>
                    <textarea class="form-control {{ $errors->first('content') ? 'is-invalid' : '' }}" id="editor"
                              name="content" rows="3" required value="{!! $post->content !!}"></textarea>
                    @if($errors->first('content'))
                        <p class="alert alert-danger">{{ $errors->first('content') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label class="{{ $errors->first('image') ? 'text-danger' : '' }}">Ảnh</label>
                    <input type="file" class="form-control-file {{ $errors->first('image') ? 'is-invalid' : '' }}"
                           name="image" required value="{{ $post->image }}">
                    @if($errors->first('image'))
                        <p class="alert alert-danger">{{ $errors->first('image') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label class="{{ $errors->first('category') ? 'text-danger' : '' }}">Thể loại</label>

                    <select name="category" id="" class="{{ $errors->first('category') ? 'is-invalid' : '' }}">
                        <option value="">Chọn thể loại</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @if($errors->first('category'))
                        <p class="alert alert-danger">{{ $errors->first('category') }}</p>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                <a class="btn btn-secondary" href="{{ route('post.index') }}">Hủy bỏ</a>
            </form>
        </div>
    </div>
@endsection
