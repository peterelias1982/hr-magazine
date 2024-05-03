{{-- This file is to display employer profile summary --}}
@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <div class="container-fluid">
        <div class="row justify-content-center g-0">
            <div class="col-12 text-center g-0">
                <img
                    src="{{asset('publicPages/images/big-logo.svg')}}"
                    alt="logo"
                    class="mb-3 img-fluid"
                />
            </div>
        </div>
        <!-- Profile Employer Account Start  -->
        <div class="row d-flex justify-content-center">
            <div class="col-xl-12 col-md-12 col-sm-12 bg-dark rounded-0 h-25">
                <h1 class="text-white py-5 fw-bold text-center">Posted Jobs</h1>
            </div>
        </div>
        <div class="row d-flex overflow-auto" style="max-height: 200vh;">
            @include('publicPages.includes.employerOffcanvas')
            <div class="col-xl-8 col-md-12 col-sm-12">
                <h2 class="text-primary fw-bold mt-5 ms-4">Jobs Posted</h2>
                <div class="block border border-dark border rounded-4 mt-4 mx-4">
                    <div class="row">
                        <div class="col-xl-9 col-md-9 col-sm-9">
                            <h3 class="px-3 pt-4 pb-2 fw-bold">
                                Job Title:&nbsp;
                                <span class="fw-normal"> HR Executive </span>
                            </h3>
                            <h3 class="px-3 pt-2 pb-2 fw-bold">
                                Job Date:&nbsp;
                                <span class="fw-normal"> March 25 2024 </span>
                            </h3>
                        </div>
                        <div class="col-xl-3 col-md-3 col-sm-3">
                            <button
                                class="bg-light border-0 text-danger fw-semibold fs-2 mt-5 me-4 float-end"
                                href="#"
                            >
                                Edit
                            </button>
                        </div>
                    </div>
                    <div class="row d-flex">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <h3 class="px-3 pt-2 pb-2 fw-bold">
                                Job Description:&nbsp;
                                <span class="fw-normal">
                      Lorem ipsum dolor sit amet consectetur. Augue et rhoncus
                      sed enim pretium egestas platea. Euismod est sed
                      pellentesque condimentum amet mattis praesent ultricies
                      enim.....
                      <span class="fw-semibold">Read more</span>
                    </span>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="block border border-dark border rounded-4 mt-5 mx-4">
                    <div class="row d-flex">
                        <div class="col-xl-9 col-md-9 col-sm-9">
                            <h3 class="px-3 pt-4 pb-2 fw-bold">
                                Job Title:&nbsp;
                                <span class="fw-normal"> HR Executive </span>
                            </h3>
                            <h3 class="px-3 pt-2 pb-2 fw-bold">
                                Job Date:&nbsp;
                                <span class="fw-normal"> March 25 2024 </span>
                            </h3>
                        </div>
                        <div class="col-xl-3 col-md-3 col-sm-3">
                            <button
                                class="bg-light border-0 text-danger fw-semibold fs-2 mt-5 me-4 float-end"
                                href="#"
                            >
                                Edit
                            </button>
                        </div>
                    </div>
                    <div class="row d-flex">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <h3 class="px-3 pt-2 pb-2 fw-bold">
                                Job Description:&nbsp;
                                <span class="fw-normal">
                      Lorem ipsum dolor sit amet consectetur. Augue et rhoncus
                      sed enim pretium egestas platea. Euismod est sed
                      pellentesque condimentum amet mattis praesent ultricies
                      enim.....
                      <span class="fw-semibold">Read more</span>
                    </span>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="block border border-dark border rounded-4 mt-5 mx-4">
                    <div class="row d-flex">
                        <div class="col-xl-9 col-md-9 col-sm-9">
                            <h3 class="px-3 pt-4 pb-2 fw-bold">
                                Job Title:&nbsp;
                                <span class="fw-normal"> HR Executive </span>
                            </h3>
                            <h3 class="px-3 pt-2 pb-2 fw-bold">
                                Job Date:&nbsp;
                                <span class="fw-normal"> March 25 2024 </span>
                            </h3>
                        </div>
                        <div class="col-xl-3 col-md-3 col-sm-3">
                            <button
                                class="bg-light border-0 text-danger fw-semibold fs-2 mt-5 me-4 float-end"
                                href="#"
                            >
                                Edit
                            </button>
                        </div>
                    </div>
                    <div class="row d-flex">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <h3 class="px-3 pt-2 pb-2 fw-bold">
                                Job Description:&nbsp;
                                <span class="fw-normal">
                      Lorem ipsum dolor sit amet consectetur. Augue et rhoncus
                      sed enim pretium egestas platea. Euismod est sed
                      pellentesque condimentum amet mattis praesent ultricies
                      enim.....
                      <span class="fw-semibold">Read more</span>
                    </span>
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- CV  -->
                <h2 class="text-primary fw-bold mt-5 ms-4">Find CVs</h2>
                <div class="block border border-dark border rounded-4 mt-4 mx-4">
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-2 col-md-3 ">
                            <div class="mt-5 ms-3">
                                <img
                                    src="{{asset('publicPages/images/cv1.png')}}"
                                    class="img-fluid"
                                    alt="User-Profile-Image"
                                />
                            </div>
                        </div>
                        <div class="col-xl-10 col-md-9 ">
                            <h3 class="mt-5 pb-2 fw-bold">Job Title</h3>
                            <h4 class="fw-semibold">Thursday Dec 12 2023</h4>
                            <h4 class="fw-semibold">Nadia S. El-Hawrani</h4>
                            <p class="fs-4 fw-normal">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Neque, pellentesque dictum posuere....
                                <span class="fw-semibold">Read more</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="block border border-dark border rounded-4 mt-4 mx-4">
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-2 col-md-3 ">
                            <div class="mt-5 ms-3">
                                <img
                                    src="{{asset('publicPages/images/cv2.png')}}"
                                    class="img-fluid"
                                    alt="User-Profile-Image"
                                />
                            </div>
                        </div>
                        <div class="col-xl-10 col-md-9 ">
                            <h3 class="mt-5 pb-2 fw-bold">Job Title</h3>
                            <h4 class="fw-semibold">Thursday Dec 12 2023</h4>
                            <h4 class="fw-semibold">Adam Smith</h4>
                            <p class="fs-4 fw-normal">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Neque, pellentesque dictum posuere....
                                <span class="fw-semibold">Read more</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

