@extends("Admin.layouts.master")
@section('Content')
    <form action="{{route('admin.jobSeekers.update',$user->slug)}}" method="post" enctype="multipart/form-data"
          id="edit-user">
        @csrf
        @method('patch')
    </form>
    <div class="content-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between border-bottom py-1">
            <h2 class="fw-bold col-lg-auto">User Details</h2>
            <form action="{{route('admin.jobSeekers.destroy', $user->slug)}}" method="POST" id="deleteJobSeeker">
                @csrf
                @method('delete')
            </form>
            <div class="btn-wrapper">
                <button form="deleteJobSeeker" onclick="return confirm('Are you sure you want to delete?')"
                        class="btn btn-sm" style="color: #ed2708"><i class="icon-trash"></i> Delete User
                </button>
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
                                                <img src="{{asset('assets/images/users/' . $user->image)}}" alt=""
                                                     id="user-pic" class="card-img rounded-circle bg-light"/>
                                                <i class="mdi mdi-link-variant-plus fs-4 position-absolute bottom-0 start-75 translate-middle btn btn-sm d-none"
                                                   id="user_pic_change_icon"></i>
                                            </div>
                                        </div>
                                        <div class="col-6 my-auto">
                                            <h3>
                                                {{$user->firstName}} {{$user->secondName}}
                                            </h3>
                                            <p class="card-subtitle card-subtitle-dash">
                                                joined {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans(['parts' => 1])}}.
                                            </p>
                                            <div class="row justify-content-start g-2">
                                                @foreach ($user->SocialMedia as $socialMedia)
                                                    <a href="{{ $socialMedia->pivot->value }}" class="col-auto">
                                                        <i class="mdi mdi-{{$socialMedia->mediaName}} text-dark"></i>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between align-items-start">
                                        <div class="col-auto text-center">
                                            <p class="fw-bold lh-1">CV</p>
                                            <div class="m-n5">
                                                <a href="{{asset('assets/cvs/'.$user->jobSeekerUser?->cv)}}"
                                                   class="text-decoration-none text-black small"><small>{{$user->jobSeekerUser?->cv}}</small></a>
                                                <i id="user_cv_button"
                                                   class="mdi mdi-file-download fs-5 lh-1 text-danger btn btn-sm p-0"></i>
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
                                            <i class="mdi mdi-lead-pencil text-muted btn btn-sm fs-5"
                                               id="edit_user_button"></i>
                                        </div>
                                    </div>
                                    <div class="row py-1">
                                        <p class="card-text fw-bold lh-1">Position</p>
                                        <p class="card-text lh-1">{{$user->position}}</p>
                                    </div>
                                    <div class="row py-1">
                                        <p class="card-text fw-bold lh-1">Email</p>
                                        <p class="card-text lh-1">{{$user->email}}</p>
                                    </div>

                                    <div class="row border-bottom py-2">
                                        <p class="card-text fw-bold lh-1">Phone</p>
                                        <p class="card-text lh-1">{{$user->mobile}}</p>
                                    </div>

                                    <div class="row py-1">
                                        <div class="d-flex justify-content-between">
                                            <div class="col-auto form-check form-check-flat form-check-primary">
                                                <label for="active" class="form-check-label">
                                                    <input type="checkbox" id="active" class="form-check-input"
                                                           form="edit-user" name="active"
                                                           @checked($user->active) disabled/>
                                                    Active
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
                    <div class="col-lg-5 grid-margin stretch-card" id="padding_pic">
                        <img src="{{asset('admin/images/hr-logo.svg')}}" alt="" class="img-fluid rounded opacity-25"/>
                    </div>
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
@endsection
