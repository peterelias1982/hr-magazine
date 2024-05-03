@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <div class="container-fluid">
        <div class="row bg-light px-md-5 px-1 py-4">
            <h3 class="fw-bold fs-2">Feature Articles</h3>
            <div class="col">
                <div
                    class="card bg-dark text-white landing-img mx-lg-5 mx-md-3 mx-1"
                    style="border: 1px solid hsla(0, 2%, 68%, 0.4); height: 695px"
                >

                    <img
                        src="{{ asset('assets/images/articles/' . (isset($features[0])? $features[0]->image: '')) }}"
                        class="card-img image-center"
                        alt="{{isset($features[0])? $features[0]->title: ''}}"
                    />
                    <div
                        class="gradient position-absolute start-0 top-0"
                        style="width: 100%; height: 100%"
                    ></div>
                    <div class="card-img-overlay overflow-auto">
                        <h5 class="card-title fw-bold fs-3">
                            {{isset($features[0])? $features[0]->title:'HRs Magazine Feature Articles'}}
                        </h5>
                        <p class="card-text fw-600 fs-4">
                            {{isset($features[0])? Carbon\Carbon::parse($features[0]->created_at)->format('l M d Y'): ''}}
                        </p>
                        <p class="card-text fs-5 fw-600">
                            {{isset($features[0])? mb_substr($features[0]->content, 0, 260) . '.....': ''}}
                            @if(isset($features[0]))
                                <a
                                    href="{{route('articleSingle', [$features[0]->articleCategory->slug, $features[0]->slug])}}"
                                    class="fw-bold text-decoration-none text-white"
                                >Read more</a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row slide_group overflow-hidden bg-dark mb-3">
            <div class="row bg-dark flex-nowrap overflow-hidden slideWrapper">
                    @foreach($features->take((($count =$features->count())<=1? $count:-$count+1)) as $feature)
                        <div class="col-md-8 col-12 py-3 px-4 sliderWrapper slide_custom">
                            <div class="card mb-3 bg-dark border-0 ">
                                <div class="row g-0 align-items-center justify-content-center">
                                    <div
                                        class="col-md-4 overflow-hidden position-relative"
                                        style="height: 170px"
                                    >
                                        <img
                                            src="{{ asset('assets/images/articles/' . $feature->image) }}"
                                            class="img-fluid rounded-start image-center"
                                            alt="{{$feature->title}}"
                                        />
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary fw-bold fs-5">
                                                {{$feature->title}}
                                            </h5>
                                            <p class="card-text fs-6 text-white">
                                                {{Carbon\Carbon::parse($feature->created_at)->format('l M d Y')}}
                                            </p>
                                            <p class="card-text fs-14px text-white">
                                                {{mb_substr($feature->content, 0, 220)}}....<a
                                                    href="{{route('articleSingle', [$feature->articleCategory->slug, $feature->slug])}}"
                                                    class="fw-600 text-white text-decoration-none"
                                                >Read more</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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

        <div class="row bg-light">
            <div class="col-12 bg-primary p-md-5 py-5 px-1">
                <h3 class="fw-bold fs-2 text-white">Recommended Articles</h3>
            </div>
            <div class="col-12">
                <div class="row pb-5">
                    @foreach($recommends as $recommend)
                        <div class="col-lg-6">
                            <div
                                class="card bg-dark text-white mx-md-5 mx-1 mt-5 position-relative overflow-hidden"
                                style="
                    border: 5px solid hsla(355, 84%, 41%, 0.8);
                    height: 389px;
                  "
                            >
                                <img
                                    src="{{ asset('assets/images/articles/' . $recommend->image) }}"
                                    class="card-img image-center"
                                    alt="{{$recommend->title}}"
                                />
                                <div
                                    class="gradient position-absolute start-0 top-0"
                                    style="width: 100%; height: 100%"
                                ></div>
                                <div class="card-img-overlay overflow-auto" style="top: 46%">
                                    <h5 class="card-title fw-bold fs-5 text-border">
                                        {{$recommend->title}}
                                    </h5>
                                    <p class="card-text fw-600 fs-6 text-border">
                                        {{Carbon\Carbon::parse($recommend->created_at)->format('l M d Y')}}
                                    </p>
                                    <p class="card-text fs-6 fw-600 text-border">
                                        {{mb_substr($recommend->content, 0, 220)}}.....
                                        <a
                                            href="{{route('articleSingle', [$recommend->articleCategory->slug, $recommend->slug])}}"
                                            class="fw-bold text-decoration-none text-white"
                                        >Read more</a>
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
