@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <div class="bg-light py-5 mb-5" id="workplace-culture">
        <div class="container-fluid">
            <h2 class="ps-4 fw-bold">HRs Workplace Culture and Programmes</h2>
            <!-- video -->
            <div class="row gy-0 pt-4">
                <div class="col">
                    <div class="card bg-light text-white mx-md-3 mx-1 border-light">
                        <div class="ratio ratio-16x9">
                            <!-- Default Image -->
                            <img
                                src="{{asset('assets/images/articles/' . (isset($workplaceCultures[0])? $workplaceCultures[0]->image: ''))}}"
                                alt="{{isset($workplaceCultures[0])? $workplaceCultures[0]->title:'article image'}}"
                                class="image-center"
                            />
                            <div
                                class="gradient position-absolute start-0 top-0"
                                style="width: 100%; height: 100%"
                            ></div>
                        </div>

                        <div class="card-img-overlay overflow-auto responsive-card">
                            <h5 class="card-title fs-card-xl">{{isset($workplaceCultures[0])? $workplaceCultures[0]->title: 'HRs Workplace Culture'}}</h5>
                            <p class="fw-semibold fs-card-l">
                                {{isset($workplaceCultures[0])? Carbon\Carbon::parse($workplaceCultures[0]->created_at)->format('l M d Y'): ''}}
                            </p>
                            <p class="fw-semibold fs-card-md">
                                {{isset($workplaceCultures[0])? $workplaceCultures[0]->author->userAuthor->firstName . ' ' . $workplaceCultures[0]->author->userAuthor->secondName:''}}
                            </p>
                            <p class="fs-card-sm open-font fw-semibold">
                                {{isset($workplaceCultures[0])? mb_substr($workplaceCultures[0]->content, 0, 260) . '.....': ''}}
                                @if(isset($workplaceCultures[0]))
                                    <a
                                        href="{{route('articleSingle', [$workplaceCultures[0]->articleCategory->slug, $workplaceCultures[0]->slug])}}"
                                        class="fw-bold text-decoration-none text-white"
                                    >Read more</a>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-light py-3 mb-5">
        <div class="container-fluid">
            <!-- section 1  Workplace Culture-->
            <div class="row gx-md-5 gx-0 m-auto pb-5">
                <!-- carousel 1-->
                <div class="col">
                    <div
                        id="carouselWorkplaceCulture"
                        class="carousel slide custom-carousel"
                        data-bs-ride="carousel"
                    >
                        <div class="carousel-inner">
                             @foreach($workplaceCultures->take((($count = $workplaceCultures->count())<= 1)? $count:-$count + 1) as $article)
                            <div class="carousel-item {{$loop->first? 'active':''}}" data-bs-interval="3500">
                                <!-- text -->
                                <h2 class="pb-4">Workplace Culture</h2>
                                <!-- slide image -->
                                <div
                                    class="row pb-4 carousel-img position-relative overflow-hidden"
                                    style="height: 690px"
                                >
                                    <img
                                        src="{{asset('assets/images/articles/'.$article->image)}}"
                                        class="d-block image-center"
                                        alt="{{$article->title}}"
                                    />
                                    <button
                                        class="carousel-control-prev custom-carousel-prev"
                                        type="button"
                                        data-bs-target="#carouselWorkplaceCulture"
                                        data-bs-slide="prev"
                                    >
                        <span
                            class="carousel-control-prev-icon custom-carousel-prev-icon"
                            aria-hidden="true"
                        ></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button
                                        class="carousel-control-next custom-carousel-next"
                                        type="button"
                                        data-bs-target="#carouselWorkplaceCulture"
                                        data-bs-slide="next"
                                    >
                        <span
                            class="carousel-control-next-icon custom-carousel-next-icon"
                            aria-hidden="true"
                        ></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <!-- team info -->
                                <div class="row justify-content-center py-3">
                                    <div class="col-xl-2 col-md-3  d-flex">
                                        <div class="rounded-circle-container">
                                            <img
                                                src="{{asset('assets/images/users/'.$article->author->userAuthor->image)}}"
                                                class="img-fluid"
                                                alt="Profile-img"
                                            />
                                        </div>
                                    </div>

                                    <div
                                        class="col-xl-10 col-md-9  d-flex flex-column"
                                    >
                                        <h2 class="fw-bolder">{{$article->title}}</h2>
                                        <h3 class="fw-bold">{{Carbon\Carbon::parse($article->created_at)->format('l M d Y')}}</h3>
                                        <h4 class="fw-bold">{{$article?->author->userAuthor->firstName}} {{$article?->author->userAuthor->secondName}}</h4>
                                        <p class="fs-4 fw-semibold">
                                            {{mb_substr($article->content, 0, 120)}}....
                                            <a
                                                href="{{route('articleSingle', [$article->articleCategory->slug, $article->slug])}}"
                                                class="fw-bold text-dark text-decoration-none"
                                            >Read more</a>
                                        </p>
                                    </div>
                                </div>
                                <!-- line -->
                                <div class="row justify-content-center">
                                    <div class="col-9 border-1 border-dark"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- end carousel 1-->
            </div>
            <!-- end section 1 Workplace Culture-->

            <!-- section 2 Diversity, Equity, and Inclusion (DEI)-->
            <div class="row gx-md-5 gx-0 m-auto py-5" id="DEI">
                <!-- carousel 2-->
                <div class="col">
                    <div
                        id="carouselDEI"
                        class="carousel slide custom-carousel"
                        data-bs-ride="carousel"
                    >
                        <div class="carousel-inner">
                            @foreach($hrDiversities as $article)
                                <div class="carousel-item {{$loop->first? 'active':''}}" data-bs-interval="3500">
                                    <!-- text -->
                                    <h2 class="pb-4">Diversity, Equality & Inclusion</h2>
                                    <!-- slide image -->
                                    <div
                                        class="row pb-4 carousel-img position-relative overflow-hidden"
                                        style="height: 690px"
                                    >
                                        <img
                                            src="{{asset('assets/images/articles/'.$article->image)}}"
                                            class="d-block image-center"
                                            alt="{{$article->title}}"
                                        />
                                        <button
                                            class="carousel-control-prev custom-carousel-prev"
                                            type="button"
                                            data-bs-target="#carouselWorkplaceCulture"
                                            data-bs-slide="prev"
                                        >
                        <span
                            class="carousel-control-prev-icon custom-carousel-prev-icon"
                            aria-hidden="true"
                        ></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button
                                            class="carousel-control-next custom-carousel-next"
                                            type="button"
                                            data-bs-target="#carouselWorkplaceCulture"
                                            data-bs-slide="next"
                                        >
                        <span
                            class="carousel-control-next-icon custom-carousel-next-icon"
                            aria-hidden="true"
                        ></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    <!-- team info -->
                                    <div class="row justify-content-center py-3">
                                        <div class="col-xl-2 col-md-3  d-flex">
                                            <div class="rounded-circle-container">
                                                <img
                                                    src="{{asset('assets/images/users/'.$article->author->userAuthor->image)}}"
                                                    class="img-fluid"
                                                    alt="Profile-img"
                                                />
                                            </div>
                                        </div>

                                        <div
                                            class="col-xl-10 col-md-9  d-flex flex-column"
                                        >
                                            <h2 class="fw-bolder">{{$article->title}}</h2>
                                            <h3 class="fw-bold">{{Carbon\Carbon::parse($article->created_at)->format('l M d Y')}}</h3>
                                            <h4 class="fw-bold">{{$article?->author->userAuthor->firstName}} {{$article?->author->userAuthor->secondName}}</h4>
                                            <p class="fs-4 fw-semibold">
                                                {{mb_substr($article->content, 0, 120)}}....
                                                <a
                                                    href="{{route('articleSingle', [$article->articleCategory->slug, $article->slug])}}"
                                                    class="fw-bold text-dark text-decoration-none"
                                                >Read more</a>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- line -->
                                    <div class="row justify-content-center">
                                        <div class="col-9 border-1 border-dark"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- end carousel 2-->
            </div>
            <!-- end section 2 Diversity, Equity, and Inclusion (DEI)-->

            <!-- section 3 Wellness Programs-->
            <div class="row gx-md-5 gx-0 m-auto py-5" id="wellness-programs">
                <!-- carousel 3-->
                <div class="col">
                    <div
                        id="carouselWellnessPrograms"
                        class="carousel slide custom-carousel"
                        data-bs-ride="carousel"
                    >
                        <div class="carousel-inner">
                            @foreach($wellnessPrograms as $article)
                                <div class="carousel-item {{$loop->first? 'active':''}}" data-bs-interval="3500">
                                    <!-- text -->
                                    <h2 class="pb-4">Wellness Programs</h2>
                                    <!-- slide image -->
                                    <div
                                        class="row pb-4 carousel-img position-relative overflow-hidden"
                                        style="height: 690px"
                                    >
                                        <img
                                            src="{{asset('assets/images/articles/'.$article->image)}}"
                                            class="d-block image-center"
                                            alt="{{$article->title}}"
                                        />
                                        <button
                                            class="carousel-control-prev custom-carousel-prev"
                                            type="button"
                                            data-bs-target="#carouselWorkplaceCulture"
                                            data-bs-slide="prev"
                                        >
                        <span
                            class="carousel-control-prev-icon custom-carousel-prev-icon"
                            aria-hidden="true"
                        ></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button
                                            class="carousel-control-next custom-carousel-next"
                                            type="button"
                                            data-bs-target="#carouselWorkplaceCulture"
                                            data-bs-slide="next"
                                        >
                        <span
                            class="carousel-control-next-icon custom-carousel-next-icon"
                            aria-hidden="true"
                        ></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    <!-- team info -->
                                    <div class="row justify-content-center py-3">
                                        <div class="col-xl-2 col-md-3  d-flex">
                                            <div class="rounded-circle-container">
                                                <img
                                                    src="{{asset('assets/images/users/'.$article->author->userAuthor->image)}}"
                                                    class="img-fluid"
                                                    alt="Profile-img"
                                                />
                                            </div>
                                        </div>

                                        <div
                                            class="col-xl-10 col-md-9  d-flex flex-column"
                                        >
                                            <h2 class="fw-bolder">{{$article->title}}</h2>
                                            <h3 class="fw-bold">{{Carbon\Carbon::parse($article->created_at)->format('l M d Y')}}</h3>
                                            <h4 class="fw-bold">{{$article?->author->userAuthor->firstName}} {{$article?->author->userAuthor->secondName}}</h4>
                                            <p class="fs-4 fw-semibold">
                                                {{mb_substr($article->content, 0, 120)}}....
                                                <a
                                                    href="{{route('articleSingle', [$article->articleCategory->slug, $article->slug])}}"
                                                    class="fw-bold text-dark text-decoration-none"
                                                >Read more</a>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- line -->
                                    <div class="row justify-content-center">
                                        <div class="col-9 border-1 border-dark"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- end carousel 3 -->
            </div>
            <!-- end section 3 Wellness Programs -->

            <!-- section 4 Mental Health in the Workplace-->
            <div class="row gx-md-5 gx-0 m-auto py-5" id="mental-health-in-workplace">
                <!-- carousel 4-->
                <div class="col">
                    <div
                        id="carouselMentalHealth"
                        class="carousel slide custom-carousel"
                        data-bs-ride="carousel"
                    >
                        <div class="carousel-inner">
                            @foreach($mentalHealthInTheWorkplaces as $article)
                                <div class="carousel-item {{$loop->first? 'active':''}}" data-bs-interval="3500">
                                    <!-- text -->
                                    <h2 class="pb-4">Mental Health in Workplace</h2>
                                    <!-- slide image -->
                                    <div
                                        class="row pb-4 carousel-img position-relative overflow-hidden"
                                        style="height: 690px"
                                    >
                                        <img
                                            src="{{asset('assets/images/articles/'.$article->image)}}"
                                            class="d-block image-center"
                                            alt="{{$article->title}}"
                                        />
                                        <button
                                            class="carousel-control-prev custom-carousel-prev"
                                            type="button"
                                            data-bs-target="#carouselWorkplaceCulture"
                                            data-bs-slide="prev"
                                        >
                        <span
                            class="carousel-control-prev-icon custom-carousel-prev-icon"
                            aria-hidden="true"
                        ></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button
                                            class="carousel-control-next custom-carousel-next"
                                            type="button"
                                            data-bs-target="#carouselWorkplaceCulture"
                                            data-bs-slide="next"
                                        >
                        <span
                            class="carousel-control-next-icon custom-carousel-next-icon"
                            aria-hidden="true"
                        ></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    <!-- team info -->
                                    <div class="row justify-content-center py-3">
                                        <div class="col-xl-2 col-md-3  d-flex">
                                            <div class="rounded-circle-container">
                                                <img
                                                    src="{{asset('assets/images/users/'.$article->author->userAuthor->image)}}"
                                                    class="img-fluid"
                                                    alt="Profile-img"
                                                />
                                            </div>
                                        </div>

                                        <div
                                            class="col-xl-10 col-md-9  d-flex flex-column"
                                        >
                                            <h2 class="fw-bolder">{{$article->title}}</h2>
                                            <h3 class="fw-bold">{{Carbon\Carbon::parse($article->created_at)->format('l M d Y')}}</h3>
                                            <h4 class="fw-bold">{{$article?->author->userAuthor->firstName}} {{$article?->author->userAuthor->secondName}}</h4>
                                            <p class="fs-4 fw-semibold">
                                                {{mb_substr($article->content, 0, 120)}}....
                                                <a
                                                    href="{{route('articleSingle', [$article->articleCategory->slug, $article->slug])}}"
                                                    class="fw-bold text-dark text-decoration-none"
                                                >Read more</a>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- line -->
                                    <div class="row justify-content-center">
                                        <div class="col-9 border-1 border-dark"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- end carousel 4-->
            </div>
            <!-- end section 4 Mental Health in the Workplace-->
        </div>
    </div>

@endsection
