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
                <div class="card-block justify-content-center">
                    <div class="block border border-dark border rounded-4 mt-5 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">First Name</h3>
                        <h6 class="px-3 pb-2 text-muted">Amged</h6>
                    </div>
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Second Name</h3>
                        <h6 class="px-3 pb-2 text-muted">S.El-Hawrani</h6>
                    </div>
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Email</h3>
                        <h6 class="px-3 pb-2 text-muted">
                            Amged S.El-Hawrani@gmail.com
                        </h6>
                    </div>
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Phone Number</h3>
                        <h6 class="px-3 pb-2 text-muted">012345678910</h6>
                    </div>
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Gender</h3>
                        <h6 class="px-3 pb-2 text-muted">Male</h6>
                    </div>
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Position</h3>
                        <h6 class="px-3 pb-2 text-muted">Position</h6>
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
                    <div>
                        <h2 class="text-primary fw-bold mt-5 ms-4">Resume</h2>
                        <h6 class="ms-4 text-muted">Your uploaded C.V</h6>
                        <button
                            type="button"
                            class="btn btn-outline-dark fw-bold ms-3 px-3 py-3 fs-4 rounded-4"
                        >
                            Download Resume
                        </button>
                        <h6 class="ms-4 mt-2 text-muted">PDF(5 MB)</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- Profile Users End  -->
    </div>
@endsection
