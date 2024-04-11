@extends('Admin.layouts.master')
@section('Content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-center align-items-center" id="padding_pic">
                <div class="col-lg-9">
                    <img src="{{asset('admin/images/hr-logo.svg')}}" alt="" class="img-fluid rounded opacity-25">
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card" id="tag">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tag Form</h4>
                        <p class="card-description">Add a new article tag</p>
                        <form class="forms-sample" id="tag-form" method="POST" action="{{ route('admin.tags.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="tag" class="col-sm-3 col-form-label">Tag</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tag" name="tagName"
                                           placeholder="Tag name">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-light">
                                Cancel
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
