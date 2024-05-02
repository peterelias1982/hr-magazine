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
        <!-- Profile Users Start  -->
        <div class="row d-flex justify-content-center">
            <div class="col-xl-12 col-md-12 col-sm-12 bg-dark rounded-0 h-25">
                <h1 class="text-white py-5 fw-bold text-center">Users Profile</h1>
            </div>
        </div>
        <div class="row overflow-auto" style="max-height: 200vh">
            @include('publicPages.includes.userOffcanvas')
            <div class="col-xl-8 col-md-12 col-sm-12">
                <div class="block border border-dark border rounded-4 mt-4 mx-4">
                    <div class="row">
                        <div class="col-xl-9 col-md-9 col-sm-9">
                            <h3 class="px-3 pt-3 pb-2 fw-bold">Name</h3>
                            <h6 class="px-3 pb-2 text-muted">Amged S.El-Hawrani</h6>
                        </div>
                        <div class="col-xl-3 col-md-3 col-sm-3">
                            <button
                                class="bg-light border-0 text-danger fw-semibold fs-2 me-5 my-3 float-end"
                                href="#"
                            >
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
                <div class="block border border-dark border rounded-4 mt-4 mx-4">
                    <div class="row">
                        <div class="col-xl-9 col-md-9 col-sm-9">
                            <h3 class="px-3 pt-3 pb-2 fw-bold">Email</h3>
                            <h6 class="px-3 pb-2 text-muted">
                                Amged S.El-Hawrani@gmail.com
                            </h6>
                        </div>
                        <div class="col-xl-3 col-md-3 col-sm-3">
                            <button
                                class="bg-light border-0 text-danger fw-semibold fs-2 me-5 my-3 float-end"
                                href="#"
                            >
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
                <div class="block border border-dark border rounded-4 mt-4 mx-4">
                    <div class="row">
                        <div class="col-xl-9 col-md-9 col-sm-9">
                            <h3 class="px-3 pt-3 pb-2 fw-bold">Position</h3>
                            <h6 class="px-3 pb-2 text-muted">
                                Software Engineer
                            </h6>
                        </div>
                        <div class="col-xl-3 col-md-3 col-sm-3">
                            <button
                                class="bg-light border-0 text-danger fw-semibold fs-2 me-5 my-3 float-end"
                                href="#"
                            >
                                Edit
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-5">
                    <h2 class="text-primary fw-bold ms-4 fs-3">Currently, you don't an Uploaded Resume</h2>
                    <h6 class="ms-4 text-muted">Please include an resume</h6>
                    <label
                        class="btn btn-outline-dark fw-bold ms-3 px-3 py-3 fs-4 rounded-4"
                    >
                        <input type="file" class="d-none" placeholder=""/>
                        Upload Resume
                    </label>

                    <h6 class="ms-4 mt-2 text-muted">PDF (5 MB)</h6>
                </div>
            </div>
        </div>
        <!-- Profile Users End  -->
    </div>
@endsection
