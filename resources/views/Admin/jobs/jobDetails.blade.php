@extends('Admin.layouts.master')
@section('Content')
    <div class="content-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between border-bottom py-1">
            <h2 class="fw-bold col-lg-auto">Job Details</h2>
            <div class="btn-wrapper">
                <form action="{{route('admin.jobs.destroy', $jobdetail->slug)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm" style="color: #ed2708"
                            onclick="alert('Are you sure you want to delete?')"><i
                            class="icon-trash"></i> Delete Job
                    </button>
                </form>
            </div>
        </div>


        <div class="row py-3">
            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title fw-bold lh-1">Job Details</h4>
                        <p class="card-subtitle fw-bold">Overview</p>
                        <div class="template-demo1 px-5">

                            <h5 class="fw-bold pt-4">Job Title:</h5>
                            <p>{{$jobdetail->title}}</p>

                            <h5 class="fw-bold pt-4">Employer:</h5>
                            <p>{{$jobdetail->Employer->userEmployer->firstName}} {{$jobdetail->Employer->userEmployer->secondName}}</p>

                            <h5 class="fw-bold pt-4">Category:</h5>
                            <p>{{$jobdetail->jobCategory->category}}</p>

                            <h5 class="fw-bold pt-4">Career Level:</h5>
                            <p>{{$jobdetail->careerLevel}}</p>

                            <h5 class="fw-bold pt-4">Company</h5>
                            <p>{{$jobdetail->company}}</p>

                            <h5 class="fw-bold pt-4">Deadline</h5>
                            <p>{{$jobdetail->deadline}}</p>

                            <h5 class="fw-bold pt-4">Email to apply</h5>
                            <p class="text-primary">{{$jobdetail->email}}</p>

                            <h5 class="fw-bold pt-4">No. of Application:</h5>
                            <p>{{$jobdetail->jobSeeker->count()}}</p>
                        </div>
                    </div>

                </div>
            </div>


        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-subtitle fw-bold">Details</p>
                    <p class="card-description"></p>
                    <div class="template-demo1">

                        <h5 class="fw-bold pt-4">Content</h5>
                        <p>
                            {{$jobdetail->content}}
                        </p>
                        <h5 class="fw-bold pt-4">About company</h5>
                        <p>
                            {{$jobdetail->about_company}}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
