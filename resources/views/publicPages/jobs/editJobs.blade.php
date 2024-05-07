@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <!-- start of content -->
    <div class="container-fluid g-0">
        <div class="row justify-content-center g-0">
            <div class="col-12 text-center g-0">
                <img
                    src="{{asset('publicPages/images/big-logo.svg')}}"
                    alt="logo"
                    class="mb-3 img-fluid"
                />
            </div>
        </div>
        <!-- Edite Profile Users Start  -->
        <div class="container-fluid">
            <div class="row">
                <button
                    class="nxt-btn btn mb-2 mx-0 btn-dark text-white rounded-0 py-2 w-100 fw-bold"
                >
                    Post Job
                </button>
            </div>

            <div class="row d-flex mb-5 bg-light">
                <div class="col-xl-12 col-md-12 col-sm-12 py-5 px-md-5 px-1 g-0">
                    <form action="{{route('jobs.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-block justify-content-center row gy-5">
                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Job Title*</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="firstName"
                                    name="title"
                                    value="{{$job->title}}"
                                />
                                @error('title')
                                <p style="color: red"> {{$message}}</p>
                            @enderror
                            </div>


                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Job Category*</label
                                >
                                <select
                                    class="form-select text-muted border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="country"
                                    aria-label="Default select example" name="category_id"
                                >
                                    <option selected>Please Select</option>
                                    @foreach ($jobCategory as $Category )
                                    <option value="{{$Category->id}}" @selected($Category->id==$job->category_id) > {{$Category->category}}</option>
                                    @endforeach

                                </select>
                                @error('category_id')
                                <p style="color: red"> {{$message}}</p>
                            @enderror
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Career Level*</label
                                >
                                <select
                                    class="form-select text-muted border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="country"
                                    aria-label="Default select example" name="careerLevel"
                                >
                                    <option value="" >Career Level</option>
                                    @foreach ($levels as $level)
                                    <option value="{{$level->value}}"  @selected($level->value==$job->careerLevel)>{{$level->value}}</option>

                                    @endforeach

                                </select>
                                @error('careerLevel')
                                <p style="color: red"> {{$message}}</p>
                            @enderror
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Company Name*</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="companyName"
                                    name="company"
                                    value="{{$job->company}}"
                                />
                                @error('company')
                                <p style="color: red"> {{$message}}</p>
                            @enderror
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Applying Deadline*</label
                                >
                                <input
                                    type="date"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="companyName"
                                    name="deadline"
                                    value="{{$job->deadline}}"
                                    placeholder="Deadline"
                                />
                                @error('deadline')
                                <p style="color: red"> {{$message}}</p>
                            @enderror

                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Street Number*</label
                                >
                                <input
                                    type="number"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="companyName"
                                    name="streetNo"
                                    placeholder="Street Number"
                                    value="{{$job->streetNo}}"
                                />
                                @error('streetNo')
                                <p style="color: red"> {{$message}}</p>
                            @enderror
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Street Name*</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    name="streetName"
                                    value="{{$job->streetName}}"
                                />
                                @error('streetName')
                                <p style="color: red"> {{$message}}</p>
                            @enderror
                            </div>
                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >City*</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="city"
                                    name="city"
                                    value="{{$job->city}}"
                                />
                                @error('city')
                                <p style="color: red"> {{$message}}</p>
                            @enderror
                            </div>
                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >State / Province*</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="companyName"
                                    name="state"
                                    value="{{$job->state}}"
                                />
                                @error('state')
                                <p style="color: red"> {{$message}}</p>
                            @enderror
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Postal Code*</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="companyName"
                                    name="postalCode"
                                    value="{{$job->postalCode}}"
                                />
                                @error('postalCode')
                                <p style="color: red"> {{$message}}</p>
                            @enderror
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Country*</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="companyName"
                                    name="country"
                                    value="{{$job->country}}"
                                />
                                @error('country')
                                <p style="color: red"> {{$message}}</p>
                            @enderror
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Business Email*</label
                                >
                                <input
                                    type="email"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="email"
                                    name="email"
                                    value="{{$job->email}}"
                                />
                                @error('email')
                                <p style="color: red"> {{$message}}</p>
                            @enderror
                            </div>
                            </div>
                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >About Company*</label
                                >
                                <textarea
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="jobTitle"
                                    name="about_company"
                                    rows="12"
                                >{{$job->about_company}}</textarea>
                            @error('about_company')
                            <p style="color: red"> {{$message}}</p>
                        @enderror
                            </div>
                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Job Description*</label
                                >
                                <textarea
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="jobTitle"
                                    name="content"
                                    value="Industry"
                                    rows="12"
                                >{{$job->content}}</textarea >
                                @error('content')
                                <p style="color: red"> {{$message}}</p>
                            @enderror
                            </div>


                            <div class="col-12">
                                <input type="hidden" value="{{$job->image}}">
                                <h2 class="text-primary fw-bold ms-4">Post image*</h2>
                                <h6 class="ms-4 text-muted">Please include an image</h6>
                                <label
                                    class="btn btn-outline-dark fw-bold ms-3 px-3 py-3 fs-4 rounded-4"
                                >
                                    <input type="file" class="d-none" placeholder=""  name="image" />

                                    Upload Image

                                </label>
                                @error('image')
                                <p style="color: red" class="ms-4 mt-2"> {{$message}}</p>
                            @enderror
                                <h6 class="ms-4 mt-2 text-muted">PDF, PNG, JPG (5 MB)</h6>

                            </div>

                            <div class="col-md-12 d-flex py-4 w-100">
                                <button
                                    class="btn btn-primary text-light fs-5 fw-semibold rounded-4 py-3 px-5 m-auto"
                                    type="submit"
                                >
                                    Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edite Profile Users End  -->
    </div>
@endsection
