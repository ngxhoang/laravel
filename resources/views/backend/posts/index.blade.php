@extends('backend.layouts.master')

@section('content-header')
    <h1>Danh sách bài viết</h1>

@endsection

@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @include('backend.component.btn', [
                        'href' => route('backend.posts.add'),
                        'type' => 'primary',
                        'content' => 'Thêm mới'
                        ])

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên bài viết</th>
                                    <th>Danh mục</th>
                                    <th>Người tạo</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->content }}</td>
                                        <td>John Doe</td>
                                        <td>11-7-2014</td>
                                        <td>
                                            <a href='{{ route('backend.posts.show', $post->id ) }}'>
                                                <i class="far fa-eye btn btn-outline-success"></i>
                                            </a>
                                            <a href='{{ route('backend.posts.edit', $post->id) }}'>
                                                <i class="far fa-edit btn btn-outline-primary"></i>
                                            </a>
                                            <i class="far fa-trash-alt btn btn-outline-danger"></i>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div><!-- /.container-fluid -->
@endsection

@section('class1')
    active
@endsection
