@extends("Admin.layouts.master")
@section('Content')
<form method="POST" action="{{route('admin.authors.update', $author->userAuthor->slug)}}" id="edit-user" enctype="multipart/form-data">
@csrf
@method('put')
</form>
<div class="content-wrapper">
  <div
    class="d-sm-flex align-items-center justify-content-between border-bottom py-1"
  >
    <h2 class="fw-bold col-lg-auto">User Details</h2>
    <div class="btn-wrapper">

      
      <form action="{{route('admin.authors.destroy', $author->userAuthor->slug)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" cclass="btn btn-sm" style="color: #ed2708" onclick="alert('Are you sure you want to delete?')"
                     class="icon-trash"> Delete User
                    </button>
                </form>
      <a href="{{route('admin.authors.resetPassword',['slug'=>$author->userAuthor->slug])}}" class="btn btn-sm btn-primary text-white me-0"
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
                <div class="row border-bottom py-2 my-2">
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
                        src="{{ asset('admin/images/authors/'.$author->image)}}"
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
                        id="firstName"
                        value="{{$author->userAuthor->firstName}}"
                        form="edit-user"
                        disabled
                      />
                    </h3>
                    <h3>
                      <input
                        class="card-title card-title-dash fs-4 border-0 bg-transparent"
                        type="text"
                        name="secondName"
                        id="secondName"
                        value="{{ $author->userAuthor->secondName}}"
                        form="edit-user"
                        disabled
                      />
                    </h3>
                    <p class="card-subtitle card-subtitle-dash">
                      <?php
                      $createdAt=$author->created_at;
                        $period = $createdAt->diffForHumans();
                        echo "Joined " . $period;
                      ?>
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
                <div
                  class="row justify-content-between align-items-start"
                >
                  <div class="col-auto">
                    <p class="fw-bold lh-1">ARTICLES</p>
                    <p class="fw-light text-muted 1h1">{{$author->userAuthor->articleUser->count()}}</p>
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
                    <i class="mdi mdi-lead-pencil text-muted btn btn-sm fs-5" id="edit_user_button"></i>
                  </div>
                </div>
                <div class="row py-1">
                  <p class="card-text fw-bold lh-1">Description</p>
                  <p class="card-text lh-1">
                  <input
                    name="description"
                    id="description"
                    class="w-100 border-0 text-black bg-transparent"
                    form="edit-user"
                    value="{{$author->description}}"
                    disabled
                  >
                  </p>
                </div>
                <div class="row py-1">
                  <p class="card-text fw-bold lh-1">Position</p>
                  <p class="card-text lh-1"><input
                    name="position"
                    form="edit-user"
                    id="position"
                    class="w-100 border-0 text-black bg-transparent"
                    value="{{$author->userAuthor->position}}"
                    disabled
                  ></p>
                </div>
                <div class="row py-1">
                  <p class="card-text fw-bold lh-1">Email</p>
                  <p class="card-text lh-1"><input
                    name="email"
                    type="email"
                    id="email"
                    form="edit-user"
                    class="w-100 border-0 text-black bg-transparent"
                    value="{{$author->userAuthor->email}}"
                    disabled
                  ></p>
                </div>
                <div class="row border-bottom py-2">
                  <p class="card-text fw-bold lh-1">Phone</p>
                  <p class="card-text lh-1"><input
                    name="mobile"
                    id="mobile"
                    form="edit-user"
                    class="w-100 border-0 text-black bg-transparent"
                    value="{{$author->userAuthor->mobile}}"
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
                          id="active"
                          form="edit-user"
                          class="form-check-input"
                          name="active"
                          {{ $author->userAuthor->active == 1 ? 'checked' : '' }}
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
                          type="checkbox"
                          id="approved"
                          form="edit-user"
                          class="form-check-input"
                          name="approved"
                          {{ $author->approved == 1 ? 'checked' : '' }}
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
                          type="checkbox"
                          id="bio"
                          class="form-check-input"
                          name="bio"
                          form="edit-user"
                          {{ $author->bio == 1 ? 'checked' : '' }}
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
              <div class="input-group mb-3">
                <span class="input-group-text"
                  ><i class="mdi mdi-linkedin"></i
                ></span>

                <input
                  type="url"
                  class="form-control"
                  id="exampleInputUrl"
                  placeholder="http://LinkedIn.com"
                  form="edit-user"
                  name="linkedin"
                 
                  value=" @foreach($author->userAuthor->socialMedia as $socialMedia)
                  @if($socialMedia->id === 6){{$socialMedia->pivot->value}} @endif
                   @endforeach"
  
                  disabled
                />
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text"
                  ><i class="mdi mdi-twitter"></i
                ></span>
                <input
                  type="url"
                  class="form-control"
                  id="exampleInputUrl"
                  placeholder="http://Twitter.com"
                  form="edit-user"
                  name="twitter"
                  value=" @foreach($author->userAuthor->socialMedia as $socialMedia)
                  @if($socialMedia->id === 7){{$socialMedia->pivot->value}} @endif 
                  @endforeach"
                  disabled
                />
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text"
                  ><i class="mdi mdi-instagram"></i
                ></span>
                <input
                  type="url"
                  class="form-control"
                  id="exampleInputUrl"
                  placeholder="http://Instagram.com"
                  form="edit-user"
                  name="instagram"
                  value=" @foreach($author->userAuthor->socialMedia as $socialMedia)
                  @if($socialMedia->id === 8){{$socialMedia->pivot->value}} @endif 
                  @endforeach"
                  disabled
                />
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text"
                  ><i class="mdi mdi-facebook"></i
                ></span>
                <input
                  type="url"
                  class="form-control"
                  id="exampleInputUrl"
                  placeholder="http://Facebook.com"
                  form="edit-user"
                  name="facebook"
                  value=" @foreach($author->userAuthor->socialMedia as $socialMedia)
                  @if($socialMedia->id === 9){{$socialMedia->pivot->value}} @endif 
                  @endforeach"
                  disabled
                />
              </div>
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
      <button class="btn btn-light" form="edit-user">
        Cancel
      </button>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="{{asset('admin/js/edit_form.js')}}"></script>

@endsection