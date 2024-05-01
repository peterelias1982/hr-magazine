@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
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
                        {{ __('Reset Password') }}
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
                                autocomplete="email"
                                placeholder="Email Address"
                                value="{{ $email ?? old('email') }}"
                                autofocus
                            />
                            @error('email')
                            <p class="text-primary"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label
                                for="pwd"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >{{ __('Password') }}</label>
                            <input
                                type="password"
                                class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="pwd"
                                name="password"
                                placeholder="Password"
                                autocomplete="new-password"
                            />
                            @error('password')
                            <p class="text-primary"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label
                                for="pwd"
                                class="form-label mb-3 text-primary fw-bold fs-3"
                            >{{ __('Confirm Password') }}</label
                            >
                            <input
                                type="password"
                                class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4"
                                id="pwd-confirm"
                                name="password_confirmation"
                                placeholder="Confirm Password"
                                autocomplete="new-password"
                            />
                            @error('password_confirmation')
                            <p class="text-primary"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                    </div>

                    <div
                        class="col-8 d-flex text-center flex-column justify-content-center align-items-center mt-5"
                    >
                        <button
                            type="submit"
                            class="btn btn-primary text-light fs-5 fw-semibold rounded-4 py-3 px-5 mb-2"
                        >
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
