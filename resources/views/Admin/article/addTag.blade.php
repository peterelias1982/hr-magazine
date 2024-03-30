@extends('Admin.layouts.master')
@section('Content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-6 d-flex justify-content-center align-items-center" id="padding_pic">
      <div class="col-lg-9">
        <img src="{{asset('admin/images/hr-logo.svg')}}" alt="" class="img-fluid rounded opacity-25">
      </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card" id="tag">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tag Form</h4>
          <p class="card-description">Add a new article tag</p>
          <form class="forms-sample" id="tag-form">
            <div class="form-group">
              <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tag</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="tag name" form="tag-form">
              </div>
            </div>

            <button type="submit" class="btn btn-primary me-2" form="tag-form">
              Submit
            </button>
            <button class="btn btn-light" form="tag-form">
              Cancel
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection