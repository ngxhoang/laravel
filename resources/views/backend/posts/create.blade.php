@extends('backend.layouts.master')

@section('title')
    Create Post
@endsection

@section('content-header')
    <h1>Tạo bài viết</h1>
@endsection

@section('content')

    <div class="card card-primary">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form-horizontal" method="POST" action="{{ route('backend.posts.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"
                        value="{{ old('title') }}"  placeholder="Enter...">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Textarea</label>
                    @include('backend.component.summernote')
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <input type="text" name="status" class="form-control" id="exampleInputEmail1" placeholder="Enter...">
                </div> --}}

                <!-- select -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Tag</label>
                            <select multiple="" class="form-control" name="tags[]" aria-placeholder="1" aria-valuenow="1">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control" name="status" aria-placeholder="1" aria-valuenow="1">
                        <option value="1">Done</option>
                        <option value="0">Draft</option>
                        <option value="2">Public</option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" style="float: right">Tạo mới</button>
            </div>
        </form>
    </div>
@endsection

@section('class')
    active
@endsection
