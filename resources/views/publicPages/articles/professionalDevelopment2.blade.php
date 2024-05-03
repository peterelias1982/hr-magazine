@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <div class="container-fluid">
        <!--the video player-->
        <div class="row bg-light px-md-3 px-1 py-4">
            <h3 class="fw-bold fs-card-xl mb-3">Expert Interviews</h3>
            <div class="col">
                <div class="card bg-light text-white mx-md-3 mx-1 border-light">
                    <div class="ratio ratio-16x9">
                        <!-- Default Image -->
                        <img
                            src="{{asset('assets/images/articles/' . (isset($expertInterviews[0])? $expertInterviews[0]->image: ''))}}"
                            alt="{{isset($expertInterviews[0])? $expertInterviews[0]->title:''}}"
                            class="embed-cover"
                        />
                        <!-- Iframe for Video -->
                        <iframe
                            src="{{isset($expertInterviews[0])? $expertInterviews[0]?->youtubeLink->youtubeLink : ''}}"
                            class="youtube-video embed-cover d-none"
                            frameborder="0"
                            title="YouTube video player"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture web-share"
                            referrerpolicy="strict-origin-when-cross-origin"
                            allowfullscreen
                        >
                        </iframe>

                        <!-- Custom Play Button -->
                        <button
                            type="button"
                            class="btn position-absolute top-50 start-50 translate-middle"
                            aria-label="Play Video"
                            onclick="playVideo(this)"
                        >
                            <img
                                src="{{ asset('publicPages/images/video-play-btn.svg') }}"
                                alt="Play Video"
                                class="embed-cover-btn"
                            />
                        </button>
                    </div>
                    <div class="card-img-overlay overflow-auto responsive-card">
                        <h5 class="card-title fs-card-xl">{{isset($expertInterviews[0])? $expertInterviews[0]->title:'HRs Magazine Expert Interviews'}}</h5>
                        <p class="fw-semibold fs-card-l">{{isset($expertInterviews[0])? Carbon\Carbon::parse($expertInterviews[0]->created_at)->format('l M d Y'): ''}}</p>
                        <p class="fw-semibold fs-card-md">{{isset($expertInterviews[0])?  $expertInterviews[0]?->author->userAuthor->firstName.' ' . $expertInterviews[0]?->author->userAuthor->secondName :''}}</p>
                        <p class="fs-card-sm open-font fw-semibold">
                            {{isset($expertInterviews[0])? mb_substr($expertInterviews[0]->content, 0, 260) . '.....': ''}}
                            @if(isset($expertInterviews[0]))
                                <a
                                    href="{{route('articleSingle', [$expertInterviews[0]->articleCategory->slug, $expertInterviews[0]->slug])}}"
                                    class="fw-bold text-decoration-none text-white"
                                >Read more</a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!---------------------mini videos scroller---------------------->
        <div class="row slide_group overflow-hidden bg-dark">
            <div class="row flex-nowrap slideWrapper overflow-hidden">
                @if(count($expertInterviews) <= 4 )
                    @foreach($expertInterviews as $article)
                        <div class="sliderWrapper col-md-8 col-12 py-3 px-4">
                            <div class="card mb-3 bg-dark border-0 slide_custom">
                                <div class="row align-items-center justify-content-center">
                                    <div
                                        class="col-md-4 overflow-hidden position-relative"
                                        style="height: 170px"
                                    >
                                        <div class="ratio ratio-16x9">
                                            <!-- Default Image -->
                                            <img
                                                src="{{ asset('assets/images/articles/' . $article->image) }}"
                                                alt="Default Video Image"
                                                class="embed-cover image-center"
                                            />
                                            <!-- Iframe for Video -->
                                            <iframe
                                                src="{{$article?->youtubeLink->youtubeLink}}"
                                                class="youtube-video embed-cover d-none"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen
                                            >
                                            </iframe>

                                            <!-- Custom Play Button -->
                                            <button
                                                type="button"
                                                class="btn position-absolute top-50 start-50 translate-middle"
                                                aria-label="Play Video"
                                                onclick="playVideo(this)"
                                            >
                                                <img
                                                    src="{{ asset('publicPages/images/video-play-btn.svg') }}"
                                                    alt="Play Video"
                                                    class="embed-cover-btn"
                                                />
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-12">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary fw-bold fs-5">
                                                {{$article->title}}
                                            </h5>
                                            <p class="card-text fs-6 text-white">
                                                {{Carbon\Carbon::parse($article->created_at)->format('l M d Y')}}
                                            </p>
                                            <p class="fw-semibold text-white fs-7">
                                                {{$article?->author->userAuthor->firstName}} {{$article?->author->userAuthor->secondName}}
                                            </p>
                                            <p class="card-text fs-6 fw-600 text-white">
                                                {{mb_substr($article->content, 0, 220)}}.....
                                                <a
                                                    href="{{route('articleSingle', [$article->articleCategory->slug, $article->slug])}}"
                                                    class="fw-bold text-decoration-none text-white"
                                                >Read more</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach($expertInterviews as $article)
                        @if ($loop->first)
                            @continue
                        @endif
                        <div class="sliderWrapper col-md-8 col-12 py-3 px-4">
                            <div class="card mb-3 bg-dark border-0 slide_custom">
                                <div class="row align-items-center justify-content-center">
                                    <div
                                        class="col-md-4 overflow-hidden position-relative"
                                        style="height: 170px"
                                    >
                                        <div class="ratio ratio-16x9">
                                            <!-- Default Image -->
                                            <img
                                                src="{{ asset('assets/images/articles/' . $article->image) }}"
                                                alt="Default Video Image"
                                                class="embed-cover image-center"
                                            />
                                            <!-- Iframe for Video -->
                                            <iframe
                                                src="{{$article?->youtubeLink->youtubeLink}}"
                                                class="youtube-video embed-cover d-none"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen
                                            >
                                            </iframe>

                                            <!-- Custom Play Button -->
                                            <button
                                                type="button"
                                                class="btn position-absolute top-50 start-50 translate-middle"
                                                aria-label="Play Video"
                                                onclick="playVideo(this)"
                                            >
                                                <img
                                                    src="{{ asset('publicPages/images/video-play-btn.svg') }}"
                                                    alt="Play Video"
                                                    class="embed-cover-btn"
                                                />
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-12">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary fw-bold fs-5">
                                                {{$article->title}}
                                            </h5>
                                            <p class="card-text fs-6 text-white">
                                                {{Carbon\Carbon::parse($article->created_at)->format('l M d Y')}}
                                            </p>
                                            <p class="fw-semibold text-white fs-7">
                                                {{$article?->author->userAuthor->firstName}} {{$article?->author->userAuthor->secondName}}
                                            </p>
                                            <p class="card-text fs-6 fw-600 text-white">
                                                {{mb_substr($article->content, 0, 220)}}.....
                                                <a
                                                    href="{{route('articleSingle', [$article->articleCategory->slug, $article->slug])}}"
                                                    class="fw-bold text-decoration-none text-white"
                                                >Read more</a>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="arrow-container d-flex justify-content-between">
                <a class="previous_btn"
                ><img src="{{ asset('publicPages/images/Arrow_left.svg') }}" alt="arrow img left"
                    /></a>
                <a class="next_btn"
                ><img
                        src="{{ asset('publicPages/images/Arrow_right.svg') }}"
                        alt="arrow img right"
                    /></a>
            </div>
        </div>

        <!-----------End of mini videos scroller---------------->
        <!--cards Caousel-->
        <div class="row bg-primary my-3 pb-3">
            <div class="col-12 bg-primary px-4 pt-3 text-dark">
                <h3 class="fw-bold fs-2">Professional Advice</h3>
            </div>
            <div class="col-12">
                <!-- Bootstrap Carousel -->
                <div
                    id="cardCarousel"
                    class="carousel slide"
                    data-bs-ride="carousel"
                >
                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        @foreach($professionalsSpotlights->take(5) as $article)
                            <div class="carousel-item {{$loop->first? 'active':''}}">
                                <div class="card bg-primary text-white mx-auto my-1 border-0">
                                    <div
                                        class="row align-items-center mx-2 justify-content-center"
                                    >
                                        <!-- Card Content -->
                                        <div class="col-md-3">
                                            <div
                                                class="position-relative overflow-hidden"
                                                style="max-width: 218px; aspect-ratio: 1"
                                            >
                                                <img
                                                    src="{{ asset('assets/images/users/' . $article?->author->userAuthor->image) }}"
                                                    class="rounded-circle border-light image-center"
                                                    alt="Profile Image"
                                                />
                                            </div>
                                        </div>
                                        <div class="card-body col-md-8">
                                            <div>
                                                <h5 class="card-title fw-bold fs-3">
                                                    {{$article->title}}
                                                </h5>
                                                <p class="card-text fw-semibold fs-4">
                                                    {{Carbon\Carbon::parse($article->created_at)->format('l M d Y')}}
                                                </p>
                                                <p class="card-text fw-semibold fs-4">
                                                    {{$article?->author->userAuthor->firstName}} {{$article?->author->userAuthor->secondName}}
                                                </p>
                                                <p class="carousel-p card-text fw-medium fs-5">
                                                    {{mb_substr($article->content, 0, 120)}}....
                                                    <a
                                                        href="{{route('articleSingle', [$article->articleCategory->slug, $article->slug])}}"
                                                        class="fw-bold text-white text-decoration-none"
                                                    >Read more</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Left and right controls/icons with inline styling for custom arrow appearance -->
                        <button
                            class="carousel-control-prev"
                            type="button"
                            data-bs-target="#cardCarousel"
                            data-bs-slide="prev"
                        >
                            <img
                                src="{{ asset('publicPages/images/prev-arrow-black-circle.svg') }}"
                                alt="Previous"
                                class="carousel-control-prev-icon"
                            />
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button
                            class="carousel-control-next"
                            type="button"
                            data-bs-target="#cardCarousel"
                            data-bs-slide="next"
                        >
                            <img
                                src="{{ asset('publicPages/images/next-arrow-black-circle.svg') }}"
                                alt="Next"
                                class="carousel-control-next-icon"
                            />
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--End of card carousel-->
        <!--column of article Cards section -->
        <div class="row bg-dark">
            <div class="col-12 bg-primary p-5 text-white">
                <h3 class="fw-bold fs-2">Professional Spotlights</h3>
            </div>
            <!--cards list-->
            <div class="col-12">
                <div class="scrollable-card-container">

                    @foreach($professionalsSpotlights->take((($count=$professionalsSpotlights->count()) <= 5)? $count: -$count + 4) as $article)
                        <div class="card bg-white text-dark mx-auto mx-lg-5 my-3">
                            <div
                                class="row align-items-center gx-5 mx-2 justify-content-center"
                            >
                                <!-- Card Content -->
                                <div class="col-md-3">
                                    <div
                                        class="position-relative overflow-hidden"
                                        style="max-width: 218px; aspect-ratio: 1"
                                    >
                                        <img
                                            src="{{ asset('assets/images/users/' . $article?->author->userAuthor->image) }}"
                                            class="rounded-circle border-light image-center"
                                            alt="Profile Image"
                                        />
                                    </div>
                                </div>
                                <div class="card-body col-md-8">
                                    <div>
                                        <h5 class="card-title fw-bold fs-3">
                                            {{$article->title}}
                                        </h5>
                                        <p class="card-text fw-semibold fs-4">
                                            {{Carbon\Carbon::parse($article->created_at)->format('l M d Y')}}
                                        </p>
                                        <p class="card-text fw-semibold fs-4">
                                            {{$article?->author->userAuthor->firstName}} {{$article?->author->userAuthor->secondName}}
                                        </p>
                                        <p class="carousel-p card-text fw-medium fs-5">
                                            {{mb_substr($article->content, 0, 120)}}....
                                            <a
                                                href="{{route('articleSingle', [$article->articleCategory->slug, $article->slug])}}"
                                                class="fw-bold text-dark text-decoration-none"
                                            >Read more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!--end of card list-->
        </div>
        <!--end of col of article cards section-->
    </div>
@endsection
