@extends('Admin.layouts.master')
@section('Content')
    <div class="content-wrapper">
        <div class="row py-3 justify-content-between align-items-center">
            <h2 class="fw-bold col-lg-auto">Articles</h2>
            <div class="col-lg-auto">
                <!-- Search Bar start -->
                <div class="search-bar">
                    <form action="{{route('articles.store')}}" method="GET">
                        <div class="row g-1 justify-content-lg-end justify-content-start">
                            <div class="col-4 col-lg-2 form-floating">
                                <input type="text" class="form-control" id="title">
                                <label for="title">Title</label>
                            </div>
                            <div class="col-4 col-lg-2 form-floating">
                                <input type="text" class="form-control" id="tag">
                                <label for="tag">Tag</label>
                            </div>
                            <div class="col-4 col-lg-2 form-floating">
                                <input type="text" class="form-control" id="date">
                                <label for="date">Author</label>
                            </div>
                            <div class="col-4 col-lg-2 form-floating">
                                <select class="form-control bg-white">
                                    <option value="">_</option>
                                    @foreach ($articleCategories as $articleCategory)
                                        <option
                                                value="{{ $articleCategory->id}}"@selected(old('articleCategory_id') === $articleCategory->id)>{{$articleCategory->articleCategoryName }}</option>
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
                            <button class="col-auto btn border-0 btn-md" type="submit" href="articles/{articles->slug}">
                                <i class="icon-search fs-5"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Search Bar ends -->
            </div>
<<<<<<< HEAD
            <div class="col-4 col-lg-2 form-floating">
              <input type="text" class="form-control" id="tag">
              <label for="tag">Tag</label>
            </div>
            <div class="col-4 col-lg-2 form-floating">
              <input type="text" class="form-control" id="date">
              <label for="date">Author</label>
            </div>
            <div class="col-4 col-lg-2 form-floating">
              <select class="form-control bg-white">
                
                @foreach ($articleCategories as $articleCategory)
                
                <option value="{{ $articleCategory->id}}"@selected(old('articleCategory_id') == $articleCategory->id)>{{$articleCategory->articleCategoryName }}</option>
                
                {{-- <option>categroy #1</option>
                <option>categroy #2</option>
                <option>categroy #3</option>
                <option>categroy #4</option> --}}
                @endforeach
              </select>
              <label for="date">Select Category</label>
            </div>
            <div class="col-4 col-lg-2 d-flex flex-column justify-content-center">
              <div class="row">
                <label for="approved" class="form-check-label">
                  <input type="checkbox" id="approved" class="form-check-input" name="status" value="approved">
                  Approved
                </label>
              </div>
              <div class="row">
                <label for="declined" class="form-check-label">
                  <input type="checkbox" id="declined" class="form-check-input" name="status" value="declined">
                  Declined
                </label>
              </div>
            </div>
            <button class="col-auto btn border-0 btn-md" type="submit" href="{{ route('articles.show' , $articles->slug) }}" >
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
          <h4 class="card-title">Articles Table</h4>
          <p class="card-description">List of all <code>Articles</code></p>
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
                    <a href="{{ route('articles.show' , $article->slug) }}" class="link-primary text-decoration-none">{{ $article->title }}</a>
                  </td>
                  {{-- <td>{{ $article->auther->name }}</td> --}}
                  {{-- <td>{{ User::find($article->authors_id)->name }}</td> --}}
                  {{-- <td>{{ $article->articleCategory->articleCategoryName }}</td> --}}
                  <td class="p-1">
                    <div class="d-flex flex-wrap">
                      <span class="badge-warning p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span><span class="badge-info p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span><span class="badge-info p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span>
                      <span class="badge-info p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span>
                      <span class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span>
                    </div>
                  </td>
                  <td>✔️</td>
                </tr>
                @endforeach
                {{-- <tr>
                  <td>
                    <a href="article_details.html" class="link-primary text-decoration-none">title 1</a>
                  </td>
                  <td>Author 2</td>
                  <td>category 2</td>
                  <td class="p-1">
                    <div class="d-flex flex-wrap">
                      <span class="badge-primary p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span><span class="badge-warning p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span><span class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span>
                      <span class="badge-warning p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span>
                      <span class="badge-info p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span>
                    </div>
                  </td>
                  <td>✔️</td>
                </tr>
                <tr>
                  <td>
                    <a href="article_details.html" class="link-primary text-decoration-none">title 1</a>
                  </td>
                  <td>Author 3</td>
                  <td>category 3</td>
                  <td class="p-1">
                    <div class="d-flex flex-wrap">
                      <span class="badge-info p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span><span class="badge-danger p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span><span class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span>
                    </div>
                  </td>
                  <td>✔️</td>
                </tr>
                <tr>
                  <td>
                    <a href="article_details.html" class="link-primary text-decoration-none">title 1</a>
                  </td>
                  <td>Author 4</td>
                  <td>category 4</td>
                  <td class="p-1">
                    <div class="d-flex flex-wrap">
                      <span class="badge-danger p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span><span class="badge-success p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span><span class="badge-success p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span>
                      <span class="badge-warning p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span>
                      <span class="badge-warning p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span>
                      <span class="badge-info p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span>
                    </div>
                  </td>
                  <td>✔️</td>
                </tr>
                <tr>
                  <td>
                    <a href="article_details.html" class="link-primary text-decoration-none">title 1</a>
                  </td>
                  <td>Author 5</td>
                  <td>category 5</td>
                  <td class="p-1">
                    <div class="d-flex flex-wrap">
                      <span class="badge-warning p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span>
                    </div>
                  </td>
                  <td>✔️</td>
                </tr>
                <tr>
                  <td>
                    <a href="article_details.html" class="link-primary text-decoration-none">title 1</a>
                  </td>
                  <td>Author 6</td>
                  <td>category 6</td>
                  <td class="p-1">
                    <div class="d-flex flex-wrap">
                      <span class="badge-info p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span><span class="badge-warning p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span><span class="badge-warning p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span>
                      <span class="badge-danger p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span>
                    </div>
                  </td>
                  <td>✔️</td>
                </tr>
                <tr>
                  <td>
                    <a href="article_details.html" class="link-primary text-decoration-none">title 1</a>
                  </td>
                  <td>Author 7</td>
                  <td>category 7</td>
                  <td class="p-1">
                    <div class="d-flex flex-wrap">
                      <span class="badge-primary p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span><span class="badge-danger p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span>
                      <span class="badge-dark p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center">#tag1</span>
                    </div>
                  </td>
                  <td>✔️</td>
                </tr> --}}
              </tbody>
            </table>
=======
>>>>>>> 2bd46d93841b4194a90c382953ae5bd36ed6932d
        </div>
        <div class="row">
            <div class="">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Articles Table</h4>
                        <p class="card-description">List of all <code>Articles</code></p>
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
                                        <td>{{ $article->author?->userAuthor?->name?? '_'  }}</td>
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
@endsection
