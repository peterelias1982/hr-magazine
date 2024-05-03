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
                <h1 class="text-white py-5 fw-bold text-center">Employer Profile</h1>
            </div>
        </div>
        <div class="row d-flex overflow-auto" style="max-height: 200vh;">
            @include('publicPages.includes.employerOffcanvas')
            <div class="col-xl-8 col-md-12 col-sm-12">
                <div class="card-block justify-content-center">
                    <div class="block border border-dark border rounded-4 mt-5 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">First Name</h3>
                        <h6 class="px-3 pb-2 text-muted">First Name</h6>
                    </div>
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Second Name</h3>
                        <h6 class="px-3 pb-2 text-muted">Second Name</h6>
                    </div>
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Linkedin</h3>
                        <div class="mb-3">
                            <a
                                class="px-3 pb-4 text-muted"
                                href="https://www.linkedin.com/in/amged-bekhet-87a34024/?originalSubdomain=egs"
                            >
                                https://www.linkedin.com/in/amged-bekhet-87a34024/?originalSubdomain=eg
                            </a>
                        </div>
                    </div>
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Company Name</h3>
                        <h6 class="px-3 pb-2 text-muted">Company Name</h6>
                    </div>
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Business email</h3>
                        <h6 class="px-3 pb-2 text-muted">Company@gmail.com</h6>
                    </div>
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Company Phone Number</h3>
                        <h6 class="px-3 pb-2 text-muted">012345678910</h6>
                    </div>
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Company Address</h3>
                        <h6 class="px-3 pb-2 text-muted">18, Giza, Egypt</h6>
                    </div>

                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <div class="row">
                            <div class="col-12 ">
                                <h3 class="px-3 pt-3 pb-2 fw-bold">About Company</h3>
                                <p class="px-3 pb-2 text-muted">
                                    Lorem ipsum dolor sit amet consectetur. Augue et rhoncus sed
                                    enim pretium egestas platea. Euismod est sed pellentesque
                                    condimentum amet mattis praesent ultricies enim. Ipsum justo
                                    non vestibulum diam fermentum porta. Lorem mi sem vitae
                                    proin ridiculus sed maecenas. Dui lorem viverra ornare
                                    commodo rutrum tempor rhoncus aenean donec. Orci eu ut
                                    pellentesque amet sit nibh semper. Viverra felis cursus sed
                                    vehicula sit egestas urna risus aliquet. Erat netus odio
                                    orci velit arcu venenatis purus. Tortor neque consectetur
                                    aliquam erat. Id consectetur vivamus pellentesque donec in
                                    sed. Volutpat faucibus eleifend sagittis ac rhoncus
                                    fermentum dui urna.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Profile Employer Account End  -->
        </div>
    </div>
@endsection

