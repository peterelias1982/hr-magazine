@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <div class="container-fluid">
        <!--the hero image-->
        <div class="row bg-dark px-md-5 px-1 py-4 mb-0">
            <h3 class="fw-bold fs-2 text-white mb-4">Training and Development</h3>
            <div class="col">
                <div
                    class="card bg-dark text-white landing-img mx-lg-5 mx-md-3 mx-1 border-light"
                    style="height: 695px"
                >
                    <img
                        src="{{ asset('assets/images/articles/'. (isset($trainingAndDevelopments[0])? $trainingAndDevelopments[0]->image:'')) }}"
                        class="card-img image-center"
                        alt="{{(isset($trainingAndDevelopments[0])? $trainingAndDevelopments[0]->title:'')}}"
                    />
                </div>
            </div>
        </div>
        <!--single Card-->
        <div class="row bg-primary mb-3 mt-0 ">
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
                                src="{{ asset('assets/images/users/'. (isset($trainingAndDevelopments[0])? $trainingAndDevelopments[0]?->author->userAuthor->image:'') )}}"
                                class="rounded-circle border-light image-center"
                                alt="Profile Image"
                            />
                        </div>
                    </div>
                    <div class="card-body col-md-8">
                        <div>
                            <h5 class="card-title fw-bold fs-3">
                                {{isset($trainingAndDevelopments[0])? $trainingAndDevelopments[0]->title:'HRs Magazine Training & Development '}}
                            </h5>
                            <p class="card-text fw-semibold fs-4">
                                {{isset($trainingAndDevelopments[0])? Carbon\Carbon::parse($trainingAndDevelopments[0]->created_at)->format('l M d Y'): ''}}
                            </p>
                            <p class="card-text fw-semibold fs-4">
                                {{isset($trainingAndDevelopments[0])? $trainingAndDevelopments[0]->author->userAuthor->firstName . ' ' . $trainingAndDevelopments[0]->author->userAuthor->secondName:''}}
                            </p>
                            <p class="carousel-p card-text fw-medium fs-5">
                                {{isset($trainingAndDevelopments[0])? mb_substr($trainingAndDevelopments[0]->content, 0, 260) . '.....': ''}}
                                @if(isset($trainingAndDevelopments[0]))
                                    <a
                                        href="{{route('articleSingle', [$trainingAndDevelopments[0]->articleCategory->slug, $trainingAndDevelopments[0]->slug])}}"
                                        class="fw-bold text-decoration-none text-white"
                                    >Read more</a>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end of single card-->
        <!--cards Caousel-->
        <div class="row bg-dark my-3 pb-3">
            <div class="col-12 bg-dark px-4 pt-3 text-white">
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
                        @foreach($trainingAndDevelopments->take(1 - $trainingAndDevelopments->count()) as $article)
                        <div class="carousel-item {{$loop->first? 'active':''}}">
                            <div class="card bg-dark text-white mx-auto my-1 border-0">
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
                                                src="{{ asset('assets/images/users/'.$article?->author->userAuthor->image) }}"
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
        <div class="row bg-light" id="authors">
            <div class="col-12 bg-primary p-md-5 p-1 text-white">
                <h3 class="fw-bold fs-2">Authors</h3>
            </div>
            <!--cards list-->
            <div class="col-12">
                <div class="scrollable-card-container">
                    @foreach($authors as $author)
                    <div class="card bg-dark text-white mx-auto mx-lg-5 my-3">
                        <div
                            class="row align-items-center gx-5 mx-2 my-3  justify-content-center"
                        >
                            <!-- Card Content -->
                            <div class="col-md-3">
                                <div
                                    class="position-relative overflow-hidden"
                                    style="max-width: 218px; aspect-ratio: 1"
                                >
                                    <img
                                        src="{{ asset('assets/images/users/' . $author->userAuthor->image) }}"
                                        class="rounded-circle  image-center"
                                        alt="Profile Image"
                                    />
                                </div>
                            </div>
                            <div class="card-body col-md-8">
                                <div>
                                    <h5 class="card-title fw-bold fs-3">
                                        {{$author->userAuthor->firstName}} {{$author->userAuthor->secondName}}
                                    </h5>
                                    <p class="card-text fw-semibold fs-4">
                                        {{$author->userAuthor->position}}
                                    </p>

                                    <p class="carousel-p card-text fw-medium fs-5">
                                        {{mb_substr($author->description, 0, 120)}}....
                                        <a
                                            href="{{route('authorSingle', $author->userAuthor->slug)}}"
                                            class="fw-bold text-white text-decoration-none"
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
