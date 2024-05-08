@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <!-- start of content -->
    <h2
        class="text-center bg-dark text-white py-5 mt-3 mb-0 fs-2 fw-bold mx-auto"
    >
        HR Executive
    </h2>
    <div class="container-fluid g-0 bg-light pt-3 pb-5" style="word-wrap: break-word">
        <div class="row pt-5 px-md-4 px-sm-1 px-lg-5">
            <div class="col-lg-6 col-12">
                <h3 class="text-primary fs-3 fw-bold row">
                    <span class="col-5">Job Title:</span><span class="text-dark col-7">{{$jobDetails->title}}</span>
                </h3>
                <h3 class="text-primary fs-3 fw-bold row">
                    <span class="col-5">Company:</span><span class="text-dark col-7">{{$jobDetails->company}}</span>
                </h3>
                <h3 class="text-primary fs-3 fw-bold row">
                    <span class="col-5">Career Level:</span><span class="text-dark col-7">{{$jobDetails->careerLevel}}</span>
                </h3>
            </div>
            <div class="col-lg-6 col-12">
                <h3 class="text-primary fs-3 fw-bold row">
                    <span class="col-5">Applying Deadline:</span><span class="text-dark col-7">
                        {{ date_format(date_create($jobDetails->deadline),'M d Y')}} </span>
                </h3>
                <h3 class="text-primary fs-3 fw-bold row">
                    <span class="col-5">Email to Apply:</span><span class="text-dark col-7">{{$jobDetails->email}}</span>
                </h3>
                <h3 class="text-primary fs-3 fw-bold row">
                    <span class="col-5">Address:</span><span class="text-dark col-7">{{$jobDetails->streetNo}} -
                        {{$jobDetails->streetName}} - {{$jobDetails->city}} - {{$jobDetails->country}} </span>
                </h3>
            </div>

            <div class="col-lg-6">
                <h3 class="text-primary fs-3 fw-bold row">
                    <span class="col-5">Published by:</span><span class="text-dark col-7"><a href="{{route('employers.show', $jobDetails->Employer->userEmployer->slug)}}">
                    {{$jobDetails->Employer->userEmployer->firstName}} {{$jobDetails->Employer->userEmployer->secondName}}</a></span>
                </h3>
            </div>
            <div class="col-12">
                <article>
                    <h3 class="fs-3 text-danger fw-bold py-5">About Company:</h3>
                    <p class="fw-semibold">{{$jobDetails->about_company}} </p>

                    <h3 class="fs-3 text-danger fw-bold py-5">Job Description:</h3>
                    <p class="fw-semibold">

                        {{$jobDetails->content}}
                    </p>




                    <div class="pb-5 w-100 justify-content-md-start mt-5">
                        <a href="#">
                            <button
                                class="btn btn-primary text-light fs-5 fw-semibold rounded-4 py-3 px-5"
                            >
                                Apply Job
                            </button>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection
