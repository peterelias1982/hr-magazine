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
            <form action="{{ route('admins.store') }}" method="POST" class="forms-sample" id="admin-create">
              @csrf
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Email"
                />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="Password"
                />
              </div>
              <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="confirm-password"
                  name="password_confirmation"
                  placeholder="Password"
                />
              
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
                placeholder="Name"
                form="admin-create"
                name="firstName"
              />
            </div>
            <div class="form-group">
            <label for="name" class="form-label">Second Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              placeholder="Name"
              form="admin-create"
              name="secondName"
            />
          </div>
          <div class="form-group">
            <label for="position" class="form-label">Gender </label>
            <select
              class="form-control"
              form="admin-create"
              id="gender"
              name="gender"
            >

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
              />
            </div>
            <div class="form-group">
              <label for="position" class="form-label">Position </label>
              <select
                class="form-control"
                form="admin-create"
                id="position"
                name="position"
              >

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