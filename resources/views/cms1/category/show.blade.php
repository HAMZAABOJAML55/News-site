@extends('cms.parent')

@section('title' , 'Show Country')

@section('main-title' , 'Show Country')

@section('sub-title' , 'Show Country')

@section('styles')

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Show Data of Country</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Country Name</label>
                  <input type="text" class="form-control" disabled id="name" name="name"
                  value="{{ $countries->name }}" placeholder="Enter Name of Country">
                </div>
                <div class="form-group">
                  <label for="code">Country Code</label>
                  <input type="text" class="form-control" disabled id="code" name="code"
                  value="{{ $countries->code }}" placeholder="Enter Code of Country">
                </div>
        
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                {{-- <button type="submit" class="btn btn-primary">Update</button> --}}
                <a href="{{ route('countries.index') }}" type="submit" class="btn btn-info">Go Back</a>

              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
     
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('scripts')

@endsection
