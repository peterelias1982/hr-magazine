@extends('publicPages.layouts.main')

@section('category')
    {{$categoryData->articleCategoryName}}
@endsection
@section('subCategory')
    {{$categoryData->subCategory}}
@endsection
@section('createdDate')
    {{Carbon\Carbon::parse($articleData->created_at)->format('l M d Y')}}
@endsection

@section('publicPagesContent')
    <!-- start of content -->
    @include('publicPages.includes.breadcrumb')

    <div class="container-fluid g-0 bg-light pt-3 pb-5 px-lg-5 px-md-3 px-1">
        <!-- image header -->
        <div
            class="position-relative overflow-hidden mx-3 mb-3"
            style="height: 695px"
        >
            <img
                src="{{asset('assets/images/articles/'.$articleData->image)}}"
                class="rounded image-center"
                alt="DEI-header-img"
            />
        </div>
        <!-- article -->
        <div class="mx-auto" style="max-width: 1225px">
            @php
                $paragraphs=explode("\n", $articleData->content);
            @endphp
            <article>
                <p>
                    {{$paragraphs[0]}}
                </p>
                <h2 class="fs-1">{{$articleData->title}}</h2>
                <p> 
                    {{$paragraphs[1]}}
                </p>
                @if($categoryData->hasYoutubeLink)
                     <!-- video -->
                     <div class="row m-auto g-0 pb-3">
                        <div class="col">
                            <div class="card bg-light text-white border-light">
                                <div class="ratio ratio-16x9">
                                    <!-- Default Image -->
                                    <img
                                        src="{{asset('assets/images/articles/'.$articleData->image)}}"
                                        alt="Default Video Image"
                                        class="embed-cover"
                                    />
                                    <!-- Iframe for Video -->
                                    <iframe
                                        src="{{$articleData->youtubeLink}}"
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
                                            src="{{asset('publicPages/images/video-play-btn.svg')}}"
                                            alt="Play Video"
                                            class="embed-cover-btn"
                                        />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @foreach(array_slice($paragraphs,2) as $paragraph)
                    <p>{{$paragraph}}</p>

                @endforeach
                @if($categoryData->hasSource)
                    <div class="py-5">
                        <p class="text-lead fs-3 mb-2 fw-600">Source </p>
                        <p class="fw-600 fs-4">{{$articleData->sourceName}} <a
                                href="{{$articleData->sourceLink}}">{{$articleData->sourceLink}}</a></p>
                    </div>
                @endif
            </article>
        </div>
    @if($categoryData->hasAuthor)
        <div class="row d-flex justify-content-center">
            <div class="col-xl-2 col-md-3 col-sm-12">
                <div class="mt-5 rounded-circle-container">
                    <img
                        src="{{asset('assets/images/users/'.$articleData->userImage)}}"
                        class="img-fluid"
                        alt="User-Profile-Image"
                    />
                </div>
            </div>
            <div class="col-xl-10 col-md-9 col-sm-12">
                <h4 class="fw-bold mt-5 pb-2">{{$articleData->firstName}} {{$articleData->secondName}}</h4>
                <p class="fs-4 fw-semibold mt-2 pb-2">
                    {{Str::limit($articleData->description, 260)}}...
                    <a href="{{route('authorSingle', $articleData->userSlug)}}" class="text-decoration-none text-dark fw-bold">Read more</a>
                </p>
            </div>
        </div>
    @endif
    </div>
    @if($categoryData->hasComments)
        {{--    if article has comment section --}}
        @include('publicPages.includes.commentSection')
        <!-- end container-->
    @endif
@endsection
