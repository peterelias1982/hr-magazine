@extends('publicPages.layouts.main')

@section('category')
    All Authors
@endsection
@section('subCategory')
    Authors
@endsection
@section('createdDate')
    {{Carbon\Carbon::parse($authorData->created_at)->format('l M d Y') }}
@endsection

@section('publicPagesContent')
    @include('publicPages.includes.breadcrumb')

    <!--Start Author landing -->
    <section id="landing-author" class="bg-secondary">
        <div class="container-fluid pt-3">
            <div
                class="card landing-img border border-dark border-5 d-flex mw-100 mt-4 rounded-4 mx-lg-5 mx-md-3 mx-1"
            >
                <img
                    class="image-center"
                    src="{{asset('assets/images/users/' . $authorData->image)}}"
                    alt="Author"
                />
                <div class="gradient position-absolute start-0 top-0" style="width: 100%; height: 100%"></div>
                <div
                    class="card-img-overlay d-flex flex-column justify-content-end"
                >
                    <h2 class="card-title fs-5 text-light">{{$authorData->firstName}} {{$authorData->secondName}}</h2>
                    <span class="card-text mb-4 text-light">{{$authorData->position}}</span>
                </div>
            </div>
        </div>
    </section>
    <!--End Author landing -->
    <!--Start Description -->
    <section id="description" class="bg-secondary">
        <div class="container-fluid py-4">
            <h2 class="mb-5 mt-5 mx-lg-5 mx-md-3 mx-1 px-lg-3">Description</h2>
            @php
                $paragraphs=explode("\n", $authorData->description);
            @endphp
            @foreach($paragraphs as $p)
                <p class="mx-lg-5 mx-md-3 mx-1 px-lg-3">
                    {{$p}}
                </p>
            @endforeach
        </div>
    </section>
    <!--End Description -->
    <!--Start Authors Articles -->
    @if($authorArticles->count() !== 0)
    <section id="description" class="bg-secondary">
        <div class="container-fluid py-4">
            <h2 class="mb-5 mt-5 mx-lg-5 mx-md-3 mx-1 px-lg-3">
                Authors Articles
            </h2>
            @foreach($authorArticles as $article)
                <a
                    class="d-block mb-3 text-info mx-lg-5 mx-md-3 mx-1 px-lg-3"
                    href="{{route('articleSingle', [$article->categorySlug, $article->articleSlug])}}"
                >
                    {{$article->title}}
                </a>
            @endforeach
        </div>
    </section>
    @endif

    <!--End Authors Articles -->
    <!--Start Conatact Us -->
    @if($authorMedia->count() !== 0)
    <section id="conatact" class="bg-secondary px-5 py-5">
        <div class="container-fluid">
            <h2 class="mb-3">To Reach the Author</h2>
            <div class="mx-5">
                @foreach($authorMedia as $media)
                    <a href="{{$media->value}}" class="me-2"><img
                            src="{{asset("publicPages/images/icons8-$media->mediaName.svg")}}"
                            alt="{{$media->mediaName}}"/></a>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!--End Conatact Us -->

@endsection
