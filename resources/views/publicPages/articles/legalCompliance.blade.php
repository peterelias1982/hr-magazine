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
                        <img src="{{asset('assets/images/articles/'.$latestLegalCompliances->image)}}" alt="Default Video Image" />
                        <div class="gradient position-absolute start-0 top-0 rounded-4" style="width: 100%; height: 100%"></div>
                    </div>

                    <!-- <div
                        class="gradient position-absolute start-0 top-0 w-100 h-100"
                          ></div>-->
                    <div class="card-img-overlay overflow-auto responsive-card">
                        <h5 class="card-title fs-card-xl">
                            HRs Legal and compliance
                        </h5>
                        <p class="fw-semibold fs-card-l">{{ \Carbon\Carbon::parse($latestLegalCompliances->created_at)->format('l M d Y') }}</p>
                        <p class="fw-semibold fs-card-md">{{$latestLegalCompliances->author->userAuthor->firstName}} {{$latestLegalCompliance->author->userAuthor->secondName}}</p>
                        <p class="fs-card-sm open-font fw-semibold">
                            {{Str::limit($latestLegalCompliances->content, 266)}}
                            <a href="{{ route('articleSingle', ['category' => $latestLegalCompliances->articleCategory->slug, 'article' => $latestLegalCompliances->slug]) }}" class="fw-bold text-decoration-none text-white">Read more</a>
                        </p>
                        @endforeach
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
            @foreach($legalCompliances as $legalCompliance)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card h-100 border-0">
                    <img src="{{asset('assets/images/articles/'.$legalCompliance->image)}}" class="card-img-top rounded-top img-fluid" alt="legal-compliance-img12" style="height: 390px" />
                    <div class="card-body bg-dark text-white pt-4">
                        <h4 class="card-title">HRs Legal Industry Updates</h4>
                        <h5>{{ \Carbon\Carbon::parse($legalCompliance->created_at)->format('l M d Y') }}</h5>
                        <h6>{{$legalCompliance->author->userAuthor->firstName}} {{$legalCompliance->author->userAuthor->secondName}}</h6>

                        <p class="card-text fw-semibold">
                            {{Str::limit($legalCompliance->content, 227)}}
                            <a href="{{ route('articleSingle', ['category' => $legalCompliance->articleCategory->slug, 'article' => $legalCompliance->slug]) }}" class="text-white text-decoration-none fw-bold readMoreLink">
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