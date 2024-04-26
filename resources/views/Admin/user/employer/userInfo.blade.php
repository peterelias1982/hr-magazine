@extends("Admin.layouts.master")
@section('Content')
<form action="{{route('admin.employers.update',[$employer->slug])}}" id="edit-user"  method="POST">
  @csrf
@method('patch')
</form>
<div class="content-wrapper">
  <div
    class="d-sm-flex align-items-center justify-content-between border-bottom py-1"
  >
    <h2 class="fw-bold col-lg-auto">User Details</h2>
    <div class="btn-wrapper">
     <form action="{{route('admin.employers.destroy',[$employer->slug])}}" method="POST" id="DeleteEmploy"
      >

        @csrf
        @method("delete")
      </form>
      <button type="submit" class="btn btn-sm" style="color: #ed2708" form="DeleteEmploy"
      onclick="alert('Are you sure you want to delete?')" ><i class="icon-trash"></i> Delete User</button>

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
                <div class="row border-bottom py-2 my-2">
                  <div class="col-4">
                    <div class="position-relative" id="change-pic">
                      <img
                        src="{{asset('assets/images/users/'. $employer->image)}}"
                        alt=""
                        id="user-pic"
                        class="card-img rounded-circle bg-light"
                      />
                    </div>
                  </div>
                  <div class="col-6 my-auto">
                    <h3>
                      {{$employer->firstName}} {{$employer->secondName}}
                    </h3>
                    <p class="card-subtitle card-subtitle-dash">
                      joined {{
                       $employer->created_at }} .
                    </p>
                      <div class="row justify-content-start g-2">
                          @foreach ($socialMedia as $socialMedia)
                              <a href="{{ $socialMedia->value }}" class="col-auto">
                                  <i class="mdi mdi-{{$socialMedia->mediaName}} text-dark"></i>
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
                  <p class="card-text fw-bold lh-1">Position</p>
                  <p class="card-text lh-1">{{$employer->position}}</p>
                </div>
                <div class="row py-1">
                  <p class="card-text fw-bold lh-1">Email</p>
                  <p class="card-text lh-1">{{$employer->email}}</p>
                </div>
                <div class="row border-bottom py-2">
                  <p class="card-text fw-bold lh-1">Phone</p>
                  <p class="card-text lh-1">{{$employer->mobile}}</p>
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
                          class="form-check-input"
                          name="active"
                          @checked($employer->active)
                          disabled
                          form="edit-user"
                        />
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
        <!-- Company card start -->
        <div class="col-lg-12 grid-margin stretch-card" id="companyCard">
          <div class="card card-rounded">
            <div class="card-body px-4">
              <div class="row py-2 my-2 align-items-center">
                <div class="col-4">
                  <div class="position-relative" id="change_company_pic">
                    <input
                        type="file"
                        name="logo"
                        id="company_pic_input"
                        form="edit-user"
                        class="opacity-0"
                        disabled
                      />
                  <img
                    src="{{asset('assets/images/employer/'.$employer->logo)}}"
                    alt=""
                    id="company_pic"
                    class="card-img rounded-circle bg-light"
                  />
                  <i
                        id="company_pic_change_icon"
                      ></i>
                      </div>
                </div>
                <div class="col-8">
                  <div
                    class="row flex-column justify-content-between"
                  >
                    <h3 class="card-title card-title-dash pb-2">
                      Company information
                    </h3>
                    <div class="row py-1">
                      <p class="card-text fw-bold lh-1">Name</p>
                      <p class="card-text lh-1">{{$employer->companyName}}</p>
                    </div>
                    <div class="row py-1">
                      <p class="card-text fw-bold lh-1">Address</p>
                      <p class="card-text lh-1">{{$employer->address}}</p>
                    </div>
                    <div class="row py-1">
                      <p class="card-text fw-bold lh-1">Phone</p>
                      <p class="card-text lh-1">{{$employer->phone}}</p>
                    </div>
                      <hr class=" w-75">
                      <div class="row">
                          <p class="card-text fw-bold lh-1">About Company</p>
                          <p class="card-text lh-1">{{$employer->about_company}}</p>
                      </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Company card end  -->
        <div class="col-lg-5 grid-margin stretch-card" id="padding_pic">
          <img
            src="{{asset('assets/images/employer/'.$employer->logo)}}"
            alt=""
            class="img-fluid rounded opacity-25"
          />
        </div>

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

