@extends('Admin.layouts.master')
@section('Content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-6 grid-margin stretch-card" id="category">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Job Category</h4>
          <p class="card-description">Add a new job category</p>
          <form class="forms-sample" method="POST" action="{{ route('jobCategory.store') }}">
              @csrf
            <div class="form-group">
              <label for="exampleInputUsername1">Name</label>
              <input name="category" type="text" class="form-control" id="exampleInputUsername1" placeholder="category">
            </div>

              <label class="form-check-label">
                <input type="checkbox" class="form-check-input">
                Has Comment section
              <i class="input-helper"></i></label>
            </div>
            <button type="submit" class="btn btn-primary me-2">
              Submit
            </button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-6 d-flex justify-content-center align-items-center" id="padding_pic">
      <div class="col-lg-9">
      <img src="{{asset('admin/images/hr-logo.svg')}}" alt="" class="img-fluid rounded opacity-25">
    </div>
  </div>
  </div>
</div>
@endsection
