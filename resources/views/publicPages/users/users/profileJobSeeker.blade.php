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
        <!-- Profile Job Seeker Start  -->
        <div class="row justify-content-center">
            <div class="col-xl-12 col-md-12 col-sm-12 bg-dark rounded-0 h-25">
                <h1 class="text-white py-5 fw-bold text-center">Users Profile</h1>
            </div>
        </div>
        <div class="row overflow-auto" style="max-height: 200vh;">
            <div class="col-xl-4 col-md-0 col-sm-0 bg-primary">
                <div class="navbar navbar-expand-xl">
                    <div class="card-block text-center text-white">
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasScrolling"
                            aria-controls="offcanvasScrolling"
                        >
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div
                            class="offcanvas offcanvas-start bg-primary text-center text-white"
                            tabindex="-1"
                            data-bs-scroll="true"
                            id="offcanvasScrolling"
                            aria-labelledby="offcanvasScrollingLabel"
                        >
                            <div class="offcanvas-header float-end">
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="offcanvas"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <img
                                src="{{asset('publicPages/images/profile.jpeg')}}"
                                class="img-fluid rounded-circle m-4"
                                alt="User-Profile-Image"
                                style="aspect-ratio: 1;"
                            />
                            <p
                                class="text-decoration-none mx-auto fw-bold fs-1 offcanvas-item pb-2"
                                style="min-width: 250px"
                            >Ahmed S.El-Hawrani</p
                            >
                            <p
                                href="profile-employer.html"
                                class="text-decoration-none mx-auto fw-bold fs-1 offcanvas-item pb-2"
                                style="min-width: 250px"
                            >012345678910</p
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-12 col-sm-12">
                <div class="card-block justify-content-center">
                    <div class="block border border-dark border rounded-4 mt-5 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Job Title</h3>
                        <h6 class="px-3 pb-2 text-muted">Job Title</h6>
                    </div>
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Email</h3>
                        <h6 class="px-3 pb-2 text-muted">
                            Amged S.El-Hawrani@gmail.com
                        </h6>
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
                        <h6 class="ms-4 text-muted">Found More Information in C.V</h6>
                        <button
                            type="button"
                            class="btn btn-outline-dark fw-bold ms-3 px-3 py-3 fs-4 rounded-4"
                        >
                            Download Resume
                        </button>
                        <h6 class="ms-4 mt-2 text-muted">PDF, PNG, JPG (5 MB)</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- Profile Job Seeker End  -->
    </div>
@endsection
