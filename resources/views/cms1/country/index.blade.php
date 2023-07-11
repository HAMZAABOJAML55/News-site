@extends('cms.parent')

@section('title' , 'Index Country')

@section('main-title' , 'Index Country')

@section('sub-title' , 'index country')

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
              {{-- <a href="{{ route('countries.create') }}" type="submit" class="btn btn-success">Add New Country</a> --}}
              <form action="" method="get" style="margin-bottom:2%;">
                <div class="row">
                    <div class="input-icon col-md-2">
                        <input type="text" class="form-control" placeholder="Search By Name"
                           name='name' @if( request()->name) value={{request()->name}} @endif/>
                          <span>
                              <i class="flaticon2-search-1 text-muted"></i>
                          </span>
                        </div>

                        <div class="input-icon col-md-2">
                            <input type="text" class="form-control" placeholder="Search By Code"
                               name='code' @if( request()->code) value={{request()->code}} @endif/>
                              <span>
                                  <i class="flaticon2-search-1 text-muted"></i>
                              </span>
                            </div>

                        <div class="input-icon col-md-2">
                        <input type="date" class="form-control" placeholder="Search By Date"
                           name='created_at' @if( request()->created_at) value={{request()->created_at}} @endif/>
                          <span>
                              <i class="flaticon2-search-1 text-muted"></i>
                          </span>
                        </div>

                       
                <div class="col-md-4">
                      <button class="btn btn-success btn-md" type="submit"> Filter</button>
                      <a href="{{route('countries.index')}}"  class="btn btn-danger">End Filter</a>
                      {{-- @can('Create-City') --}}

                      <a href="{{route('countries.create')}}"><button type="button" class="btn btn-md btn-primary"> Add New Country </button></a>
                      {{-- @endcan --}}
                </div>

                     </div>
            </form>

              <div class="card-tools">
                {{-- <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> --}}

                  {{-- <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div> --}}
                {{-- </div> --}}
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Country Name</th>
                    <th>Code</th>
                    <th>Number of City</th>

                    <th>Setting</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($countries as $country)
                <tr>
                    <td>{{$country->id}}</td>
                    <td>{{$country->name}}</td>
                    <td>{{ $country->code }}</td>
                    <td>{{ $country->cities_count }}</td>

                    <td>

                    <div class="btn-group">
                        <a href="{{ route('countries.edit' , $country->id ) }}" type="button" class="btn btn-info">Edit</a>
                        <button type="button" onclick="performDestroy({{$country->id}} , this)" class="btn btn-danger">Delete</button>
                        <a href="{{ route('countries.show' , $country->id) }}" type="button" class="btn btn-success">Show</a>
                      </div></td>
                </tr>
                    @endforeach

                </tbody>
              </table>
            </div>

            {{ $countries->links() }}
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

    confirmDestroy('/cms/admin/countries/'+id , reference);
  }
  </script>
@endsection
