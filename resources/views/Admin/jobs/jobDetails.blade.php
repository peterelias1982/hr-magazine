@extends('Admin.layouts.master')
@section('Content')
<div class="content-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between border-bottom py-1">
      <h2 class="fw-bold col-lg-auto">Job Details</h2>
      <div class="btn-wrapper">
        <a href="#" class="btn btn-sm" style="color: #ed2708"><i class="icon-trash"></i> Delete Job</a>
      </div>
    </div>

    <div class="row py-3">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title fw-bold">Overview</h4>
            <p class="card-description"></p>
            <div class="template-demo1">
              <h5 class="fw-bold pt-4">Job Title</h5>
              <p>Lorem Ipsum is simply...</p>
              <h5 class="fw-bold pt-4">Employer</h5>
              <p>Employer name</p>
              <h5 class="fw-bold pt-4">Category</h5>
              <p>Lorem Ipsum is simply...</p>
              <h5 class="fw-bold pt-4">No. of Application</h5>
              <p>99</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title fw-bold">Details</h4>
            <p class="card-description"></p>
            <div class="template-demo1">
              <h5 class="fw-bold pt-4">Company</h5>
              <p>Lorem Ipsum is simply...</p>
              <h5 class="fw-bold pt-4">Deadline</h5>
              <p>23/3/2024</p>
              <h5 class="fw-bold pt-4">Content</h5>
              <p>
                Lorem Ipsum is simply dummy text of the printing Lorem
                Ipsum has been the industry's standard dummy text ever
                since the 1500s,
              </p>
              <h5 class="fw-bold pt-4">Email to apply</h5>
              <p class="text-primary">test@example.com</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection