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
                        <form action="{{route('articles.store')}}" method="POST" class="forms-sample"
                              id="article-create" enctype="multipart/form-data">
                            @csrf
                            <!-- Group 1: Title, Image, and Content -->
                            <div class="form-group-group">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                           value={{old('title')}}>
                                    @error('title')
                                    <small><code>{{ $message }}</code></small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Image"
                                           accept="image/*">
                                    @error('image')
                                    <small><code>{{ $message }}</code></small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" id="content" name="content" style="height: 10rem"
                                              placeholder="Add Text Here --- ">{{old('content')}}</textarea>
                                    @error('content')
                                    <small><code>{{ $message }}</code></small>
                                    @enderror
                                </div>
                            </div>
                            <!-- Group 2: Tags and Category -->
                            <div class="form-group-group">
                                <div class="form-group">
                                    <label>Tags</label>
                                    <div class="tags-scrollable-container" id="tags-container">

                                        @foreach ($$articleTags as $articleTag)
                                            <div
                                                class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag">
                                                <input type="checkbox" name="tags_id[]" value="{{ $articleTag->id }}"
                                                       id="tag-{{ $articleTag->id }}" class="tag-checkbox"> #<label
                                                    for="tag-{{ $articleTag->id }}" >{{ $articleTag->tagName }}</label>
                                            </div>
                                        @endforeach

                                    </div>
                                    <!--End of tags-->
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category" name="category_id">
                                        <option value="">_</option>
                                        <!-- Category options -->
                                        @foreach ($articleCategories as $articleCategory)
                                            <option
                                                value="{{ $articleCategory->id}}"
                                                @selected(old('category_id') == $articleCategory->id)
                                            >{{$articleCategory->articleCategoryName }}</option>
                                        @endforeach
                                        @error('category_id')
                                        <small><code>{{ $message }}</code></small>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                            <!-- Group 3: Source Name and Link -->
                            <div class="form-group-group" id="source-section">
                                <div class="form-group">
                                    <label for="source-name">Source name</label>
                                    <input type="text" class="form-control" id="source-name"
                                           name="articleable[source][name]"
                                           placeholder="Source name"
                                           value="{{old('articleable.source.name')}}"
                                    >
                                    @error('articleable[source][name]')
                                    <small><code>{{ $message }}</code></small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="source-link">Source link</label>
                                    <input type="text" class="form-control" id="source-link"
                                           name="articleable[source][link]"
                                           value="{{old('articleable.source.link')}}"
                                           placeholder="Source link">
                                    @error('articleable[source][link]')
                                    <small><code>{{ $message }}</code></small>
                                    @enderror
                                </div>
                            </div>
                            <!-- Group 4: Author -->
                            <div class="form-group-group" id="author-section">
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <select class="form-control" id="author" name="author_id">
                                        <!-- Example of authors -->
                                        <option value="">_</option>
                                        @foreach ($authors as $author )
                                            <option
                                                value="{{$author->id}}" @selected($author->id == old('author_id'))>{{$author->userAuthor->name}}
                                            </option>
                                        @endforeach
                                        @error('author_id')
                                        <small><code><small><code>{{ $message }}</code></small></code></small>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                            <!-- Group 5: YouTube Link -->
                            <div class="form-group-group" id="youtube-section">
                                <div class="form-group">
                                    <label for="youTube-link">YouTube link</label>
                                    <input type="text" class="form-control" id="youTube-link"
                                           name="articleable[youtubeLink]"
                                           placeholder="YouTube link" value="{{old('articleable.youtubeLink')}}">
                                    @error('articleable[youtubeLink]')
                                    <small><code>{{ $message }}</code></small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary me-2" form="article-create">
                                    Submit
                                </button>
                                <button class="btn btn-light" form="admin-create"
                                        onclick="window.location.href='{{route('articles.index')}}'">
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
@section('js')
    <script>
        const categories = {!! $articleCategories !!};
    </script>
    <script src="{{asset('admin/js/articleCategories.js')}}">
    </script>
@endsection
