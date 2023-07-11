@extends('cms.parent')

@section('title' , 'Index Category')

@section('main-title' , 'Index Category')

@section('sub-title' , 'index category')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">

      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="{{ route('categories.create') }}" type="submit" class="btn btn-success">Add New category</a>

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
                    <th>Category Name</th>
                    <th>status</th>
                    {{-- <th>Desc</th> --}}

                    <th>Setting</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td><span class="badge bg-success">({{$category->status}})</td>

                    <td>

                    <div class="btn-group">
                        <a href="{{ route('categories.edit' , $category->id ) }}" type="button" class="btn btn-info">Edit</a>
                        <button type="button" onclick="performDestroy({{$category->id}} , this)" class="btn btn-danger">Delete</button>
                        {{-- <a href="{{ route('countries.show' , $category->id) }}" type="button" class="btn btn-success">Show</a> --}}
                      </div></td>
                </tr>
                    @endforeach

                </tbody>
              </table>
            </div>

            {{ $categories->links() }}
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
@endsection


@section('scripts')

<script>
  function performDestroy(id , reference){

    confirmDestroy('/cms/admin/categories/'+id , reference);
  }
  </script>
@endsection