@extends('Admin.layouts.master')
@section('Content')
    <div class="content-wrapper">
        <div class="row py-3 justify-content-between align-items-center">
            <h2 class="fw-bold col-lg-auto">Articles</h2>
            <div class="col-lg-auto">
                <!-- Search Bar start -->
                <div class="search-bar">
                    <form action="" method="GET">
                        <div class="row g-1 justify-content-lg-end justify-content-start">
                            <div class="col-4 col-lg-2 form-floating">
                                <input type="text" class="form-control" id="title" name="title">
                                <label for="title">Title</label>
                            </div>
                            <div class="col-4 col-lg-2 form-floating">
                                <input type="text" class="form-control" id="tag" name="tagName">
                                <label for="tag">Tag</label>
                            </div>
                            <div class="col-4 col-lg-2 form-floating">
                                <input type="text" class="form-control" id="date" name="author">
                                <label for="date">Author</label>
                               
                            </div>
                            <div class="col-4 col-lg-2 form-floating">
                                <select class="form-control bg-white" name="categoryId">
                                    <option value="">_</option>
                                    @foreach ($articleCategories as $articleCategory)
                                        <option
                                            value="{{ $articleCategory->id}}" @selected(old('articleCategory_id') === $articleCategory->id)>{{$articleCategory->articleCategoryName }}</option>
                                    @endforeach
                                </select>
                                <label for="date">Select Category</label>
                            </div>
                            <div class="col-4 col-lg-2 d-flex flex-column justify-content-center">
                                <div class="row">
                                    <label for="approved" class="form-check-label">
                                        <input type="checkbox" id="approved" class="form-check-input" name="status"
                                               value="approved">
                                        Approved
                                    </label>
                                </div>
                                <div class="row">
                                    <label for="declined" class="form-check-label">
                                        <input type="checkbox" id="declined" class="form-check-input" name="status"
                                               value="declined">
                                        Declined
                                    </label>
                                </div>
                            </div>
                            <button class="col-auto btn border-0 btn-md" type="submit" href="#">
                                <i class="icon-search fs-5"></i>
                            </button>
                            @if (session('alert'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                  {{ session('alert') }}
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                              @endif
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
                        <h4 class="card-title">Articles Table</h4>
                        <p class="card-description">List of all <code><a href="{{ route('articles.index') }}"
                                                                         class="article-link">Articles</a></code></p>
                        <div class="table-responsive content">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th class="w-25">Tags</th>
                                    <th>Approved</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($articles as $article)
                                    <tr>
                                        <td>
                                            <a href="{{route('articles.show', $article->slug)}}"
                                               class="link-primary text-decoration-none">{{ $article->title }}</a>
                                        </td>
                                        <td>{{ $article->author?->userAuthor?->firstName . ' ' . $article->author?->userAuthor?->secondName?? '_'  }}</td>
                                        <td>{{ $article->articleCategory->articleCategoryName  }}</td>
                                        <td class="p-1">
                                            <div class="d-flex flex-wrap">
                                                @foreach($article->tags as $tag)
                                                    <span class="tag">{{$tag->tagName}}</span>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>{{$article->approved? '✔️':'❌'}}</td>
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
