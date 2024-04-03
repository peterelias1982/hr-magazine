@extends('Admin.layouts.master')
@section('Content')
<div class="content-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between border-bottom py-1">
      <h2 class="fw-bold col-lg-auto">Job Details</h2>
      <div class="btn-wrapper">
      <form method="post" action="{{route('jobs.destroy')}}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="slug" value="{{$jobdetail->slug}}">
                            <input  type="submit" class="btn btn-danger" value="Delete Job">
                            </form> 
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
              <p>{{$jobdetail->title}}</p>
              <h5 class="fw-bold pt-4">Employer</h5>
              <p>{{$jobdetail->Employer->userrel->name}}</p>
              <h5 class="fw-bold pt-4">Category</h5>
              <p>{{$jobdetail->jobCategory->category}}</p>
              <h5 class="fw-bold pt-4">No. of Application</h5>
              <p>{{$jobdetail->jobSeeker->count()}}</p>
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
              <p>{{$jobdetail->company}}</p>
              <h5 class="fw-bold pt-4">Deadline</h5>
              <p>{{$jobdetail->deadline}}</p>
              <h5 class="fw-bold pt-4">Content</h5>
              <p>
              {{$jobdetail->content}}
              </p>
              <h5 class="fw-bold pt-4">Email to apply</h5>
              <p class="text-primary">{{$jobdetail->email}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection