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

                                @if(session('success'))
                                    <h2>{{session('success')}}</h2>
                                @endif
                                @foreach($categories as $category)
                                    <tr>
                                        <td class="py-2">
                                            <div>
                                                <form id="editForm_{{$category->id}}"
                                                      action="{{ route('jobCategory.update', $category->slug) }}" method="POST" >
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="position-relative input-parent d-inline-block" onclick="edit(this)">
                                                        <input name="category" type="text" class="custom-input d-inline-block"
                                                               value="{{ $category->category }}"
                                                               form="editForm_{{$category->id}}" />
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
                                        <td>
                                            <form action="{{ route('jobCategory.destroy', $category->slug)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs delete">Delete</button>
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
