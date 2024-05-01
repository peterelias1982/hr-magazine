@extends("Admin.layouts.master")
@section('Content')
    <div class="content-wrapper">
        <form method="post" action="{{route('admin.authors.store')}}" class="forms-sample"
              id="authors-create" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Author</h4>
                            <div class="card-subtitle">Basic info</div>
                            <div class="form-group">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="fname" value="{{old('firstName')}}"
                                       placeholder="First Name" name="firstName">
                                @error('firstName')
                                <small><code>{{ $message }}</code></small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sname" class="form-label">Second Name</label>
                                <input type="text" class="form-control" id="sname" placeholder="Second Name"
                                       value="{{old('secondName')}}" name="secondName">
                                @error('secondName')
                                <small><code>{{ $message }}</code></small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control" id="mobile" placeholder="Mobile"
                                       value="{{old('mobile')}}" name="mobile">
                                @error('mobile')
                                <small><code>{{ $message }}</code></small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="">-</option>
                                    <option value="{{\App\Enums\Gender::Male->value}}">Male</option>
                                    <option value="{{\App\Enums\Gender::Female->value}}">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Position" class="form-label">Position</label>
                                <input type="text" class="form-control" id="Position" placeholder="Position"
                                       value="{{old('position')}}" name="position">
                                @error('position')
                                <small><code>{{ $message }}</code></small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file" class="form-label">Image</label>
                                <input type="file" class="form-control" id="File" value="{{old('image')}}" name="image">
                                @error('image')
                                <small><code>{{ $message }}</code></small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ShortDescription" class="form-label">Short Description</label>
                                <textarea type="text" id="ShortDescription" class="form-control" style="height: 3rem"
                                          placeholder="Short Description"
                                          name="shortDescription">{{old('shortDescription')}}</textarea>
                                @error('shortDescription')
                                <small><code>{{ $message }}</code></small>
                                @enderror
                            </div>
                            <div class="form-group d-flex">
                                <div class="col-6 form-check form-check-flat form-check-primary">
                                    <label for="active" class="form-check-label">
                                        <input type="checkbox" id="active" class="form-check-input" name="active">
                                        Active
                                        <i class="input-helper"></i></label>
                                </div>
                                <div class="col-6 form-check form-check-flat form-check-primary">
                                    <label for="bio" class="form-check-label">
                                        <input type="checkbox" id="bio" class="form-check-input" name="bio">
                                        Bio
                                        <i class="input-helper"></i></label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-subtitle">Social media Links</div>

                            @foreach($social as $media)
                                <div class="form-group">
                                    <label for="{{$media['mediaName']}}"
                                           class="form-label">{{ucfirst($media['mediaName'])}}</label>
                                    <input type="url" class="form-control" id="{{$media['mediaName']}}"
                                           placeholder="http://{{$media['mediaName']}}.com"
                                           form="authors-create" name="socialMedia[{{$media['id']}}]"
                                           value="{{old('socialMedia.' . $media['id'])}}">
                                    @error('socialMedia.' . $media['id'])
                                    <small><code>{{$media['mediaName']}}: {{ $message }}</code></small>
                                    @enderror
                                </div>
                            @endforeach


                            <button type="submit" class="btn btn-primary me-2" form="authors-create">
                                Submit
                            </button>
                            <button class="btn btn-light" form="authors-create" type="cancel">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
