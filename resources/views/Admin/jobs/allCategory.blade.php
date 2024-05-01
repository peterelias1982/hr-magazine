@extends('Admin.layouts.master')
@section('Content')
    <div class="content-wrapper">
        <div class="row py-3 justify-content-between align-items-center">
            <h2 class="fw-bold col-lg-auto">Categories</h2>
            <div class="col-lg-auto">
                <!-- Search Bar start -->
                <div class="search-bar">
                    <form action="{{URL::CURRENT()}}" method="GET">
                        <div class="row g-1 justify-content-lg-end justify-content-start">
                            <div class="col-4 col-md-5 col-lg-6 col form-floating">
                                <input type="text" class="form-control" id="title" name="catergory">
                                <label for="title">Category</label>
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
                        <h4 class="card-title">Categories Table</h4>
                        <p class="card-description">
                            List of all <code>Job categories</code>
                        </p>
                        <div class="table-responsive content">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            <form id="JobCategory{{$category->id}}"
                                                  action="{{route('admin.jobCategories.update',[$category->slug])}}"
                                                  method="POST">
                                                @csrf
                                                @method("PUT")
                                                <div class="position-relative input-parent d-inline-block"
                                                     onclick="edit(this)">
                                                    <input type="text" class="custom-input d-inline-block"
                                                           value="{{$category->category}}" disabled=""
                                                           name="category">
                                                    <i class="mdi mdi-pencil position-absolute pen-icon btn end-50"></i>
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
                                            <form action="{{route('admin.jobCategories.destroy',[$category->slug])}}"
                                                  method="POST">
                                                @csrf
                                                @method("delete")
                                                <button type="submit" class="btn btn-danger btn-xs delete"
                                                        onclick="alert('Are you sure you want to delete?')">
                                                    Delete
                                                </button>
                                            </form>
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
