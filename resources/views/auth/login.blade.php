@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="container-fluid min-vh-100 g-0">
            <div
                id="send-job-container"
                class="d-flex flex-column justify-content-center align-items-center"
            >
                <div class="col-12">
                    <img
                        src="{{asset('publicPages/images/big-logo.svg')}}"
                        alt="logo"
                        class="img-fluid mx-auto d-block"
                    />
                    <button
                        class="nxt-btn w-100 btn btn-lg btn-dark mb-3 text-white rounded-0 py-2 w-sm fw-bold fs-1"
                    >
                        Login
                    </button>
                </div>
                <div
                    class="col-12 d-flex flex-column justify-content-center align-items-center mt-5 px-md-5 px-1"
                >
                    <div class="w-100 g-0 my-4">
                        <div class="form-group mb-4">
                            <label
                                for="email"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Email</label
                            >
                            <input
                                type="text"
                                class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="email"
                                name="email"
                                placeholder="Email Address"
                                value="{{ old('email') }}"
                            />
                            @error('email')
                            <p class="text-primary"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label
                                for="pwd"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >Password</label
                            >
                            <input
                                type="password"
                                class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="pwd"
                                name="password"
                                placeholder="Password"
                            />
                            @error('password')
                            <p class="text-primary"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        @if (Route::has('password.request'))
                            <a class="link fs-3 fw-bold" href="{{ route('password.request') }}">
                                Forget password?
                            </a>
                        @endif
                        <div class="mb-5 mt-3 form-check">
                            <label for="stay-logged" class="form-check-label fs-4">
                                <input
                                    type="radio"
                                    id="stay-logged"
                                    name="remember"
                                    {{ old('remember') ? 'checked' : '' }}
                                    class="form-check-input"
                                />
                                keep Me logged in</label
                            >
                        </div>
                    </div>
                    <div
                        class="col-8 d-flex text-center flex-column justify-content-center align-items-center mt-5"
                    >
                        <button
                            type="submit"
                            class="btn btn-primary text-light fs-5 fw-semibold rounded-4 py-3 px-5 mb-2"
                        >
                            Login
                        </button>
                        <span class="text-center">
                <span class="min-md-fs fs-4 mt-2">Dont have an Account?</span>
                <a href="#" class="min-md-fs fs-4 mb-2 fw-bold link"
                >Create an account</a
                >
              </span>
                        <h2 class="fs-2 my-4 fw-bold">OR</h2>
                        <span class="min-md-fs fw-bold fs-4"
                        >You can log in or register with</span
                        >
                        <img
                            src="{{asset('publicPages/images/Vectorlinkedin.svg')}}"
                            class="mt-3 mb-5"
                            alt="linked-icon"
                            style="width: 85px"
                        />
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
