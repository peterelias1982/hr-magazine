{{-- This file if the employer wants to edit his Data --}}
@extends('publicPages.layouts.main')

@section('publicPagesContent')
<div class="container-fluid g-0">
    <div class="row justify-content-center g-0">
        <div class="col-12 text-center g-0">
            <img src="{{asset('publicPages/images/big-logo.svg')}}" alt="logo" class="mb-3 img-fluid" />
        </div>
    </div>
    <!-- Edite Profile Users Start  -->
    <div class="container-fluid">
        <div class="row">
            <button class="nxt-btn btn mb-2 mx-0 btn-dark text-white rounded-0 py-2 w-100 fw-bold">
                Employer Profile
            </button>
        </div>

        <div class="row py-5 px-md-5 px-1 g-0" id="employer">
            <form action="{{route('employers.update', $user->slug)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row gy-5">

                    <h2 class="text-primary fw-bold">User Information</h2>

                    <div class="col-12">
                        <label for="firstName" class="form-label mb-3 text-primary fw-bold fs-3">First Name*</label>
                        <input type="text" class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4" id="firstName" name="firstName" placeholder="First Name" value="@isset($user) {{$user->firstName}} @endisset" />
                        @error('firstName')
                        <small><code>{{ $message }}</code></small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="secondName" class="form-label mb-3 text-primary fw-bold fs-3">Second Name*</label>
                        <input type="text" class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4" id="secondName" name="secondName" placeholder="Second Name" value="@isset($user) {{$user->secondName}} @endisset" />
                        @error('secondName')
                        <small><code>{{ $message }}</code></small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label mb-3 text-primary fw-bold fs-3">Email*</label>
                        <input type="email" class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4" id="email" name="email" placeholder="Email Address" value="@isset($user) {{$user->email}} @endisset" />
                        @error('email')
                        <small><code>{{ $message }}</code></small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="linkedin" class="form-label mb-3 text-primary fw-bold fs-3">Linkedin</label>
                        <input type="linkedin" class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4" id="linkedin" name="linkedin" placeholder="Linkedin" value="@isset($user) @if(isset($linkedinUrl)) {{$linkedinUrl}} @endif @endisset" />
                        @error('linkedin')
                        <small><code>{{ $message }}</code></small>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="phone" class="form-label mb-3 text-primary fw-bold fs-3">Phone Number</label>
                        <input type="text" class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4" id="mobile" name="mobile" placeholder="Phone Number" value="@isset($user) {{$user->mobile}} @endisset" />
                        @error('mobile')
                        <small><code>{{ $message }}</code></small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="country" class="form-label mb-3 text-primary fw-bold fs-3">Gender*</label>
                        <select class="form-select text-muted border border-dark border-3 rounded-4 py-4 ps-5 fs-4" id="country" name="gender" aria-label="Default select example">
                            <option>Please Select</option>
                            <option value="1" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="2" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                        <small><code>{{ $message }}</code></small>
                        @enderror
                        <small class="ps-5 fs-4 text-muted">Please Select your gender</small>
                    </div>
                    <div class="col-12">
                        <label for="position" class="form-label mb-3 text-primary fw-bold fs-3">Position*</label>
                        <input type="text" class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4" id="position" name="position" placeholder="Position" value="@isset($user) {{$user->position}} @endisset" />
                        @error('position')
                        <small><code>{{ $message }}</code></small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <h2 class="text-primary fw-bold ms-4 fs-3">Profile Picture</h2>
                        <h6 class="ms-4 text-muted">Please include an image</h6>
                        <label class="btn btn-outline-dark fw-bold ms-3 px-3 py-3 fs-4 rounded-4" for="uploadImage">
                            Upload Image
                        </label>
                        <input type="file" id="uploadImage" class="d-none" placeholder="" name="image" />
                        <input type="hidden" name="oldImageUser" value="{{$user->image}}">
                        <img src="{{ asset('assets/images/users/'.$user->image) }}" alt="employer" style="width:200px;">
                        <h6 class="ms-4 mt-2 text-muted">PDF, PNG, JPG (5 MB)</h6>
                        @error('image')
                        <small><code>{{ $message }}</code></small>
                        @enderror
                    </div>
                    <hr>
                    <h2 class="text-primary fw-bold">Company Information</h2>
                    <div class="col-12">
                        <label for="companyName" class="form-label mb-3 text-primary fw-bold fs-3">Company Name*</label>
                        <input type="text" class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4" id="companyName" name="companyName" placeholder="Company Name" value="@isset($user) {{$user->employerUser->companyName}} @endisset" />
                        @error('companyName')
                        <small><code>{{ $message }}</code></small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-label mb-3 text-primary fw-bold fs-3">Address*</label>
                        <input type="text" class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4" id="address" name="address" placeholder="Address" value="@isset($user) {{$user->employerUser->address}} @endisset" />
                        @error('address')
                        <small><code>{{ $message }}</code></small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="phone" class="form-label mb-3 text-primary fw-bold fs-3">Company Phone Number*</label>
                        <input type="text" class="form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4" id="phone" name="phone" placeholder=" Company Phone Number" value="@isset($user) {{$user->employerUser->phone}} @endisset" />
                        @error('phone')
                        <small><code>{{ $message }}</code></small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="companyName" class="form-label mb-3 text-primary fw-bold fs-3">About Company*</label>
                        <textarea type="text" class="col-6 form-control border border-dark border-3 rounded-4 py-4 ps-5 fs-4" id="about_company" name="about_company" value="Industry" rows="12">@isset($user) {{$user->employerUser->about_company}} @endisset</textarea>
                        @error('about_company')
                        <small><code>{{ $message }}</code></small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <h2 class="text-primary fw-bold ms-4 fs-3">Company Logo</h2>
                        <h6 class="ms-4 text-muted">Please include an image</h6>
                        <label class="btn btn-outline-dark fw-bold ms-3 px-3 py-3 fs-4 rounded-4" for="uploadLogo">
                            Upload Image
                        </label>
                        <input type="file" id="uploadLogo" class="d-none" placeholder="" name="logo" />
                        <input type="hidden" name="oldImageLogo" value="{{$user->employerUser->logo}}">
                        <img src="{{ asset('assets/images/employers/'.$user->employerUser->logo) }}" alt="company" style="width:200px;">

                        <h6 class="ms-4 mt-2 text-muted">PDF, PNG, JPG (5 MB)</h6>
                        @error('logo')
                        <small><code>{{ $message }}</code></small>
                        @enderror
                    </div>
                    <div class="col-md-12 d-flex py-4 w-100">
                        <button type="submit" class="btn btn-primary text-light fs-5 fw-semibold rounded-4 py-3 px-5 m-auto">
                            Edit Account
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <!-- Edite Profile Users End  -->
</div>
@endsection