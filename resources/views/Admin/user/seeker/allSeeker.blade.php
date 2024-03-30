@extends('Admin.layouts.master')
@section('Content')
<div class="content-wrapper">
    <div class="row py-3 justify-content-between align-items-center">
      <h2 class="fw-bold col-lg-auto">Job Seekers</h2>

      <div class="col-lg-auto">
        <!-- Search Bar start -->
        <div class="search-bar">
          <form action="">
            <div class="row g-1 justify-content-lg-end justify-content-start">
              <div class="col-6 col-lg-3 form-floating">
                <input type="text" class="form-control" id="title">
                <label for="title">Name</label>
              </div>
              <div class="col-6 col-lg-3 form-floating">
                <input type="text" class="form-control" id="title">
                <label for="title">Email</label>
              </div>
              <div class="col-4 col-lg-2 d-flex flex-column justify-content-center">
                <div class="row">
                  <label for="active" class="form-check-label">
                    <input type="checkbox" id="active" class="form-check-input" name="status" value="active">
                    Active
                  </label>
                </div>
                <div class="row">
                  <label for="blocked" class="form-check-label">
                    <input type="checkbox" id="blocked" class="form-check-input" name="status" value="blocked">
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
      <div class="">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Job Seekers Table</h4>
            <p class="card-description">List of all <code>Job seekers</code></p>
            <div class="table-responsive content">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Mobile No.</th>
                    <th>Position</th>
                    <th>Active</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <a href="user_info.html" class="link-primary text-decoration-none">Herman Beck</a>
                    </td>
                    <td class="py-1">
                      <a href="mailto:someone@example.com">someone@example.com</a>
                    </td>
                    <td>
                      <a href="tel:+4733378901">+47 333 78 901</a>
                    </td>
                    <td>Developer</td>
                    <td>❌</td>
                  </tr>
                  <tr>
                    <td>
                      <a href="user_info.html" class="link-primary text-decoration-none">Herman Beck</a>
                    </td>
                    <td class="py-1">
                      <a href="mailto:someone@example.com">someone@example.com</a>
                    </td>
                    <td>
                      <a href="tel:+4733378901">+47 333 78 901</a>
                    </td>
                    <td>Developer</td>
                    <td>✔️</td>
                  </tr>
                  <tr>
                    <td>
                      <a href="user_info.html" class="link-primary text-decoration-none">Herman Beck</a>
                    </td>
                    <td class="py-1">
                      <a href="mailto:someone@example.com">someone@example.com</a>
                    </td>
                    <td>
                      <a href="tel:+4733378901">+47 333 78 901</a>
                    </td>
                    <td>Developer</td>
                    <td>❌</td>
                  </tr>
                  <tr>
                    <td>
                      <a href="user_info.html" class="link-primary text-decoration-none">Herman Beck</a>
                    </td>
                    <td class="py-1">
                      <a href="mailto:someone@example.com">someone@example.com</a>
                    </td>
                    <td>
                      <a href="tel:+4733378901">+47 333 78 901</a>
                    </td>
                    <td>Developer</td>
                    <td>✔️</td>
                  </tr>
                  <tr>
                    <td>
                      <a href="user_info.html" class="link-primary text-decoration-none">Herman Beck</a>
                    </td>
                    <td class="py-1">
                      <a href="mailto:someone@example.com">someone@example.com</a>
                    </td>
                    <td>
                      <a href="tel:+4733378901">+47 333 78 901</a>
                    </td>
                    <td>Developer</td>
                    <td>✔️</td>
                  </tr>
                  <tr>
                    <td>
                      <a href="user_info.html" class="link-primary text-decoration-none">Herman Beck</a>
                    </td>
                    <td class="py-1">
                      <a href="mailto:someone@example.com">someone@example.com</a>
                    </td>
                    <td>
                      <a href="tel:+4733378901">+47 333 78 901</a>
                    </td>
                    <td>Developer</td>
                    <td>✔️</td>
                  </tr>
                  <tr>
                    <td>
                      <a href="user_info.html" class="link-primary text-decoration-none">Herman Beck</a>
                    </td>
                    <td class="py-1">
                      <a href="mailto:someone@example.com">someone@example.com</a>
                    </td>
                    <td>
                      <a href="tel:+4733378901">+47 333 78 901</a>
                    </td>
                    <td>Developer</td>
                    <td>✔️</td>
                  </tr>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection