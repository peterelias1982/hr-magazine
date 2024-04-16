@extends('Admin.layouts.master')
@section('Content')
    <div class="content-wrapper">
        <div class="row py-3 justify-content-between align-items-center">
            <h2 class="fw-bold col-lg-auto">Jobs</h2>
            <div class="col-lg-auto">
                <!-- Search Bar start -->
                <div class="search-bar">
                    <form action="{{route('admin.jobs.index')}}">
                        <div class="row g-1 justify-content-lg-end justify-content-start">
                            <div class="col-6 col-lg-5 form-floating">
                                <input type="text" class="form-control" id="title" name="title">
                                <label for="title">Job title</label>
                            </div>
                            <div class="col-6 col-lg-5 form-floating">
                                <select class="form-control bg-white" id="category" name="category">
                                    <option>-</option>
                                    @foreach($jobs as $job)
                                        <option value="{{$job->jobCategory->id}}">{{$job->jobCategory->category}}</option>
                                    @endforeach
                                </select>
                                <label for="category">Select Category</label>
                            </div>
                            <button class="col-2 btn border-0 btn-md" type="submit">
                                <i class="icon-search fs-5"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Search Bar ends -->
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Jobs Table</h4>
                    <p class="card-description">List of all <code>Jobs</code></p>
                    <div class="table-responsive content">


                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Job</th>
                                <th>Employer</th>
                                <th>Category</th>
                                <th>No of applied</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jobs as $job )
                                <tr>
                                    <td>
                                        <a href="jobs/{{$job->slug}}"
                                           class="link-primary text-decoration-none">{{$job->title}}</a>
                                    </td>
                                    <td>
                                        {{$job->Employer->userEmployer->firstName}} {{$job->Employer->userEmployer->secondName}}
                                    </td>
                                    <td>{{$job->jobCategory->category}}</td>
                                    <td>{{$job->jobSeeker->count()}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
