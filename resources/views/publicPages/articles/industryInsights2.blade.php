@extends('publicPages.layouts.main')

@section('publicPagesContent')
<!-- start of content -->
<div class="container-fluid">
    <div class="row bg-light px-md-5 px-1 py-4">
        <h3 class="fw-bold fs-2">Industry Trends</h3>
        <div class="col">
            <div class="card bg-dark text-white landing-img mx-lg-5 mx-md-3 mx-1" style="border: 1px solid hsla(0, 2%, 68%, 0.4); height: 695px">
                <img src="{{asset('assets/images/articles/'. (isset($trends[0])? $trends[0]->image:''))}}" class="card-img image-center" alt="{{isset($trends[0])? $trends[0]->title: ''}}" />
                <div class="gradient position-absolute start-0 top-0" style="width: 100%; height: 100%"></div>
                <div class="card-img-overlay overflow-auto">
                    <h5 class="card-title fw-bold fs-3">
                        {{isset($trends[0])? $trends[0]->title: 'HRs Magazine Industry Trends'}}
                    </h5>
                    <p class="card-text fw-600 fs-4">{{isset($trends[0])? Carbon\Carbon::parse($trends[0]->created_at)->format('l M d Y'): ''}}</p>
                    <p class="card-text fs-5 fw-600">
                        {{isset($trends[0])? mb_substr($trends[0]->content, 0, 260) . '.....': ''}}
                        @if(isset($trends[0]))
                            <a
                                href="{{route('articleSingle', [$trends[0]->articleCategory->slug, $trends[0]->slug])}}"
                                class="fw-bold text-decoration-none text-white"
                            >Read more</a>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row slide_group overflow-hidden bg-dark mb-3">
        <div class="row bg-dark slideWrapper flex-nowrap">
            @foreach($trends->take((($count=$trends->count())<= 1? $count:-$count+1)) as $article)
            <div class="col-md-8 py-3 px-4 sliderWrapper">
                <div class="card mb-3 bg-dark border-0 slide_custom">
                    <div class="row g-0 align-items-center justify-content-center">
                        <div class="col-md-4 overflow-hidden position-relative" style="height: 170px">
                            <img src="{{asset('assets/images/articles/'.$article->image)}}" class="img-fluid rounded-start image-center" alt="{{$article->title}}" />
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary fw-bold fs-5">
                                    {{$article->title}}
                                </h5>
                                <p class="card-text fs-6 text-white">
                                    {{ \Carbon\Carbon::parse($article->created_at)->format('l M d Y') }}
                                </p>
                                <p class="card-text fs-14px text-white">
                                    {{Str::limit($article->content, 220)}}
                                    <a href="{{ route('articleSingle', ['category' => $article->articleCategory->slug, 'article' => $article->slug]) }}" class="fw-600 text-white text-decoration-none">Read more</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="arrow-container d-flex justify-content-between">
            <a class="previous_btn"><img src="{{asset('publicPages/images/Arrow_left.svg')}}" alt="arrow img left" /></a>
            <a class="next_btn"><img src="{{asset('publicPages/images/Arrow_right.svg')}}" alt="arrow img right" /></a>
        </div>
    </div>
</div>

<div class="row bg-light">
    <div class="col-12 bg-primary p-5">
        <h3 class="fw-bold fs-2 text-white">Industry Insights</h3>
    </div>
    <div class="col-12">
        <div class="row pb-5">
            @foreach($insights as $article)
            <div class="col-lg-6">
                <div class="card bg-dark text-white mx-md-5 mx-1 mt-5 overflow-hidden position-relative" style="
                    border: 5px solid hsla(355, 84%, 41%, 0.8);
                    height: 389px;
                  ">
                    <img src="{{asset('assets/images/articles/'.$article->image)}}" class="card-img image-center" alt="{{$article->title}}" />
                    <div class="gradient position-absolute start-0 top-0" style="width: 100%; height: 100%"></div>
                    <div class="card-img-overlay overflow-auto" style="top: 46%">
                        <h5 class="card-title fw-bold fs-5 text-border">
                            {{$article->title}}
                        </h5>
                        <p class="card-text fw-600 fs-6 text-border">
                            {{ \Carbon\Carbon::parse($article->created_at)->format('l M d Y') }}
                        </p>
                        <p class="card-text fs-6 fw-600 text-border">
                            {{Str::limit($article->content, 227)}}
                            <a href="{{ route('articleSingle', ['category' => $article->articleCategory->slug, 'article' => $article->slug]) }}" class="fw-bold text-decoration-none text-white">Read more</a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection
