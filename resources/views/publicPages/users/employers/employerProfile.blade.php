{{-- This file is to display employer profile summary --}}
@extends('publicPages.layouts.main')

@section('publicPagesContent')
<div class="container-fluid">
    <div class="row justify-content-center g-0">
        <div class="col-12 text-center g-0">
            <img src="{{asset('publicPages/images/big-logo.svg')}}" alt="logo" class="mb-3 img-fluid" />
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
            <div class="block border border-dark border rounded-4 mt-4 mx-4">
                <div class="row">
                    <div class="col-xl-9 col-md-9 col-sm-9">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">First Name</h3>
                        <h6 class="px-3 pb-2 text-muted">@isset($user) {{$user->firstName}} @endisset</h6>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-3">
                        <button class="bg-light border-0 text-danger fw-semibold fs-2 me-5 my-3 float-end" onclick="redirectToEdit('@isset($user) {{ route('employers.edit', $user->slug) }} @endisset')">
                            Edit
                        </button>
                        <script>
                            function redirectToEdit(url) {
                                window.location.href = url; // Redirect to the edit page
                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="block border border-dark border rounded-4 mt-4 mx-4">
                <div class="row">
                    <div class="col-xl-9 col-md-9 col-sm-9">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Second Name</h3>
                        <h6 class="px-3 pb-2 text-muted">@isset($user) {{$user->secondName}} @endisset</h6>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-3">
                        <button class="bg-light border-0 text-danger fw-semibold fs-2 me-5 my-3 float-end" onclick="redirectToEdit('@isset($user) {{ route('employers.edit', $user->slug) }} @endisset')">
                            Edit
                        </button>
                    </div>
                </div>
            </div>
            <div class="block border border-dark border rounded-4 mt-4 mx-4">
                <div class="row">
                    <div class="col-xl-9 col-md-9 col-sm-9">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Gender</h3>
                        <h6 class="px-3 pb-2 text-muted">@isset($user) {{$user->gender}} @endisset</h6>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-3">
                        <button class="bg-light border-0 text-danger fw-semibold fs-2 me-5 my-3 float-end" onclick="redirectToEdit('@isset($user) {{ route('employers.edit', $user->slug) }} @endisset')">
                            Edit
                        </button>
                    </div>
                </div>
            </div>
            <div class="block border border-dark border rounded-4 mt-4 mx-4">
                <div class="row">
                    <div class="col-xl-9 col-md-9 col-sm-9">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Email</h3>
                        <h6 class="px-3 pb-2 text-muted">@isset($user) {{$user->email}} @endisset</h6>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-3">
                        <button class="bg-light border-0 text-danger fw-semibold fs-2 me-5 my-3 float-end" onclick="redirectToEdit('@isset($user) {{ route('employers.edit', $user->slug) }} @endisset')">
                            Edit
                        </button>
                    </div>
                </div>
            </div>
            <div class="block border border-dark border rounded-4 mt-4 mx-4">
                <div class="row">
                    <div class="col-xl-9 col-md-9 col-sm-9">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Linkedin</h3>
                        @if(isset($linkedinUrl))
                        <a class="px-3 pb-4 text-muted" href="{{ $linkedinUrl }}">
                            {{$linkedinUrl}}
                        </a>
                        @endif
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-3">
                        <button class="bg-light border-0 text-danger fw-semibold fs-2 me-5 my-3 float-end" onclick="redirectToEdit('@isset($user) {{ route('employers.edit', $user->slug) }} @endisset')">
                            Edit
                        </button>
                    </div>
                </div>
            </div>
            <div class="block border border-dark border rounded-4 mt-4 mx-4">
                <div class="row">
                    <div class="col-xl-9 col-md-9 col-sm-9">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Personal Phone Number</h3>
                        <h6 class="px-3 pb-2 text-muted">@isset($user) {{$user->mobile}} @endisset</h6>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-3">
                        <button class="bg-light border-0 text-danger fw-semibold fs-2 me-5 my-3 float-end" onclick="redirectToEdit('@isset($user) {{ route('employers.edit', $user->slug) }} @endisset')">
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
                            @isset($user) {{$user->position}} @endisset
                        </h6>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-3">
                        <button class="bg-light border-0 text-danger fw-semibold fs-2 me-5 my-3 float-end" onclick="redirectToEdit('@isset($user) {{ route('employers.edit', $user->slug) }} @endisset')">
                            Edit
                        </button>
                    </div>
                </div>
            </div>
            <div class="block border border-dark border rounded-4 mt-4 mx-4">
                <div class="row">
                    <div class="col-xl-9 col-md-9 col-sm-9">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Company Name</h3>
                        <h6 class="px-3 pb-2 text-muted">
                            @isset($user) {{$user->employerUser->companyName}} @endisset
                        </h6>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-3">
                        <button class="bg-light border-0 text-danger fw-semibold fs-2 me-5 my-3 float-end" onclick="redirectToEdit('@isset($user) {{ route('employers.edit', $user->slug) }} @endisset')">
                            Edit
                        </button>
                    </div>
                </div>
            </div>
            <div class="block border border-dark border rounded-4 mt-4 mx-4">
                <div class="row">
                    <div class="col-xl-9 col-md-9 col-sm-9">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Company Phone Number</h3>
                        <h6 class="px-3 pb-2 text-muted">
                            @isset($user) {{$user->employerUser->phone}} @endisset
                        </h6>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-3">
                        <button class="bg-light border-0 text-danger fw-semibold fs-2 me-5 my-3 float-end" onclick="redirectToEdit('@isset($user) {{ route('employers.edit', $user->slug) }} @endisset')">
                            Edit
                        </button>
                    </div>
                </div>
            </div>
            <div class="block border border-dark border rounded-4 mt-4 mx-4">
                <div class="row">
                    <div class="col-xl-9 col-md-9 col-sm-9">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Company Address</h3>
                        <h6 class="px-3 pb-2 text-muted">
                            @isset($user) {{$user->employerUser->address}} @endisset
                        </h6>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-3">
                        <button class="bg-light border-0 text-danger fw-semibold fs-2 me-5 my-3 float-end" onclick="redirectToEdit('@isset($user) {{ route('employers.edit', $user->slug) }} @endisset')">
                            Edit
                        </button>
                    </div>
                </div>
            </div>
            <div class="block border border-dark border rounded-4 mt-4 mx-4">
                <div class="row">
                    <div class="col-xl-9 col-md-9 col-sm-9">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">About Company</h3>
                        <p class="px-3 pb-2 text-muted">
                            @isset($user) {{$user->employerUser->about_company}} @endisset
                        </p>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-3">
                        <button class="bg-light border-0 text-danger fw-semibold fs-2 me-5 my-3 float-end" onclick="redirectToEdit('@isset($user) {{ route('employers.edit', $user->slug) }} @endisset')">
                            Edit
                        </button>
                    </div>
                </div>
            </div>
            <!-- Adding Delete Employer Account -->
            <div class="btn-wrapper">
                <form action="@isset($user) {{route('employers.destroy', $user->slug)}} @endisset" method="GET">
                    <button type="submit" class="bg-light border-0 text-danger fw-semibold fs-2 me-5 my-3" onclick="alert('Are you sure you want to delete account?')"><i class="icon-trash"></i>
                        Delete Account
                    </button>
                </form>
            </div>


        </div>
        <!-- Profile Employer Account End  -->
    </div>
</div>
@endsection