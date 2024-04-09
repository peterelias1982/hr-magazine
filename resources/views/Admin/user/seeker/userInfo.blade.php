@extends("Admin.layouts.master")
@section('Content')
<form action="{{route('admin.jobSeekers.update',$user->slug)}}" method="post" enctype="multipart/form-data" id="edit-user">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="user_id" value="{{$user->jobseekeruser->user_id}}">
  @method('put')
  <div class="content-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between border-bottom py-1">
      <h2 class="fw-bold col-lg-auto">User Details</h2>
      <div class="btn-wrapper">
        <a href="deleteJobSeeker/{{ $user->slug }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-sm" style="color: #ed2708"><i class="icon-trash"></i> Delete User</a>
        <a href="#" class="btn btn-sm btn-primary text-white me-0"><i class="icon-key"></i> Reset Password
        </a>
      </div>
    </div>
    <div class="pt-4">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column">
          <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
              <div class="card card-rounded">
                <div class="card-body d-flex flex-column justify-content-around">
                  <div class="row border-bottom py-2 my-2">
                    <div class="col-4">
                      <div class="position-relative" id="change-pic">
                        <input type="file" name="user_image" id="user_pic_input" form="edit-user" class="opacity-0" disabled />
                        <img src="{{asset('admin/images/avatar-default.svg')}}" alt="" id="user-pic" class="card-img rounded-circle bg-light" />
                        <i class="mdi mdi-link-variant-plus fs-4 position-absolute bottom-0 start-75 translate-middle btn btn-sm d-none" id="user_pic_change_icon"></i>
                      </div>
                    </div>
                    <div class="col-6 my-auto">
                      <h3>
                        <input class="card-title card-title-dash fs-4 border-0 bg-transparent" type="text" name="firstName" id="" value="{{$user->firstName}} {{$user->secondName}}" form="edit-user" disabled /> 
                      </h3>
                      @error('firstName')
                      {{$message}}
                      @enderror
                      @error('secondName')
                      {{$message}}
                      @enderror
                      <h3>
                        <input class="card-title card-title-dash fs-6 border-0 bg-transparent" type="text" name="jobTitle" id="" value="{{$user->jobseekeruser->jobTitle}}" form="edit-user" disabled />
                      </h3>
                      @error('jobTitle')
                      {{$message}}
                      @enderror
                      <p class="card-subtitle card-subtitle-dash">
                        joined 3 months ago.
                      </p>
                      <div class="row justify-content-start g-2">
                        <a href="#" class="col-auto">
                          <i class="mdi mdi-linkedin text-dark"></i>
                        </a>
                        <a href="#" class="col-auto">
                          <i class="mdi mdi-instagram text-dark"></i>
                        </a>
                        <a href="#" class="col-auto">
                          <i class="mdi mdi-facebook text-dark"></i>
                        </a>
                        <a href="#" class="col-auto">
                          <i class="mdi mdi-twitter text-dark"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-between align-items-start">
                    <div class="col-auto text-center">
                      <p class="fw-bold lh-1">CV</p>
                      <div class="m-n5">
                        <input type="file" name="cv" id="user_cv_input" form="edit-user" class="d-none" disabled />
                        <a href="#" class="text-decoration-none text-black small" id="cv_text" name="cv"><small>{{$user->jobseekeruser->cv}}</small></a>
                        <input type="hidden" name="oldCV" value="{{$user->jobseekeruser->cv}}">
                        <i id="user_cv_button" class="mdi mdi-file-download fs-5 lh-1 text-danger btn btn-sm p-0"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 d-flex flex-column">
          <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
              <div class="card card-rounded">
                <div class="card-body px-4 d-flex flex-column justify-content-between">
                  <div class="row pb-2 justify-content-between align-items-center">
                    <h3 class="col-auto card-title card-title-dash">
                      Additional information
                    </h3>
                    <div class="col-auto">
                      <i class="mdi mdi-lead-pencil text-muted btn btn-sm fs-5" id="edit_user_button"></i>
                    </div>
                  </div>
                  <div class="row py-1">
                    <p class="card-text fw-bold lh-1">Position</p>
                    <p class="card-text lh-1"><input name="position" id="" class="w-100 border-0 text-black bg-transparent" value="{{$user->position}}" disabled></p>
                    @error('position')
                    {{$message}}
                    @enderror
                  </div>
                  <div class="row py-1">
                    <p class="card-text fw-bold lh-1">Email</p>
                    <p class="card-text lh-1"><input name="email" type="email" id="" class="w-100 border-0 text-black bg-transparent" value="{{$user->email}}" disabled></p>
                    @error('email')
                    {{$message}}
                    @enderror
                  </div>
                  <div class="row border-bottom py-2">
                    <p class="card-text fw-bold lh-1">Phone</p>
                    <p class="card-text lh-1"><input name="mobile" id="" class="w-100 border-0 text-black bg-transparent" value="{{$user->mobile}}" disabled></p>
                    @error('mobile')
                    {{$message}}
                    @enderror
                  </div>
                  <div class="row py-1">
                    <div class="d-flex justify-content-between">
                      <div class="col-auto form-check form-check-flat form-check-primary">
                        <label for="active" class="form-check-label">
                          <input type="checkbox" id="active" class="form-check-input" name="active" @checked($user->active) disabled />
                          Active
                        </label>
                      </div>
                      <div class="col-auto form-check form-check-flat form-check-primary">
                        <label for="approved" class="form-check-label">
                          <input type="checkbox" id="approved" class="form-check-input" name="approved" disabled />
                          Approved
                        </label>
                      </div>
                      <div class="col-auto form-check form-check-flat form-check-primary">
                        <label for="bio" class="form-check-label">
                          <input type="checkbox" id="bio" class="form-check-input" name="bio" disabled />
                          Bio
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="col d-flex flex-column">
        <div class="row flex-grow">
          <!-- Company card start -->
          <div class="col-lg-7 grid-margin stretch-card" id="companyCard">
            <div class="card card-rounded">
              <div class="card-body px-4">
                <div class="row py-2 my-2 align-items-center">
                  <div class="col-4">
                    <div class="position-relative" id="change_company_pic">
                      <input type="file" name="user_image" id="company_pic_input" form="edit-user" class="opacity-0" disabled />
                      <img src="{{asset('admin/images/hr-logo.svg')}}" alt="" id="company_pic" class="card-img rounded-circle bg-light" />
                      <i class="mdi mdi-link-variant-plus fs-4 position-absolute bottom-0 start-75 translate-middle btn btn-sm d-none" id="company_pic_change_icon"></i>
                    </div>
                  </div>
                  <div class="col-8">
                    <div class="row flex-column justify-content-between">
                      <h3 class="card-title card-title-dash pb-2">
                        Company information
                      </h3>
                      <div class="row py-1">
                        <p class="card-text fw-bold lh-1">Name</p>
                        <p class="card-text lh-1" name="company_name" type="text" id="" class="w-100 border-0 text-black bg-transparent" value="lorem ipsum" disabled></p>
                      </div>
                      <div class="row py-1">
                        <p class="card-text fw-bold lh-1">Address</p>
                        <p class="card-text lh-1" name="company_name" type="text" id="" class="w-100 border-0 text-black bg-transparent" value="Lorem ipsum, Lorem ipsum, Lorem ipsum." disabled>
                        </p>
                      </div>
                      <div class="row py-1">
                        <p class="card-text fw-bold lh-1">Phone</p>
                        <p class="card-text lh-1" name="company_phone" type="text" id="" class="w-100 border-0 text-black bg-transparent" value="+201123653" disabled></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Company card end  -->
          <div class="col-lg-5 grid-margin stretch-card" id="padding_pic">
            <img src="{{asset('admin/images/hr-logo.svg')}}" alt="" class="img-fluid rounded opacity-25" />
          </div>
          <!-- Social media card -->
          <div class="col-lg-5 grid-margin stretch-card d-none" id="social_media">
            <div class="card">
              <div class="card-body">
                <div class="card-subtitle">Social media Links</div>
                <div class="input-group mb-3">
                  <span class="input-group-text"><i class="mdi mdi-linkedin"></i></span>
                  <input type="url" class="form-control" id="exampleInputUrl" placeholder="http://LinkedIn.com" form="authors-create" name="linkedin" disabled />
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text"><i class="mdi mdi-twitter"></i></span>
                  <input type="url" class="form-control" id="exampleInputUrl" placeholder="http://Twitter.com" form="authors-create" disabled />
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text"><i class="mdi mdi-instagram"></i></span>
                  <input type="url" class="form-control" id="exampleInputUrl" placeholder="http://Instagram.com" form="authors-create" disabled />
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
                  <input type="url" class="form-control" id="exampleInputUrl" placeholder="http://Facebook.com" form="authors-create" disabled />
                </div>
              </div>
            </div>
          </div>
          <!-- Social media card end -->
        </div>
      </div>
    </div>
    <div class="d-sm-flex align-items-center justify-content-start border-top py-2">
      <div class="btn-wrapper d-none" id="submit_pannel">
        <button type="submit" class="btn btn-primary me-2" form="edit-user">
          Submit
        </button>
        <button class="btn btn-light" form="edit-user">
          Cancel
        </button>
      </div>
    </div>
  </div>
</form>
@endsection