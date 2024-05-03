@extends('publicPages.layouts.main')

@section('publicPagesContent')
<!-- start of content -->
<div class="bg-light py-5 mb-5">
    <div class="container-fluid">
        <h2 class="ps-4 fw-bold">HRs Legal and Compliance</h2>
        <!-- video -->
        <div class="row gy-0 pt-4">
            <div class="col">
                <div class="card bg-light text-white mx-md-3 mx-1 border-light">
                    <div class="ratio ratio-16x9">
                        <!-- Default Image -->
                        <img src="{{asset('assets/images/articles/'. (isset($legalCompliances[0])? $legalCompliances[0]->image:''))}}" class="card-img image-center" alt="{{isset($legalCompliances[0])? $legalCompliances[0]->title: ''}}" />
                        <div class="gradient position-absolute start-0 top-0 rounded-4" style="width: 100%; height: 100%"></div>
                    </div>
                    <div class="card-img-overlay overflow-auto responsive-card">
                        <h5 class="card-title fs-card-xl">
                            {{isset($legalCompliances[0])? $legalCompliances[0]->title: 'HRs Legal and compliance'}}
                        </h5>
                        <p class="fw-semibold fs-card-l">{{isset($legalCompliances[0])? Carbon\Carbon::parse($legalCompliances[0]->created_at)->format('l M d Y'): ''}}</p>
                        <p class="fw-semibold fs-card-md">
                            @isset($legalCompliances[0])
                                {{$legalCompliances[0]->author->userAuthor->firstName}} {{$legalCompliances[0]->author->userAuthor->secondName}}
                            @endisset
                        </p>
                        <p class="fs-card-sm open-font fw-semibold">
                            {{isset($legalCompliances[0])? mb_substr($legalCompliances[0]->content, 0, 260) . '.....': ''}}
                            @isset($legalCompliances[0])
                                <a
                                    href="{{route('articleSingle', [$legalCompliances[0]->articleCategory->slug, $legalCompliances[0]->slug])}}"
                                    class="fw-bold text-decoration-none text-white"
                                >Read more</a>
                            @endisset
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <!-- end video -->
    </div>
</div>

<!-- cards -->
<div class="bg-primary py-5 mb-5 justify-content-center">
    <div class="container-fluid">
        <div class="row gx-4 gy-5">
            <!-- Card 1 -->
            @foreach($legalCompliances->take((($count=$legalCompliances->count())<= 1? $count:-$count+1)) as $article)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card h-100 border-0">
                    <img src="{{asset('assets/images/articles/'.$article->image)}}" class="card-img-top rounded-top img-fluid" alt="{{$article->title}}" style="height: 390px" />
                    <div class="card-body bg-dark text-white pt-4">
                        <h4 class="card-title">{{$article->title}}</h4>
                        <h5>{{ \Carbon\Carbon::parse($article->created_at)->format('l M d Y') }}</h5>
                        <h6>{{$article->author->userAuthor->firstName}} {{$article->author->userAuthor->secondName}}</h6>

                        <p class="card-text fw-semibold">
                            {{Str::limit($article->content, 225)}}
                            <a href="{{ route('articleSingle', ['category' => $article->articleCategory->slug, 'article' => $article->slug]) }}" class="text-white text-decoration-none fw-bold readMoreLink">
                                Read more</a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- end bg primary-->
    </div>
</div>
@endsection
