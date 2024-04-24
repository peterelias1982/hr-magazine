@extends("Admin.layouts.master")
@section('Content')
<div class="content-wrapper">
  <div class="row py-3 justify-content-between align-items-center">
    <h2 class="fw-bold col-lg-auto">Authors</h2>
    <div class="col-lg-auto">
      <!-- Search Bar start -->
      <div class="search-bar">
        <form method="GET" action="{{route('admin.authors.search')}}">
          <div
            class="row g-1 justify-content-lg-end justify-content-start">
            <div class="col-6 col-lg-3 form-floating">
              <input type="text" class="form-control" id="title" name="name"/>
              <label for="title">Name</label>
            </div>
            <div class="col-6 col-lg-3 form-floating">
              <input type="text" class="form-control" id="title" name="email"/>
              <label for="title">Email</label>
            </div>
            <div class="col-4 col-lg-2 d-flex flex-column justify-content-center">
              <div class="row">
                <label for="active" class="form-check-label">
                  <input
                    type="checkbox"
                    id="active"
                    class="form-check-input"
                    name="status"
                    value="1"
                  />
                  Active
                </label>
              </div>
              <div class="row">
                <label for="blocked" class="form-check-label">
                  <input
                    type="checkbox"
                    id="blocked"
                    class="form-check-input"
                    name="status"
                    value="0"
                  />
                  Blocked
                </label>
              </div>
            </div>
            <button
              class="col-auto btn border-0 btn-md"
              type="submit"
            >
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
          <h4 class="card-title">Authors table</h4>
          <p class="card-description">List of all <code>Authors</code></p>
          <div class="table-responsive content">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Author</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile No.</th>
                  <th>Position</th>
                  <th>Active</th>
                  <th>Approved</th>
                  <th>Bio</th>
                </tr>
              </thead>
              <tbody>
               @foreach($authors as $author)
                <tr>
                  <td class="py-1">
                    <img
                      src="{{ asset('admin/images/authors/'.$author->image)}}"
                      alt="image"
                    />
                  </td>
                  <td>
                    <a
                      href="{{ route('admin.authors.show', ['slug' => $author->userAuthor->slug]) }}"
                      class="link-primary text-decoration-none"
                      >{{$author->userAuthor->firstName}} {{$author->userAuthor->secondName}}</a>
                  </td>
                  <td>{{$author->userAuthor->email}}</td>
                  <td>{{$author->userAuthor->mobile}}</td>
                  <td>{{$author->userAuthor->position}}</td>
                 
                  <td>@if($author->userAuthor->active == 0)❌ @else ✔️ @endif</td>
                  <td>@if($author->approved== 0) ❌ @else ✔️ @endif</td>
                  <td>@if($author->bio == 0) ❌ @else ✔️ @endif</td>
                  
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