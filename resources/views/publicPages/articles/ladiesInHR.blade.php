@extends('publicPages.layouts.main')

@section('publicPagesContent')
<!-- start of content -->
<div class="container-fluid">
    <!--the video player-->
    <div class="row bg-light px-md-3 px-1 py-4">
        <h3 class="fw-bold fs-card-xl mb-3">Ladies Interviews</h3>
        <div class="col">
            <div class="card bg-light text-white mx-md-3 border-light">
                <div class="ratio ratio-16x9">
                    <!-- Default Image -->
                    <img src="{{asset('assets/images/articles/'. (isset($ladiesInterviews[0])? $ladiesInterviews[0]->image:''))}}" alt="{{isset($ladiesInterviews[0])? $ladiesInterviews[0]->title: ''}}" class="embed-cover image-center" />
                    <div class="gradient position-absolute start-0 top-0" style="width: 100%; height: 100%"></div>
                    <!-- Iframe for Video -->
                    <iframe src="{{(isset($ladiesInterviews[0])? $ladiesInterviews[0]->youtubeLink->youtubeLink:'')}}" class="youtube-video embed-cover d-none" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>

                    <!-- Custom Play Button -->
                    <button type="button" class="btn position-absolute top-50 start-50 translate-middle" aria-label="Play Video" onclick="playVideo(this)">
                        <img src="{{asset('publicPages/images/video-play-btn.svg')}}" alt="Play Video" class="embed-cover-btn" />
                    </button>
                </div>

                <div class="card-img-overlay overflow-auto responsive-card">
                    <h5 class="card-title fs-card-xl">{{isset($ladiesInterviews[0])? $ladiesInterviews[0]->title: 'Ladies Interviews'}}</h5>
                    <p class="fw-semibold fs-card-l">{{isset($ladiesInterviews[0])? Carbon\Carbon::parse($ladiesInterviews[0]->created_at)->format('l M d Y'): ''}}</p>
                    <p class="fw-semibold fs-card-md">
                        @isset($ladiesInterviews[0])
                        {{$ladiesInterviews[0]->author->userAuthor->firstName}} {{$ladiesInterviews[0]->author->userAuthor->secondName}}
                        @endisset
                    </p>
                    <p class="fs-card-sm open-font fw-semibold">
                        {{isset($ladiesInterviews[0])? mb_substr($ladiesInterviews[0]->content, 0, 260) . '.....': ''}}
                        @if(isset($ladiesInterviews[0]))
                            <a
                                href="{{route('articleSingle', [$ladiesInterviews[0]->articleCategory->slug, $ladiesInterviews[0]->slug])}}"
                                class="fw-bold text-decoration-none text-white"
                            >Read more</a>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="row slide_group overflow-hidden px-md-5 px-lg-0 g-0 py-3 bg-dark">
        <div class="d-flex flex-nowrap overflow-auto">
            <!-- First card -->
            @foreach($ladiesInterviews->take((($count=$ladiesInterviews->count())<= 1? $count:-$count+1)) as $article)
            <div class="col-12 col-md-8 py-3 px-4 slide_custom sliderWrapper">
                <div class="card mb-3 bg-dark border-0">
                    <div class="row g-0 align-items-center justify-content-center">
                        <div class="col-md-4 overflow-hidden position-relative" style="height: 170px">
                            <div class="ratio ratio-16x9">
                                <!-- Default Image -->
                                <img src="{{asset('assets/images/articles/'.$article->image)}}" alt="{{$article->title}}" class="embed-cover image-center" />
                                <!-- Iframe for Video -->
                                <iframe src="{{$article->youtubeLink->youtubeLink}}" class="youtube-video embed-cover d-none" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                </iframe>

                                <!-- Custom Play Button -->
                                <button type="button" class="btn position-absolute top-50 start-50 translate-middle" aria-label="Play Video" onclick="playVideo(this)">
                                    <img src="{{asset('publicPages/images/video-play-btn.svg')}}" alt="Play Video" class="embed-cover-btn" />
                                </button>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary fw-bold fs-5 hs">
                                    {{$article->title}}
                                </h5>
                                <p class="card-text fs-6 text-white ps">
                                    {{ \Carbon\Carbon::parse($article->created_at)->format('l M d Y') }}
                                </p>
                                <p class="fw-semibold text-white fs-7 ps">
                                    {{$article->author->userAuthor->firstName}} {{$article->author->userAuthor->secondName}}
                                </p>
                                <p class="card-text fs-7 text-white ps">
                                    {{Str::limit($article->content, 227)}}
                                    <a href="{{ route('articleSingle', ['category' => $article->articleCategory->slug, 'article' => $article->slug]) }}" class="fw-semibold text-white text-decoration-none">Read more</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- </div> -->
        </div>
        <div class="arrow-container d-flex justify-content-between">
            <a class="previous_btn"><img src="{{asset('publicPages/images/Arrow_left.svg')}}" alt="arrow img left" /></a>
            <a class="next_btn"><img src="{{asset('publicPages/images/Arrow_right.svg')}}" alt="arrow img right" /></a>
        </div>
    </div>

    <!--cards Caousel-->
    <div class="row bg-white my-3 pb-3" id="journey-to-exellence">
        <div class="col-12 bg-white px-4 pt-3 text-dark">
            <h3 class="fw-bold fs-2">Journey to Excellence</h3>
        </div>
        <div class="col-12">
            <!-- Bootstrap Carousel -->
            <div id="cardCarousel" class="carousel slide" data-bs-ride="carousel">
                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    @foreach($journeyToExcellences as $article)
                    <div class="carousel-item {{$loop->first? 'active':''}}">
                        <div class="card bg-white text-dark mx-auto my-1 border-0">
                            <div class="row align-items-center mx-2 justify-content-center">
                                <!-- Card Content -->
                                <div class="col-md-3">
                                    <div class="position-relative overflow-hidden" style="max-width: 218px; aspect-ratio: 1">
                                        <img src="{{asset('assets/images/users/'.$article->author->userAuthor->image)}}" class="rounded-circle border-light image-center" alt="Profile Image" />
                                    </div>
                                </div>
                                <div class="card-body col-md-8">
                                    <div>
                                        <h5 class="card-title fw-bold fs-3">
                                            {{$article->title}}
                                        </h5>
                                        <p class="card-text fw-semibold fs-4">
                                            {{ \Carbon\Carbon::parse($article->created_at)->format('l M d Y') }}
                                        </p>
                                        <p class="card-text fw-semibold fs-4">
                                            {{$article->author->userAuthor->firstName}} {{$article->author->userAuthor->secondName}}
                                        </p>
                                        <p class="carousel-p card-text fw-medium fs-5">
                                            {{Str::limit($article->content, 120)}}
                                            <a href="{{ route('articleSingle', ['category' => $article->articleCategory->slug, 'article' => $article->slug]) }}" class="fw-bold text-dark text-decoration-none">Read more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Left and right controls/icons with inline styling for custom arrow appearance -->
                <button class="carousel-control-prev" type="button" data-bs-target="#cardCarousel" data-bs-slide="prev">
                    <img src="{{asset('publicPages/images/prev-arrow-black-circle.svg')}}" alt="Previous" class="carousel-control-prev-icon" />
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#cardCarousel" data-bs-slide="next">
                    <img src="{{asset('publicPages/images/next-arrow-black-circle.svg')}}" alt="Next" class="carousel-control-next-icon" />
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <!--End of card carousel-->
    <!--column of article Cards section -->
    <div class="row bg-dark" id="case-studies">
        <div class="col-12 bg-primary p-5 text-white">
            <h3 class="fw-bold fs-2">HR Case Studies</h3>
        </div>
        <!--cards list-->
        <div class="col-12">
            <div>
                <div>
                    @foreach($caseStudies as $article)
                    <div class="card bg-white text-dark mx-auto mx-lg-5 my-3">
                        <div class="row align-items-center gx-5 mx-2 justify-content-center">
                            <!-- Card Content -->
                            <div class="col-md-3">
                                <div class="position-relative overflow-hidden" style="max-width: 218px; aspect-ratio: 1">
                                    <img src="{{asset('assets/images/users/'.$article->author->userAuthor->image)}}" class="rounded-circle border-light image-center" alt="Profile Image" />
                                </div>
                            </div>
                            <div class="card-body col-md-8">
                                <div>
                                    <h5 class="card-title fw-bold fs-3">{{$article->title}}</h5>
                                    <p class="card-text fw-semibold fs-4">
                                        {{ \Carbon\Carbon::parse($article->created_at)->format('l M d Y') }}
                                    </p>
                                    <p class="card-text fw-semibold fs-4">
                                        {{$article->author->userAuthor->firstName}} {{$article->author->userAuthor->secondName}}
                                    </p>
                                    <p class="carousel-p card-text fw-medium fs-5">
                                        {{Str::limit($article->content, 116)}}
                                        <a href="{{ route('articleSingle', ['category' => $article->articleCategory->slug, 'article' => $article->slug]) }}" class="fw-bold text-dark text-decoration-none">Read more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--end of card list-->
    </div>
    <!--end of col of article cards section-->
</div>
@endsection
