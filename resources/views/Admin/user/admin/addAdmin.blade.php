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
            <form action="{{route('admin.admins.store')}}" method="POST" class="forms-sample" id="admin-create">
              @csrf
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Email"
                /> @error('email')
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

            
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="card-subtitle">Additional information</div>
            <div class="form-group">
              <label for="name" class="form-label">First name </label>
              <input
                type="text"
                class="form-control"
                id="first-name"
                placeholder="First Name"
                form="admin-create"
                name="firstName"
              /> @error('firstName')
                                    <small><code>{{ $message }}</code></small>
                                    @enderror
            </div>
            <div class="form-group">
              <label for="name" class="form-label">Second name </label>
              <input
                type="text"
                class="form-control"
                id="second-name"
                placeholder="SecondName"
                form="admin-create"
                name="secondName"
              />@error('secondName')
                                    <small><code>{{ $message }}</code></small>
                                    @enderror
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
              />@error('mobile')
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
              >
                <option value="">-</option>
                <option value="admin">admin</option>
                <option value="super admin">super admin</option>
              </select>
              @error('position')
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
              >
                <option value="">-</option>
                @foreach ($Gender as $enumValue)
                <option value="{{ $enumValue->value }}" {{ old('gender') === $enumValue->value ? 'selected' : '' }}>
                    {{ $enumValue->value}} <!-- Capitalize the enum key -->
                </option>
            @endforeach
              </select>
              @error('gender')
                                    <small><code>{{ $message }}</code></small>
                                    @enderror
            </div>
            <button
              type="submit"
              class="btn btn-primary me-2"
              form="admin-create"
            >
              Submit
            </button>
            <button class="btn btn-light" form="admin-create"  href="{{route('admin.admins.index')}}">
              Cancel
            </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection