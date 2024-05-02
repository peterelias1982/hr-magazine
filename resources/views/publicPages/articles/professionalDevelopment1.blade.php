@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <!-- start of content -->
    <div class="container-fluid">
        <div class="row bg-light px-md-5 px-1 py-4">
            <h3 class="fw-bold fs-2">Feature Articles</h3>
            <div class="col">
                <div
                    class="card bg-dark text-white landing-img mx-lg-5 mx-md-3 mx-1"
                    style="border: 1px solid hsla(0, 2%, 68%, 0.4); height: 695px"
                >
                    
                
                    <img
                        src="{{asset('publicPages/images/featureArticles.jpg')}}"
                        class="card-img image-center"
                        alt="..."
                    />
                    <div
                        class="gradient position-absolute start-0 top-0"
                        style="width: 100%; height: 100%"
                    ></div>
                    <div class="card-img-overlay overflow-auto">
                        <h5 class="card-title fw-bold fs-3">
                            HRs Magazine Feature Articles
                        </h5>
                        @foreach($latestFeatures as $latestFeature)
                        <p class="card-text fw-600 fs-4">{{ \Carbon\Carbon::parse($latestFeature->created_at)->format('l M d Y') }}</p>
                        <p class="card-text fs-5 fw-600">
                            {{Str::limit($latestFeature->content, 280)}}<a
                                href="{{ route('articleSingle', ['category' => $latestFeature->articleCategory->slug, 'article' => $latestFeature->slug]) }}"
                                class="fw-bold text-decoration-none text-white"
                            >
                            Read more</a
                            >
                            
                        </p>
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="row slide_group overflow-hidden bg-dark mb-3">
            <div class="row bg-dark flex-nowrap overflow-auto slideWrapper">
              @foreach($news as $new)  
                <div class="col-md-8 col-12 py-3 px-4 sliderWrapper">
                    <div class="card mb-3 bg-dark border-0 slide_custom">   
                        <div class="row g-0 align-items-center justify-content-center"> 
                            <div
                                class="col-md-4 overflow-hidden position-relative"
                                style="height: 170px">
                                <img
                                    src="{{asset('publicPages/images/featureArticles2.jpg')}}"
                                    class="img-fluid rounded-start image-center"
                                    alt="..."
                                />
                        </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title text-primary fw-bold fs-5">
                                        HRs Magazine Industry News
                                    </h5>
                                    <p class="card-text fs-6 text-white">
                                        {{ \Carbon\Carbon::parse($new->created_at)->format('l M d Y') }}
                                    </p>
                                    <p class="card-text fs-14px text-white">
                                        {{Str::limit($new->content, 241)}}<a
                                            href="{{ route('articleSingle', ['category' => $new->articleCategory->slug, 'article' => $new->slug]) }}"
                                            class="fw-600 text-white text-decoration-none"
                                        >Read more</a
                                        >
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
                ><img src="{{asset('publicPages/images/Arrow_left.svg')}}" alt="arrow img left"
                    /></a>
                <a class="next_btn"
                ><img
                        src="{{asset('publicPages/images/Arrow_right.svg')}}"
                        alt="arrow img right"
                    /></a>
           </div> 
        </div>
   
        <div class="row bg-light">
            <div class="col-12 bg-primary p-md-5 py-5 px-1">
                
                <h3 class="fw-bold fs-2 text-white">Industry Updates</h3>
            </div>
             
            <div class="col-12">
               
                <div class="row pb-5">
                 @foreach  ($updates as $update)   
                    <div class="col-lg-6">
                       
                        <div
                            class="card bg-dark text-white mx-md-5 mx-1 mt-5 position-relative overflow-hidden"
                            style="
                    border: 5px solid hsla(355, 84%, 41%, 0.8);
                    height: 389px;
                  "
                        >
                         
                            <img
                                src="{{asset('publicPages/images/featureArticles4.jpg')}}"
                                class="card-img image-center"
                                alt="..."
                            />
                            
                            <div
                                class="gradient position-absolute start-0 top-0"
                                style="width: 100%; height: 100%"
                            ></div>
                            {{-- @foreach ($updates as $update) --}}
                            <div class="card-img-overlay overflow-auto" style="top: 46%">   
                                <h5 class="card-title fw-bold fs-5 text-border">
                                    HRs Magazine Industry Updates
                                </h5>
                                <p class="card-text fw-600 fs-6 text-border">
                                    
                                    {{ \Carbon\Carbon::parse($update->created_at)->format('l M d Y') }}
                                </p>
                                <p class="card-text fs-6 fw-600 text-border">
                                    {{Str::limit($update->content, 232)}}
                                    <a
                                        href="{{ route('articleSingle', ['category' => $update->articleCategory->slug, 'article' => $update->slug]) }}"
                                        class="fw-bold text-decoration-none text-white"
                                    >Read more</a
                                    >
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
