@extends("Admin.layouts.master")
@section('Content')
<div class="content-wrapper">
            <div class="row">
              <div class="col-12 col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Author</h4>
                    <div class="card-subtitle">Basic info</div>

                    <form class="forms-sample" id="authors-create">
                      <div class="form-group">
                        <label for="exampleInputUsername1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Name" name="name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputMobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile" name="mobile">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPosition" class="form-label">Position</label>
                        <input type="text" class="form-control" id="exampleInputPosition" placeholder="Position" name="position">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile" class="form-label">Image</label>
                        <input type="file" class="form-control" id="exampleInputFile" name="image">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputShortDescription" class="form-label">Short Description</label>
                        <textarea type="text" id="exampleInputShortDescription" class="form-control" style="height: 3rem" placeholder="Short Description" name="shortDescription"></textarea>
                      </div>
                      <div class="form-group d-flex">
                        <div class="col-6 form-check form-check-flat form-check-primary">
                          <label for="exampleInputActive" class="form-check-label">
                            <input type="checkbox" id="exampleInputActive" class="form-check-input" name="active">
                            Active
                          <i class="input-helper"></i></label>
                        </div>
                        <div class="col-6 form-check form-check-flat form-check-primary">
                          <label for="exampleInputActive" class="form-check-label">
                            <input type="checkbox" id="exampleInputActive" class="form-check-input" name="bio">
                            Bio
                          <i class="input-helper"></i></label>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="card-subtitle">Social media Links</div>
                    <div class="form-group">
                      <label for="exampleInputUrl" class="form-label">LinkedIn
                      </label>
                      <input type="url" class="form-control" id="exampleInputUrl" placeholder="http://LinkedIn.com" form="authors-create" name="linkedin">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUrl" class="form-label">Twitter
                      </label>
                      <input type="url" class="form-control" id="exampleInputUrl" placeholder="http://Twitter.com" form="authors-create">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUrl" class="form-label">Instagram
                      </label>
                      <input type="url" class="form-control" id="exampleInputUrl" placeholder="http://Instagram.com" form="authors-create">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUrl" class="form-label">Facebook
                      </label>
                      <input type="url" class="form-control" id="exampleInputUrl" placeholder="http://Facebook.com" form="authors-create">
                    </div>
                    <button type="submit" class="btn btn-primary me-2" form="authors-create">
                      Submit
                    </button>
                    <button class="btn btn-light" form="authors-create">
                      Cancel
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection