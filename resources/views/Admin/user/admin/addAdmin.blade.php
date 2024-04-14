@extends("Admin.layouts.master")
@section('Content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-12 col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add Admin form</h4>
            <p class="card-description">
              Add a new admin user to the dashboard
            </p>
            <form action="{{ route('admin.admins.store') }}" method="POST" class="forms-sample" id="admin-create">
              @csrf
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Email"
                  value={{old('email')}}
                >
                @error('email')
                <small><code>{{ $message }}</code></small>
                @enderror
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="Password"
                  value={{old('password')}}
                  >
                  @error('password')
                  <small><code>{{ $message }}</code></small>
                  @enderror
              </div>
              <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="confirm-password"
                  name="password_confirmation"
                  placeholder="Password"
                  value={{old('password_confirmation')}}
                  >
                  @error('password_confirmation')
                  <small><code>{{ $message }}</code></small>
                  @enderror

              </div>

            </form>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="card-subtitle">Additional information</div>
            <div class="form-group">
              <label for="name" class="form-label">First Name </label>
              <input
                type="text"
                class="form-control"
                id="name"
                placeholder="First Name"
                form="admin-create"
                name="firstName"
                value={{old('firstName')}}
                >
                @error('firstName')
                <small><code>{{ $message }}</code></small>
                @enderror
            </div>
            <div class="form-group">
            <label for="name" class="form-label">Second Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              placeholder="Second Name"
              form="admin-create"
              name="secondName"
              value={{old('secondName')}}
              >
              @error('secondName')
              <small><code>{{ $message }}</code></small>
              @enderror
          </div>
          <div class="form-group">
            <label for="gender" class="form-label">Gender </label>
            <select
              class="form-control"
              form="admin-create"
              id="gender"
              name="gender"
              value={{old('gender')}}
              >
              @error('gender')
              <small><code>{{ $message }}</code></small>
              @enderror
              <option value="male">Male</option>
              <option value="female">Female</option>

            </select>
          </div>
            <div class="form-group">
              <label for="mobile" class="form-label">Mobile </label>
              <input
                type="text"
                class="form-control"
                id="mobile"
                name="mobile"
                placeholder="Mobile No."
                form="admin-create"
                value={{old('mobile')}}
                >
                @error('mobile')
                <small><code>{{ $message }}</code></small>
                @enderror
            </div>
            <div class="form-group">
              <label for="position" class="form-label">Position </label>
              <select
                class="form-control"
                form="admin-create"
                id="position"
                name="position"
                value={{old('position')}}
                >
               
                @error('position')
                <small><code>{{ $message }}</code></small>
                @enderror
                <option value="user">User</option>
                <option value="admin">admin</option>
                <option value="superAdmin">super admin</option> 
              </select> 
             
            </div>
            <button
              type="submit"
              class="btn btn-primary me-2"
              form="admin-create"
            >
              Submit
            </button>
            <button class="btn btn-light" form="admin-create">
              Cancel
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
