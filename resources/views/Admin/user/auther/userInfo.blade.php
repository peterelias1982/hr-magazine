@extends("Admin.layouts.master")
@section('Content')
    <form action="{{route('admin.authors.update',$user->slug)}}" id="edit-user" enctype="multipart/form-data" method="POST">
        @csrf
        @method('put')
        <input type="hidden" name="oldImage" value="{{$user->image}}">
    </form>
    @error('firstName')
    {{$message}}
    @enderror
    @error('secondName')
    {{$message}}
    @enderror
    @error('email')
    {{$message}}
    @enderror
    @error('position')
    {{$message}}
    @enderror
    @error('gender')
    {{$message}}
    @enderror
    <div class="content-wrapper">
        <div
            class="d-sm-flex align-items-center justify-content-between border-bottom py-1"
        >
            <h2 class="fw-bold col-lg-auto">User Details</h2>
            <div class="btn-wrapper">
                <form action="{{route('admin.authors.destroy',[$user->slug])}}" method="POST" id="delete"
                >
                    @csrf
                    @method("delete")
                </form>
                <button type="submit" class="btn btn-sm" style="color: #ed2708" form="delete"
                        onclick="alert('Are you sure you want to delete?')"><i class="icon-trash"></i> Delete User
                </button>

                <a href="#" class="btn btn-sm btn-primary text-white me-0"
                ><i class="icon-key"></i> Reset Password
                </a>
            </div>
        </div>
        <div class="pt-4">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column">
                    <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div
                                    class="card-body d-flex flex-column justify-content-around"
                                >
                                    <div class="row py-2 my-2">
                                        <div class="col-4">
                                            <div class="position-relative" id="change-pic">
                                                <input
                                                    type="file"
                                                    name="image"
                                                    id="user_pic_input"
                                                    form="edit-user"
                                                    class="opacity-0"
                                                    disabled
                                                />
                                                <img
                                                    src="{{asset('assets/images/users/'.$user->image)}}"
                                                    alt=""
                                                    id="user-pic"
                                                    class="card-img rounded-circle bg-light"
                                                />
                                                <i
                                                    class="mdi mdi-link-variant-plus fs-4 position-absolute bottom-0 start-75 translate-middle btn btn-sm d-none"
                                                    id="user_pic_change_icon"
                                                ></i>
                                            </div>
                                        </div>
                                        <div class="col-6 my-auto">
                                            <h3>
                                                <input
                                                    class="card-title card-title-dash fs-4 border-0 bg-transparent"
                                                    type="text"
                                                    name="firstName"
                                                    id=""
                                                    value="{{$user->firstName}}"
                                                    form="edit-user"
                                                    disabled
                                                />
                                                <input
                                                    class="card-title card-title-dash fs-4 border-0 bg-transparent"
                                                    type="text"
                                                    name="secondName"
                                                    id=""
                                                    value="{{$user->secondName}}"
                                                    form="edit-user"
                                                    disabled
                                                />
                                            </h3>
                                            <p class="card-subtitle card-subtitle-dash">
                                                joined {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans(['parts' => 1])}}
                                                .
                                            </p>
                                            <div class="row justify-content-start g-2">
                                                @foreach($user->socialMedia as $social)
                                                    <a href="{{ $social->pivot->value }}" class="col-auto">
                                                        <i class="mdi mdi-{{$social->mediaName}} text-dark"></i>
                                                    </a>
                                                @endforeach
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
                                <div
                                    class="card-body px-4 d-flex flex-column justify-content-between"
                                >
                                    <div
                                        class="row pb-2 justify-content-between align-items-center"
                                    >
                                        <h3 class="col-auto card-title card-title-dash">
                                            Additional information
                                        </h3>
                                        <div class="col-auto">
                                            <i class="mdi mdi-lead-pencil text-muted btn btn-sm fs-5"
                                               id="edit_user_button"></i>
                                        </div>
                                    </div>
                                    <div class="row py-1">
                                        <p class="card-text fw-bold lh-1">Description</p>
                                        <p class="card-text lh-1">
                                            <input
                                                name="shortDescription"
                                                form="edit-user"
                                                id=""
                                                class="w-100 border-0 text-black bg-transparent"
                                                value="{{$user->authorUser->description}}"
                                                disabled
                                            >
                                        </p>
                                    </div>
                                    <div class="row py-1">
                                        <p class="card-text fw-bold lh-1">Position</p>
                                        <p class="card-text lh-1"><input
                                                form="edit-user"
                                                name="position"
                                                id=""
                                                class="w-100 border-0 text-black bg-transparent"
                                                value="{{$user->position}}"
                                                disabled
                                            ></p>
                                    </div>
                                    <div class="row py-1">
                                        <p class="card-text fw-bold lh-1">
                                            Gender
                                        </p>
                                        <p class="card-text lh-1">
                                            <select
                                                class="w-100 border-0 text-black bg-transparent"
                                                form="edit-user"
                                                id="gender"
                                                name="gender"
                                            >
                                                <option value="{{\App\Enums\Gender::Male->value}}" @selected($user->gender === \App\Enums\Gender::Male->value)>Male</option>
                                                <option value="{{\App\Enums\Gender::Female->value}}" @selected($user->gender === \App\Enums\Gender::Female->value)>Female</option>

                                            </select>
                                        </p>
                                    </div>
                                    <div class="row py-1">
                                        <p class="card-text fw-bold lh-1">Email</p>
                                        <p class="card-text lh-1"><input
                                                form="edit-user"
                                                name="email"
                                                type="email"
                                                id=""
                                                class="w-100 border-0 text-black bg-transparent"
                                                value="{{$user->email}}"
                                                disabled
                                            ></p>
                                    </div>
                                    <div class="row border-bottom py-2">
                                        <p class="card-text fw-bold lh-1">Phone</p>
                                        <p class="card-text lh-1"><input
                                                form="edit-user"
                                                name="mobile"
                                                id=""
                                                class="w-100 border-0 text-black bg-transparent"
                                                value="{{$user->mobile}}"
                                                disabled
                                            ></p>
                                    </div>
                                    <div class="row py-1">
                                        <div class="d-flex justify-content-between">
                                            <div
                                                class="col-auto form-check form-check-flat form-check-primary"
                                            >
                                                <label
                                                    for="active"
                                                    class="form-check-label"
                                                >
                                                    <input
                                                        type="checkbox"
                                                        form="edit-user"
                                                        id="active"
                                                        class="form-check-input"
                                                        name="active"
                                                        @checked($user->active)
                                                        disabled
                                                    />
                                                    Active
                                                </label>
                                            </div>
                                            <div
                                                class="col-auto form-check form-check-flat form-check-primary"
                                            >
                                                <label
                                                    for="approved"
                                                    class="form-check-label"
                                                >
                                                    <input
                                                        form="edit-user"
                                                        type="checkbox"
                                                        id="approved"
                                                        class="form-check-input"
                                                        name="approved"
                                                        disabled
                                                        @checked($user->authorUser->approved)
                                                    />
                                                    Approved
                                                </label>
                                            </div>
                                            <div
                                                class="col-auto form-check form-check-flat form-check-primary"
                                            >
                                                <label
                                                    for="bio"
                                                    class="form-check-label"
                                                >
                                                    <input
                                                        form="edit-user"
                                                        type="checkbox"
                                                        id="bio"
                                                        class="form-check-input"
                                                        name="bio"
                                                        @checked($user->authorUser->bio)
                                                        disabled
                                                    />
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
                    <!-- Social media card -->
                    <div class="col-lg-5 grid-margin stretch-card d-none" id="social_media">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-subtitle">Social media Links</div>
                                @foreach($socialMedia as $media)
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i
                                                class="mdi mdi-{{$media['mediaName']}}"></i></span>
                                        <input
                                            type="url"
                                            class="form-control"
                                            placeholder="http://{{$media['mediaName']}}.com"
                                            form="edit-user"
                                            name="socialMedia[{{$media['id']}}]"
                                            value="{{
    ($id=array_search($media['id'], $user->socialMedia->pluck('id')->toArray()))!== false? $user->socialMedia[$id]->pivot->value: ''

}}"
                                            disabled
                                        />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Social media card end -->
                </div>
            </div>
        </div>
        <div
            class="d-sm-flex align-items-center justify-content-start border-top py-2"
        >
            <div class="btn-wrapper d-none" id="submit_pannel">
                <button
                    type="submit"
                    class="btn btn-primary me-2"
                    form="edit-user"
                >
                    Submit
                </button>
                <button class="btn btn-light" form="edit-user" type="cancel">
                    Cancel
                </button>
            </div>
        </div>
    </div>
@endsection

