@extends('Admin.layouts.master')
@section('Content')
<div class="content-wrapper">
  <div class="row py-3 justify-content-between align-items-center">
    <h2 class="fw-bold col-lg-auto">Tags</h2>
    <div class="col-lg-auto">
      <!-- Search Bar start -->
      <div class="search-bar">
        <form action="">
          <div class="row g-1 justify-content-lg-end justify-content-start">
            <div class="col-4 col-lg-5 form-floating">
              <input type="text" class="form-control" id="title">
              <label for="title">Tag</label>
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
          <h4 class="card-title">Tags Table</h4>
          <p class="card-description">List of all <code>Article tags</code></p>
          <div class="table-responsive content">
            <table class="table table-striped">
          <thead>
            <tr>
              <td class="fw-bold w-25" rowspan="100">Tags</td>
                <td>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>
                  <form  action="{{ route('tags.update', $tag->slug) }}" method="POST">
                      @csrf
                      @method('PUT')
                    <div class="position-relative input-parent d-inline-block" onclick="edit(this)">
                      <input type="text" class="custom-input d-inline-block" value="{{ $tag->tagName }}"  disabled="" />
                      <i class="mdi mdi-pencil position-absolute pen-icon btn p-3"></i>
                      <button type="submit" class="btn btn-primary btn-xs invisible">
                        Submit
                      </button>

                      <button type="cancel" class="btn btn-light btn-xs invisible">
                        Cancel
                      </button>
                    </div>
                  </form>
                </td>
                <td class="py-2">
                    <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-xs delete">Delete</button>
                    </form>
                </td>
                    </tr>
                @endforeach
                </tbody>

          </thead>
        </table>
      <div class="pagination"><button class="active">1</button><button>2</button></div></div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
