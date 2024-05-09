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
        <!-- Profile Users Start  -->
        <div class="row d-flex justify-content-center">
            <div class="col-xl-12 col-md-12 col-sm-12 bg-dark rounded-0 h-25">
                <h1 class="text-white py-5 fw-bold text-center">Users Profile</h1>
            </div>
        </div>
        <div class="row overflow-auto" style="max-height: 200vh">
            @include('publicPages.includes.userOffcanvas')
            <div class="col-xl-8 col-md-12 col-sm-12">
                <div class="card-block justify-content-center">
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <div class="row">
                            <div class="col-xl-9 col-md-9 col-sm-9">
                                <h3 class="px-3 pt-3 pb-2 fw-bold">First Name</h3>
                                <h6 class="px-3 pb-2 text-muted">@isset($user)
                                        {{$user->firstName}}
                                    @endisset</h6>
                            </div>
                            <div class="col-xl-3 col-md-3 col-sm-3">
                                @auth
                                    @can('isOwner', ['userId' => $user?->userId])
                                        <button
                                            class="bg-light border-0 text-danger fw-semibold fs-2 me-5 my-3 float-end"
                                            onclick="redirectToEdit('@isset($user) {{ route('profile.edit', $user->slug) }} @endisset')">
                                            Edit
                                        </button>
                                        <script>
                                            function redirectToEdit(url) {
                                                window.location.href = url; // Redirect to the edit page
                                            }
                                        </script>
                                    @endcan
                                @endauth
                            </div>
                        </div>
                    </div>
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Second Name</h3>
                        <h6 class="px-3 pb-2 text-muted">{{$user->secondName}}</h6>
                    </div>
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Email</h3>
                        <h6 class="px-3 pb-2 text-muted">
                            {{$user->email}}
                        </h6>
                    </div>
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Phone Number</h3>
                        <h6 class="px-3 pb-2 text-muted">{{$user->mobile}}</h6>
                    </div>
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Gender</h3>
                        <h6 class="px-3 pb-2 text-muted">{{$user->gender}}</h6>
                    </div>
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Position</h3>
                        <h6 class="px-3 pb-2 text-muted">{{$user->position}}</h6>
                    </div>
                    <div class="block border border-dark border rounded-4 mt-4 mx-4">
                        <h3 class="px-3 pt-3 pb-2 fw-bold">Linkedin</h3>
                        <div class="mb-3">
                            <a
                                class="px-3 pb-4 text-muted"
                                href=" {{$media?->value}}"
                            >
                                {{$media?->value}}
                            </a>
                        </div>
                    </div>
                    @auth
                        @can('isOwner', ['userId' => $user?->userId])
                            <div class="col-12 mt-5">
                                <h2 class="text-primary fw-bold ms-4 fs-3">You can upload Resume</h2>
                                <h6 class="ms-4 text-muted">Please include an resume</h6>
                                <form action="{{route('profile.upload')}}" method="post" enctype="multipart/form-data"
                                      class="d-flex align-items-center">
                                    @csrf
                                    <label
                                        class="btn btn-outline-dark fw-bold ms-3 px-3 py-3 fs-4 rounded-4"
                                    >
                                        <input type="file" name="cv" class="d-none" placeholder=""/>
                                        Upload Resume
                                    </label>
                                    <button type="submit" class="btn  mx-4 p-2  fs-3 fw-bold text-primary">
                                        Submit
                                    </button>
                                </form>

                            </div>
                        @endcan
                    @endauth
                    @if($user->cv ?? false)
                        <div>
                            <h2 class="text-primary fw-bold mt-5 ms-4">Resume</h2>
                            <h6 class="ms-4 text-muted">Your uploaded C.V</h6>
                            <a href="{{route('profile.download',[$user->cv])}}">
                                <button
                                    type="button"
                                    class="btn btn-outline-dark fw-bold ms-3 px-3 py-3 fs-4 rounded-4"
                                >
                                    Download Resume
                                </button>
                            </a>
                        </div>
                    @endif

                    @auth
                        @can('isOwner', ['userId' => $user?->userId])
                            <div class="btn-wrapper my-5">
                                <form action="@isset($user) {{route('profile.destroy', $user->slug)}} @endisset"
                                      method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn  mx-4 p-2  fs-3 fw-bold text-primary"
                                            onclick="alert('Are you sure you want to delete account?')"><i
                                            class="icon-trash"></i>
                                        ⚠️Delete Account
                                    </button>
                                </form>
                            </div>
                        @endcan
                    @endauth
                </div>
            </div>
        </div>
        <!-- Profile Users End  -->
    </div>
@endsection
