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
                    User Profile
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
                                >Email</label
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
                                >Phone Number</label
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
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Gender</label
                                >
                                <select
                                    class="col-6 form-select border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="gender"
                                    name="gender"
                                    aria-label="Default select example"
                                    style="width: calc(100% - 1rem)"
                                >
                                    <option selected>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Birthday</label
                                >
                                <input
                                    name="Date"
                                    form="edit-profile"
                                    type="date"
                                    id="Date"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    value="15-6-1990"
                                    style="width: calc(100% - 1rem)"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Country</label
                                >
                                <select
                                    class="col-6 form-select border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="country"
                                    name="country"
                                    aria-label="Default select example"
                                    style="width: calc(100% - 1rem)"
                                >
                                    <option selected>Egypt</option>
                                    <option>USA</option>
                                    <option>Canada</option>
                                </select>
                            </div>
                            <small class="ms-3 form-text"
                            >Please select your country of origin</small
                            >

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Highest Level of Education</label
                                >
                                <select
                                    class="col-6 form-select border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="education"
                                    name="education"
                                    aria-label="Default select example"
                                    style="width: calc(100% - 1rem)"
                                >
                                    <option selected>Bachelor's Degree</option>
                                    <option>High School</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Job Title</label
                                >
                                <input
                                    type="text"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="jobTitle"
                                    name="jobTitle"
                                    value="Job Title"
                                />
                            </div>

                            <div class="col-12">
                                <label
                                    for="companyName"
                                    class="form-label mb-3 text-primary fw-bold fs-3"
                                >Linkedin</label
                                >
                                <input
                                    type="url"
                                    class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="linkedin"
                                    name="linkedin"
                                    value="https://eg.linkedin.com/in/amged-bekhet-87a34024"
                                />
                            </div>

                            <div class="col-md-12 d-flex py-4 w-100">
                                <button
                                    class="btn btn-primary text-light fs-5 fw-semibold rounded-4 py-3 px-5 m-auto"
                                    type="submit"
                                >
                                    Edit
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
