@extends('Admin.layouts.master')
@section('Content')
<div class="content-wrapper">
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
                <tr>
                  <td class="py-2">
                    <div>
                      <form action="">
                        <div class="position-relative input-parent d-inline-block" onclick="edit(this)">
                          <input type="text" class="custom-input d-inline-block" value="Category 1" disabled="">
                          <i class="mdi mdi-pencil position-absolute pen-icon btn p-3"></i>
                          <button type="submit" class="btn btn-primary btn-xs invisible">
                            Submit
                          </button>
                          <button type="cancel" class="btn btn-light btn-xs invisible">
                            Cancel
                          </button>
                        </div>
                      </form>
                    </div>
                  </td>
                  <td class="py-2">
                    <form action="">
                      <button type="button" class="btn btn-danger btn-xs delete">
                        Delete
                      </button>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td class="py-2">
                    <div>
                      <form action="">
                        <div class="position-relative input-parent d-inline-block" onclick="edit(this)">
                          <input type="text" class="custom-input d-inline-block" value="Category 1" disabled="">
                          <i class="mdi mdi-pencil position-absolute pen-icon btn p-3"></i>
                          <button type="submit" class="btn btn-primary btn-xs invisible">
                            Submit
                          </button>
                          <button type="cancel" class="btn btn-light btn-xs invisible">
                            Cancel
                          </button>
                        </div>
                      </form>
                    </div>
                  </td>
                  <td class="py-2">
                    <form action="">
                      <button type="button" class="btn btn-danger btn-xs delete">
                        Delete
                      </button>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td class="py-2">
                    <div>
                      <form action="">
                        <div class="position-relative input-parent d-inline-block" onclick="edit(this)">
                          <input type="text" class="custom-input d-inline-block" value="Category 1" disabled="">
                          <i class="mdi mdi-pencil position-absolute pen-icon btn p-3"></i>
                          <button type="submit" class="btn btn-primary btn-xs invisible">
                            Submit
                          </button>
                          <button type="cancel" class="btn btn-light btn-xs invisible">
                            Cancel
                          </button>
                        </div>
                      </form>
                    </div>
                  </td>
                  <td class="py-2">
                    <form action="">
                      <button type="button" class="btn btn-danger btn-xs delete">
                        Delete
                      </button>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td class="py-2">
                    <div>
                      <form action="">
                        <div class="position-relative input-parent d-inline-block" onclick="edit(this)">
                          <input type="text" class="custom-input d-inline-block" value="Category 1" disabled="">
                          <i class="mdi mdi-pencil position-absolute pen-icon btn p-3"></i>
                          <button type="submit" class="btn btn-primary btn-xs invisible">
                            Submit
                          </button>
                          <button type="cancel" class="btn btn-light btn-xs invisible">
                            Cancel
                          </button>
                        </div>
                      </form>
                    </div>
                  </td>
                  <td class="py-2">
                    <form action="">
                      <button type="button" class="btn btn-danger btn-xs delete">
                        Delete
                      </button>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td class="py-2">
                    <div>
                      <form action="">
                        <div class="position-relative input-parent d-inline-block" onclick="edit(this)">
                          <input type="text" class="custom-input d-inline-block" value="Category 1" disabled="">
                          <i class="mdi mdi-pencil position-absolute pen-icon btn p-3"></i>
                          <button type="submit" class="btn btn-primary btn-xs invisible">
                            Submit
                          </button>
                          <button type="cancel" class="btn btn-light btn-xs invisible">
                            Cancel
                          </button>
                        </div>
                      </form>
                    </div>
                  </td>
                  <td class="py-2">
                    <form action="">
                      <button type="button" class="btn btn-danger btn-xs delete">
                        Delete
                      </button>
                    </form>
                  </td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection