@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <div class="container-fluid pt-5 g-0">
        <div class="row justify-content-center g-0">
            <div class="col-12 text-center g-0">
                <img
                    src="{{asset('publicPages/images/big-logo.svg')}}"
                    alt="logo"
                    class="mb-3 img-fluid"
                />
                <button
                    class="nxt-btn btn mb-2 btn-dark text-white rounded-0 py-2 w-100 fw-bold"
                >
                    Next Step
                </button>
                <div style="background-color: #f9f9f9" class="p-md-5 py-5 px-1">
                    <h2 class="text-primary mt-2 fw-bold pt-2 display-5 my-3">
                        Ready to take the next step?
                    </h2>
                    <h3 class="fs-2">Create an account or Sign in before applying</h3>
                    <p class="text-muted fs-4 px-2 my-3 text-start">
                        By creating an account or signing in, you understand and agree
                        to HRs Magazine's
                        <a href="#" class="text-decoration-none link">Terms</a>. You
                        also acknowledge our
                        <a href="#" class="text-decoration-none link">Cookie</a> and
                        <a href="#" class="text-decoration-none link"
                        >Privacy policies.</a
                        >
                        You will receive marketing messages from HRs Magazine and may
                        opt out at any time by following the unsubscribe link in our
                        messages, or as detailed in our terms.
                    </p>
                    <div
                        class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-2 my-5"
                    >
                        <span class="fw-bold fs-4">Be sure to include an update</span>
                        <a href="#" class="fw-bold fs-4 link">Resume</a>
                        <span class="text-muted">(PDF (5 MB))</span>
                    </div>
                    <div class="d-flex flex-column align-items-center my-4">
                <span class="fs-4 fw-bold"
                >You can log in or register with</span
                >
                        <button
                            type="button"
                            class="btn mb-2 bg-dark text-white px-4 py-2 my-2 fw-bold"
                        >
                            <img
                                src="{{asset('publicPages/images/blue-linkedin.svg')}}"
                                class="me-2"
                                alt="linked-icon"
                            />
                            Continue With Linkedin
                        </button>
                        <h2 class="fs-2 my-4 fw-bold">OR</h2>
                        <div class="w-100 text-start">
                            <label
                                for="email"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Email</label
                            >
                            <input
                                type="text"
                                class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4 mb-5"
                                id="email"
                                name="email"
                                placeholder="Email"
                            />
                            <div class="text-center fs-4 fw-bold mb-5">
                                Already have an account? <a href="#" class="link">Login</a>
                            </div>
                            <div class="text-center">
                                <button
                                    type="submit"
                                    class="btn btn-primary text-light fs-5 fw-semibold rounded-4 py-3 px-5"
                                >
                                    Continue
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
