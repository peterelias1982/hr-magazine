@extends('Admin.layouts.master')
@section('Content')
<div class="content-wrapper">
  <div class="row py-3 justify-content-between align-items-center">
    <!-- <h2 class="fw-bold col-lg-auto">Add Article</h2>-->
    <div class="col-lg-auto"></div>
  </div>
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Article Form</h4>
          <p class="card-description">
            Add a new Article to the Dashboard
          </p>
          <form action="{{route('articles.store')}}" method="POST" class="forms-sample" id="article-create" enctype="multipart/form-data">
            @csrf
            <!-- Group 1: Title, Image, and Content -->
            <div class="form-group-group">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title" value={{old('title')}}>
                @error('title')
                {{ $message }}
               @enderror
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="Image" accept="image/*">
                @error('image')
                {{ $message }}
            @enderror
              </div>
              <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" placeholder="Add Text Here --- " value={{old('content')}}></textarea>
                @error('content')
                 {{ $message }}
                 @enderror
              </div>
            </div>
            <!-- Group 2: Tags and Category -->
            <div class="form-group-group">
              <div class="form-group">
                <label>Tags</label>
                <!-- Placeholder for tags checkboxes -->
                <div class="tags-scrollable-container" id="tags-container">

                  @foreach ($articleTags as $articleTag)
                  <div class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag">
                    <input type="checkbox" name="tagName" value="{{ $articleTag->id }}" id="tag-{{ $articleTag->id }}" class="tag-checkbox">  #<label for="tag-{{ $articleTag->id }}" @checked(old('tagName'))>{{ $articleTag->tagName }}</label>  </div>
                    {{-- <input type="checkbox" name="tagName" id="tag-Alps" class="tag-checkbox"> #<label for="tag-Alps" @checked(old('tagName'))>{{ $tags->tagName }}</label></div> --}}
                   @endforeach
                   @error('tagName')
                   {{ $message }}
                  @enderror
                   {{-- <div class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Alps" class="tag-checkbox"> #<label for="tag-Alps">Alps</label></div> --}}
                   {{-- <div class="badge-warning p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Austria" class="tag-checkbox"> #<label for="tag-Austria">Austria</label></div>
                  <div class="badge-success p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-France" class="tag-checkbox"> #<label for="tag-France">France</label></div>
                  <div class="badge-warning p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Germany" class="tag-checkbox"> #<label for="tag-Germany">Germany</label></div>
                  <div class="badge-primary p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-London" class="tag-checkbox"> #<label for="tag-London">London</label></div>
                  <div class="badge-danger p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Paris" class="tag-checkbox"> #<label for="tag-Paris">Paris</label></div>
                  <div class="badge-warning p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Cairo" class="tag-checkbox"> #<label for="tag-Cairo">Cairo</label></div>
                  <div class="badge-info p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Animals" class="tag-checkbox"> #<label for="tag-Animals">Animals</label></div>
                  <div class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Buildings" class="tag-checkbox"> #<label for="tag-Buildings">Buildings</label></div>
                  <div class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Castle" class="tag-checkbox"> #<label for="tag-Castle">Castle</label></div>
                  <div class="badge-danger p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Clouds" class="tag-checkbox"> #<label for="tag-Clouds">Clouds</label></div>
                  <div class="badge-warning p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Park" class="tag-checkbox"> #<label for="tag-Park">Park</label></div>
                  <div class="badge-primary p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Mountains" class="tag-checkbox"> #<label for="tag-Mountains">Mountains</label></div>
                  <div class="badge-primary p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-People" class="tag-checkbox"> #<label for="tag-People">People</label></div>
                  <div class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Town" class="tag-checkbox"> #<label for="tag-Town">Town</label></div>
                  <div class="badge-success p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Trees" class="tag-checkbox"> #<label for="tag-Trees">Trees</label></div>
                  <div class="badge-info p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Water" class="tag-checkbox"> #<label for="tag-Water">Water</label></div>
                  <div class="badge-info p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Forest" class="tag-checkbox"> #<label for="tag-Forest">Forest</label></div>
                  <div class="badge-primary p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Woods" class="tag-checkbox"> #<label for="tag-Woods">Woods</label></div>
                  <div class="badge-primary p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Ocean" class="tag-checkbox"> #<label for="tag-Ocean">Ocean</label></div>
                  <div class="badge-warning p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Colors" class="tag-checkbox"> #<label for="tag-Colors">Colors</label></div>
                  <div class="badge-danger p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Hotels" class="tag-checkbox"> #<label for="tag-Hotels">Hotels</label></div>
                  <div class="badge-warning p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Butterflies" class="tag-checkbox"> #<label for="tag-Butterflies">Butterflies</label></div>
                  <div class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Circus" class="tag-checkbox"> #<label for="tag-Circus">Circus</label></div>
                  <div class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Cafes" class="tag-checkbox"> #<label for="tag-Cafes">Cafes</label></div>
                  <div class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Fog" class="tag-checkbox"> #<label for="tag-Fog">Fog</label></div>
                  <div class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag"><input type="checkbox" name="tags[]" id="tag-Flowers" class="tag-checkbox"> #<label for="tag-Flowers">Flowers</label></div> --}}
                </div>
                <!--End of tags-->
              </div>
              <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                  <!-- Category options -->
                  @foreach ($articleCategories as $articleCategory)
                  <option value="{{ $articleCategory->id}}"@selected(old('articleCategory_id') == $articleCategory->id)>{{$articleCategory->articleCategoryName }}</option>
                  @endforeach
                  @error('category_id')
                  {{ $message }}
                 @enderror
                  {{-- <option value="Technology">Technology</option>
                  <option value="Entertaiment">Entertaiment</option>
                  <option value="Economy">Economy</option> --}}
                </select>
              </div>
            </div>
            <!-- Group 3: Source Name and Link -->
            <div class="form-group-group">
              <div class="form-group">
                <label for="source-name">Source name</label>
                <input type="text" class="form-control" id="source-name" name="sourceName" placeholder="Source name">
                @error('sourceName')
                  {{ $message }}
                 @enderror
              </div>
              <div class="form-group">
                <label for="source-link">Source link</label>
                <input type="text" class="form-control" id="source-link" name="sourceLink" placeholder="Source link">
                @error('sourceLink')
                  {{ $message }}
                 @enderror
              </div>
            </div>
            <!-- Group 4: Author -->
            <div class="form-group-group">
              <div class="form-group">
                <label for="author">Author</label>
                <select class="form-control" id="author" name="author_id">
                  {{-- @if (Auth::check() && Auth::user()->hasRole('author')) {  <option value="{{ Auth::user()->id }}" selected>{{ Auth::user()->name }}</option> } @else
                  @foreach ($authors as $author)
                    <option value="{{ $author->id }}" @if (old('author_id') == $author->id || (isset($article) && $article->author->id == $author->id)) selected @endif>{{ $author->name }}</option>
                  @endforeach
                @endif
                @error('author_id')
                  {{ $message }}
                @enderror --}}
                  <!-- Example of authors -->
                  @foreach ($authors as $author ) 
                  <option value="{{$author->id}}" @selected(old('author_id') == $author->id)>{{$author->name}}
                  </option> 
                  @endforeach
                  {{-- <option value="{{ $author->id }}" 
                    @if (old('author_id') == $author->id || (isset($article) && $article->author->id == $author->id))
                        selected
                    @endif
                >
                {{ $author->name }}
              </option>
                    @endforeach --}}

                    {{-- @foreach ($authors as $author )
                    <option value="{{ $author->id }}"  @selected(old('author_id') == $author->id)>
                      @if ($author->user_id === $user->id){
                        {{ $author->name }}
                      }
                      @endif
                      @endforeach --}}


                   

                    @error('author_id')
                  {{ $message }}
                 @enderror
                  {{-- <option value="Author2">Author2</option>
                  <option value="Author1">Author3</option>
                  <option value="Author2">Author4</option>
                  <option value="Author1">Author5</option>
                  <option value="Author2">Author6</option>
                  <option value="Author1">Author7</option>
                  <option value="Author2">Author8</option> --}}
                  <!-- Add more authors as needed -->
                </select>
              </div>
            </div>
            <!-- Group 5: YouTube Link -->
            <div class="form-group-group">
              <div class="form-group">
                <label for="youTube-link">YouTube link</label>
                <input type="text" class="form-control" id="youTube-link" name="youtubeLink" placeholder="YouTube link">
                @error('youtubeLink')
                {{ $message }}
                 @enderror
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary me-2" form="article-create">
                Submit
              </button>
              <button class="btn btn-light" form="admin-create"  onclick="window.location.href='{{route('articles.index')}}'">
                Cancel
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection