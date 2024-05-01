@extends('publicPages.layouts.main')

@section('publicPagesContent')
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
                    Employer Profile
                </button>
            </div>

            <div class="row d-flex mb-5 bg-light">
                <div class="col-xl-12 col-md-12 col-sm-12 py-5 px-md-5 px-1 g-0">
                    <form>
                        <div class="card-block justify-content-center row gy-5">
                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >First Name</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="firstName"
                                    name="firstName"
                                    value="Amged"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Second Name</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="secondName"
                                    name="secondName"
                                    value="S. El-Hawrani"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Company Name</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="companyName"
                                    name="companyName"
                                    value="Company Name"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Business Email</label
                                >
                                <input
                                    type="email"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="email"
                                    name="email"
                                    value="Amged S. El-Hawrani@gmail.com"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Company Phone Number</label
                                >
                                <input
                                    type="tel"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="phoneNumber"
                                    name="phoneNumber"
                                    value="012345678910"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="country"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Country</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="country"
                                    name="country"
                                    value="e.g. Egypt"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="country"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >City</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="country"
                                    name="country"
                                    value="City"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="country"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >State / Province</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="country"
                                    name="country"
                                    value="State"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="country"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Postal / Zip code</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="country"
                                    name="country"
                                    value="Postal code"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Industry</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="jobTitle"
                                    name="jobTitle"
                                    value="Industry"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >About Company</label
                                >
                                <textarea
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="jobTitle"
                                    name="jobTitle"
                                    value="Industry"
                                    rows="12"
                                ></textarea>
                            </div>

                            <div class="col-12">
                                <h2 class="text-primary fw-bold ms-4">Logo</h2>
                                <h6 class="ms-4 text-muted">Please include an image</h6>
                                <label
                                    class="btn btn-outline-dark fw-bold ms-3 px-3 py-3 fs-4 rounded-4"
                                >
                                    <input type="file" class="d-none" placeholder="" />
                                    Upload Image
                                </label>

                                <h6 class="ms-4 mt-2 text-muted">PDF, PNG, JPG (5 MB)</h6>
                            </div>

                            <div class="col-md-12 d-flex py-4 w-100">
                                <button
                                    class="btn btn-primary text-light fs-5 fw-semibold rounded-4 py-3 px-5 m-auto"
                                    type="submit"
                                >
                                    Create Account
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
