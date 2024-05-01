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
        <div class="row bg-light my-5 ">
            <div class="row g-0">
                <div class="col-6">
                    <a href="{{ URL::current() }}">
                        <button
                            class="btn-users btn btn-dark text-white rounded-0 w-100 fw-bold fs-2 py-5"
                        >
                            Users
                        </button>
                    </a>
                </div>
                <div class="col-6">
                    <a href="{{ URL::current() }}?user=employer#employerForm">
                        <button
                            class="btn-employer btn btn-dark text-white rounded-0 w-100 fs-2 fw-bold py-5"
                        >
                            Employer
                        </button>
                    </a>
                </div>
            </div>

            <div class="row py-5 px-md-5 px-1 g-0" id="user">
                <form>
                    <div class="row gy-5 ">
                        <div class="col-12">
                            <label
                                for="firstName"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >First Name*</label>
                            <input
                                type="text"
                                class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="firstName"
                                name="firstName"
                                placeholder="First Name"
                            />
                        </div>
                        <div class="col-12">
                            <label
                                for="secondName"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Second Name*</label
                            >
                            <input
                                type="text"
                                class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="secondName"
                                name="secondName"
                                placeholder="Second Name"
                            />
                        </div>
                        <div class="col-12">
                            <label
                                for="email"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Email*</label
                            >
                            <input
                                type="email"
                                class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="email"
                                name="email"
                                placeholder="Email Address"
                            />
                        </div>
                        <div class="col-12">
                            <label
                                for="password"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Password*</label>
                            <input
                                type="text"
                                class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="password"
                                name="password"
                                placeholder="Password"
                            />
                        </div>
                        <div class="col-12">
                            <label
                                for="confirm-password"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Confirm Password*</label
                            >
                            <input
                                type="text"
                                class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="confirm-password"
                                name="confirm-password"
                                placeholder="Confirm Password"
                            />
                        </div>
                        <div class="col-12">
                            <label
                                for="phone"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Phone Number</label
                            >
                            <input
                                type="text"
                                class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="phone"
                                name="phone"
                                placeholder="Phone Number"
                            />
                        </div>
                        <div class="col-12">
                            <label
                                for="country"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Gender*</label>
                            <select class="form-select text-muted border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="country"
                                    name="gender" aria-label="Default select example">
                                <option selected>Please Select</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                            <small class="ps-5 fs-4 text-muted">Please Selecte your gender</small>
                        </div>
                        <div class="col-12">
                            <label
                                for="position"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Position*</label
                            >
                            <input
                                type="text"
                                class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="position"
                                name="position"
                                placeholder="Position"
                            />
                        </div>
                        <div class="col-12">
                            <h2 class="text-primary fw-bold ms-4 fs-3">Profile Picture</h2>
                            <h6 class="ms-4 text-muted">Please include an image</h6>
                            <label
                                class="btn btn-outline-dark fw-bold ms-3 px-3 py-3 fs-4 rounded-4"
                            >
                                <input type="file" class="d-none" placeholder=""/>
                                Upload Image
                            </label>

                            <h6 class="ms-4 mt-2 text-muted">PDF, PNG, JPG (5 MB)</h6>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <label
                                    for="flexRadioDefault2"
                                    class="form-check-label fs-4"
                                >
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="flexRadioDefault"
                                        id="flexRadioDefault2"
                                    />
                                    I agree to
                                    <a
                                        href="#"
                                        class="text-info link-underline link-underline-opacity-0"
                                    >termes of serves</a
                                    >
                                    and
                                    <a
                                        href="#"
                                        class="text-info link-underline link-underline-opacity-0"
                                    >privacy policy.</a
                                    ></label
                                >
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <label
                                    for="flexRadioDefault1"
                                    class="form-check-label fs-4"
                                >
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="flexRadioDefault"
                                        id="flexRadioDefault1"
                                    />
                                    I agree to receive email communication and
                                    notifications.</label
                                >
                            </div>
                        </div>
                        <div class="col-md-12 d-flex py-4 w-100">
                            <button
                                type="submit"
                                class="btn btn-primary text-light fs-5 fw-semibold rounded-4 py-3 px-5 m-auto"
                            >
                                Create Account
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="row py-5 px-md-5 px-1 g-0" id="employer">
                <form>
                    <div class="row gy-5">

                        <h2 class="text-primary fw-bold">User Information</h2>

                        <div class="col-12">
                            <label
                                for="firstName"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >First Name*</label>
                            <input
                                type="text"
                                class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="firstName"
                                name="firstName"
                                placeholder="First Name"
                            />
                        </div>
                        <div class="col-12">
                            <label
                                for="secondName"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Second Name*</label
                            >
                            <input
                                type="text"
                                class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="secondName"
                                name="secondName"
                                placeholder="Second Name"
                            />
                        </div>
                        <div class="col-12">
                            <label
                                for="email"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Email*</label
                            >
                            <input
                                type="email"
                                class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="email"
                                name="email"
                                placeholder="Email Address"
                            />
                        </div>
                        <div class="col-12">
                            <label
                                for="password"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Password*</label>
                            <input
                                type="text"
                                class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="password"
                                name="password"
                                placeholder="Password"
                            />
                        </div>
                        <div class="col-12">
                            <label
                                for="confirm-password"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Confirm Password*</label
                            >
                            <input
                                type="text"
                                class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="confirm-password"
                                name="confirm-password"
                                placeholder="Confirm Password"
                            />
                        </div>
                        <div class="col-12">
                            <label
                                for="phone"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Phone Number</label
                            >
                            <input
                                type="text"
                                class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="phone"
                                name="phone"
                                placeholder="Phone Number"
                            />
                        </div>
                        <div class="col-12">
                            <label
                                for="country"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Gender*</label>
                            <select class="form-select text-muted border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                    id="country"
                                    name="gender" aria-label="Default select example">
                                <option selected>Please Select</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                            <small class="ps-5 fs-4 text-muted">Please Selecte your gender</small>
                        </div>
                        <div class="col-12">
                            <label
                                for="position"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Position*</label
                            >
                            <input
                                type="text"
                                class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="position"
                                name="position"
                                placeholder="Position"
                            />
                        </div>
                        <div class="col-12">
                            <h2 class="text-primary fw-bold ms-4 fs-3">Profile Picture</h2>
                            <h6 class="ms-4 text-muted">Please include an image</h6>
                            <label
                                class="btn btn-outline-dark fw-bold ms-3 px-3 py-3 fs-4 rounded-4"
                            >
                                <input type="file" class="d-none" placeholder=""/>
                                Upload Image
                            </label>

                            <h6 class="ms-4 mt-2 text-muted">PDF, PNG, JPG (5 MB)</h6>
                        </div>
                        <hr>
                        <h2 class="text-primary fw-bold">Company Information</h2>
                        <div class="col-12">
                            <label
                                for="companyName"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Company Name*</label>
                            <input
                                type="text"
                                class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="companyName"
                                name="companyName"
                                placeholder="Company Name"
                            />
                        </div>
                        <div class="col-12">
                            <label
                                for="address"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Address*</label>
                            <input
                                type="text"
                                class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="address"
                                name="address"
                                placeholder="Address"
                            />
                        </div>
                        <div class="col-12">
                            <label
                                for="phone"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Company Phone Number*</label>
                            <input
                                type="text"
                                class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="phone"
                                name="phone"
                                placeholder=" Company Phone Number"
                            />
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
                                name="jobTitle"
                                value="Industry"
                                rows="12"
                            ></textarea>
                        </div>
                        <div class="col-12">
                            <h2 class="text-primary fw-bold ms-4 fs-3">Company Logo</h2>
                            <h6 class="ms-4 text-muted">Please include an image</h6>
                            <label
                                class="btn btn-outline-dark fw-bold ms-3 px-3 py-3 fs-4 rounded-4"
                            >
                                <input type="file" class="d-none" placeholder=""/>
                                Upload Image
                            </label>

                            <h6 class="ms-4 mt-2 text-muted">PDF, PNG, JPG (5 MB)</h6>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <label
                                    for="flexRadioDefault2"
                                    class="form-check-label fs-4"
                                >
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="flexRadioDefault"
                                        id="flexRadioDefault2"
                                    />
                                    I agree to
                                    <a
                                        href="#"
                                        class="text-info link-underline link-underline-opacity-0"
                                    >termes of serves</a
                                    >
                                    and
                                    <a
                                        href="#"
                                        class="text-info link-underline link-underline-opacity-0"
                                    >privacy policy.</a
                                    ></label
                                >
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <label
                                    for="flexRadioDefault1"
                                    class="form-check-label fs-4"
                                >
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="flexRadioDefault"
                                        id="flexRadioDefault1"
                                    />
                                    I agree to receive email communication and
                                    notifications.</label
                                >
                            </div>
                        </div>
                        <div class="col-md-12 d-flex py-4 w-100">
                            <button
                                type="submit"
                                class="btn btn-primary text-light fs-5 fw-semibold rounded-4 py-3 px-5 m-auto"
                            >
                                Create Account
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@section('publicPagesExtraJS')
    <script>
        const user = document.getElementById('user');
        const employer = document.getElementById('employer');

        const hash = window.location.hash;

        if(hash === '#employerForm'){
            user.classList.add('d-none');
            employer.classList.remove('d-none');
        } else {
            user.classList.remove('d-none');
            employer.classList.add('d-none');
        }
    </script>
@endsection
