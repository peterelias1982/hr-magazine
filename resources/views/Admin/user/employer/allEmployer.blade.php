@extends('Admin.layouts.master')
@section('Content')
<div class="content-wrapper">
  <div class="row py-3 justify-content-between align-items-center">
    <h2 class="fw-bold col-lg-auto">Employers</h2>
    <div class="col-lg-auto">
      <!-- Search Bar start -->
      <div class="search-bar">
        <form action="{{URL::CURRENT()}}" method="GET">
          <div class="row g-1 justify-content-lg-end justify-content-start">
            <div class="col-4 col-lg-3 form-floating">
              <input type="text" class="form-control" id="name" name="name">
              <label for="name">Name</label>
            </div>
            <div class="col-4 col-lg-3 form-floating">
              <input type="email" class="form-control" id="email" name="email">
              <label for="email">Email</label>
            </div>
            <div class="col-4 col-lg-2 d-flex flex-column justify-content-center">
              <div class="row">
                <label for="active" class="form-check-label">
                  <input type="checkbox" id="active" class="form-check-input" value="active" name="active" >
                  Active
                </label>
              </div>
              <div class="row">
                <label for="blocked" class="form-check-label">
                  <input type="checkbox" id="blocked" class="form-check-input" value="blocked" name="blocked">
                  Blocked
                </label>
              </div>
            </div>
            <button class="col-auto btn border-0 btn-md" type="submit">
              <i class="icon-search fs-5"></i>
            </button>
          </div>
        </form>
      </div>
      <!-- Search Bar ends -->
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Employers Table</h4>
          <p class="card-description">List of all <code>Employers</code></p>
          <div class="table-responsive content">
            <table id="example" class="table table-striped" style="width: 100%">
              <thead>
                <tr>
                  <th>FirstName</th>
                  <th>Email</th>
                  <th>Mobile No.</th>
                  <th>Position</th>
                  <th>Active</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($employer as $employ)
                <tr>
                  <td>
                    <a href="{{route('admin.employers.show',[$employ->slug])}}" class="link-primary text-decoration-none">{{$employ->firstName}}</a>
                  </td>
                  <td>{{$employ->email}}</td>
                  <td>{{$employ->mobile}}</td>
                  <td>{{$employ->position}}</td>
                  <td>@if ($employ->active)
                    ✔️
                    @else
                    ❌
                  @endif
                </td>
                </tr>

                @endforeach



              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
