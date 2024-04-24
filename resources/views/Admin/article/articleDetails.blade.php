@extends('Admin.layouts.master')
@section('Content')
    <form id="edit-article" action="{{route('admin.articles.update', $article->slug)}}" method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('put')
    </form>

    <div class="content-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between border-bottom py-1">
            <h2 class="fw-bold col-lg-auto">Article Details</h2>
            <div class="btn-wrapper">
                <form action="{{route('admin.articles.destroy', $article->slug)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm" style="color: #ed2708" onclick="alert('Are you sure you want to delete?')"><i
                            class="icon-trash"></i> Delete Article
                    </button>
                </form>
            </div>
        </div>
        <div class="pt-4">
            <div class="row">
                <div class="col-12 d-flex flex-column">
                    <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-6 position-relative" id="change-pic">
                                            <input type="file" name="image" id="article_pic_input"
                                                   form="edit-article" class="opacity-0 border-0" disabled=""
                                            >
                                            <img src="{{asset('assets/images/'.$article->image)}}" class="img-fluid"
                                                 id="article_pic">
                                            <i class="mdi mdi-link-variant-plus fs-4 position-absolute bottom-0 end-0 translate-middle btn btn-sm d-none bg-white rounded"
                                               id="article_change_icon"></i>
                                        </div>
                                        <div class="col-lg-8 d-flex flex-column justify-content-around">
                                            <div class="row pb-2 justify-content-between align-items-center">
                                                <h3 class="col-auto card-title card-title-dash">
                                                    Article information
                                                </h3>
                                                <div class="col-auto">
                                                    <i class="mdi mdi-lead-pencil text-muted btn btn-sm fs-5"
                                                       id="edit_user_button"></i>
                                                </div>
                                            </div>
                                            <div class="row py-1">
                                                <p class="card-text fw-bold lh-1">Title</p>
                                                <p class="card-text lh-1">
                                                    <input name="title" form="edit-article"
                                                           class="w-100 border-0 text-black" value="{{$article->title}}"
                                                           disabled="">
                                                    @error('title')
                                                    <small><code>{{ $message }}</code></small>
                                                    @enderror
                                                </p>
                                            </div>
                                            <div class="row py-1">
                                                <p class="card-text fw-bold lh-1">Content</p>
                                                <p class="card-text lh-1">
                        <textarea name="content" form="edit-article"
                                  class="form-control p-0 pe-5 border-0 bg-transparent" style="height: 15rem"
                                  disabled="">{{$article->content}}
                        </textarea>
                                                    @error('content')
                                                    <small><code>{{ $message }}</code></small>
                                                    @enderror
                                                </p>
                                            </div>
                                            <div class="row py-1">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div class="col-auto" id="author-section">
                                                        <p class="card-text fw-bold lh-1">Author</p>
                                                        <p class="card-text lh-1">
                                                            <select name="author_id" id="" form="edit-article"
                                                                    disabled=""
                                                                    class="form-control ps-0 bg-transparent text-black fs-xxs border-0"
                                                                    style="outline: none;">
                                                                @foreach($authors as $author)
                                                                    <option
                                                                        value="{{$author->id}}" @selected($article?->author_id == $author->id)>
                                                                        {{$author->userAuthor->firstName}} {{$author->userAuthor->secondName}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="col-4 col-lg-3 form-check form-check-flat form-check-primary">
                                                        <label for="approved" class="form-check-label">
                                                            <input type="checkbox" id="approved"
                                                                   class="form-check-input border-0" name="approved"
                                                                   form="edit-article"
                                                                   disabled @checked($article->approved)>
                                                            Approved
                                                            <i class="input-helper"></i></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row py-1">
                                                <div class="d-flex justify-content-between align-items-start">
                                                <div class="form-check">
                                                    <label for="" class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="featured" @checked($article->featured) form="edit-article">
                                                        Featured Article
                                                    </label>
                                                </div>
                                                <div class="form-check col-4 col-lg-3">
                                                    <label for="" class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="recommended" @checked($article->recommended) form="edit-article">
                                                        Recommended Article
                                                    </label>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border-top border-bottom py-3 justify-content-between">
                                        <div class="col-lg-auto" id="source-section">
                                            <div class="row">
                                                <div class="col-lg-auto">
                                                    <p class="card-text fw-bold lh-1">
                                                        Source Name<i class="mdi mdi-link-variant-minus"></i>
                                                    </p>
                                                    <p class="card-text lh-1">
                                                        <input name="articleable[source][name]"
                                                               class="w-100 border-0 text-black"
                                                               value="{{$article->sourceArticle?->sourceName}}"
                                                               form="edit-article" disabled="">
                                                        @error('articleable[source][name]')
                                                        <small><code>{{ $message }}</code></small>
                                                        @enderror
                                                    </p>
                                                </div>
                                                <div class="col-lg-auto">
                                                    <p class="card-text fw-bold lh-1">
                                                        Source Link
                                                        <i class="mdi mdi-link-variant-minus"></i>
                                                    </p>
                                                    <p class="card-text lh-1">
                                                        <input type="url" name="articleable[source][link]"
                                                               form="edit-article"
                                                               class="w-100 border-0 text-primary"
                                                               value="{{$article->sourceArticle?->sourceLink}}"
                                                               disabled="">
                                                        @error('articleable[sourec][link]')
                                                        <small><code>{{ $message }}</code></small>
                                                        @enderror
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-auto" id="youtube-section">
                                            <p class="card-text fw-bold lh-1">
                                                YouTube Link<i class="mdi mdi-youtube"></i>
                                            </p>
                                            <p class="card-text lh-1">
                                                <input type="url" name="articleable[youtubeLink]" form="edit-article"
                                                       class="w-100 border-0 text-primary"
                                                       value="{{$article->YoutubeLink?->youtubeLink}}" disabled="">
                                                       {{-- <input type="hidden" name="articleable[youtubeLink]" value="" id="youTubeLinkInput"/> --}}

                                                @error('articleable[youtubeLink]')
                                                <small><code>{{ $message }}</code></small>
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between align-items-start">
                                        <div class="form-group col-lg-8 border-end mt-1">
                                            <label>Tags</label>
                                            <!-- Placeholder for tags checkboxes -->
                                            <div class="tags-scrollable-container" id="tags-container">
                                                @foreach($articleTags as $tag)
                                                    <div
                                                        class="badge-danger p-2 me-2 my-1 badge fw-bold d-flex align-items-center justify-content-center tag d-none">
                                                        <input type="checkbox" name="tags_id[]" id="{{$tag->tagName}}"
                                                               value="{{$tag->id}}"
                                                               @checked(in_array($tag->id, $article->tags->pluck('id')->toArray()))
                                                               class="tag-checkbox border-0" disabled=""
                                                               form="edit-article"> #<label
                                                            for="{{$tag->tagName}}">{{$tag->tagName}}</label></div>
                                                @endforeach
                                            </div>
                                            <!--End of tags-->
                                        </div>
                                        <div class="form-group col-lg-4">

                                            <p class="card-text lh-1 mt-2">Category <i
                                                    class="mdi mdi-bookmark-box-multiple-outline"></i></p>
                                            <p class="card-text lh-1">
                                                <select id="category" name="category_id" form="edit-article"
                                                        class="form-control bg-transparent text-black fs-xxs border-0"
                                                        style="outline: none;" disabled="">
                                                    <!-- Category options -->
                                                    @foreach ($articleCategories as $articleCategory)
                                                        <option
                                                            value="{{ $articleCategory->id}}"
                                                            @selected($article->category_id == $articleCategory->id)
                                                        >{{$articleCategory->articleCategoryName }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <small><code>{{ $message }}</code></small>
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-sm-flex align-items-center justify-content-start border-top py-2">
            <div class="btn-wrapper d-none" id="submit_pannel">
                <button type="submit" class="btn btn-primary me-2" form="edit-article">
                    Submit
                </button>
                <button class="btn btn-light" form="edit-article">
                    Cancel
                </button>
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
