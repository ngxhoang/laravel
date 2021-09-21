@extends('backend.layouts.master')

@section('content-header')
    <h1>Danh sách danh mục</h1>
   
@endsection

@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header"> 
                @include('backend.component.btn', [
                    'href' => route('backend.category.create'),
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
                    <th>Tên danh mục</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Bacon ipsum dolor sit.</td>
                    <td><span class="tag tag-success">Approved</span></td>
                    <td><a href='{{ route('backend.category.edit', 1) }}'><i class="far fa-edit btn btn-outline-primary"></i></a> <i class="far fa-trash-alt btn btn-outline-danger"></i></td>
                  </tr>
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