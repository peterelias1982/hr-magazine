@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <!-- start of content -->
    <div class="bg-light py-5 mb-5">
        <div class="container-fluid">
            <h2 class="ps-4 fw-bold">HRs Workplace Culture and Programmes</h2>
            <!-- video -->
            <div class="row gy-0 pt-4">
                <div class="col">
                    <div class="card bg-light text-white mx-md-3 mx-1 border-light">
                        <div class="ratio ratio-16x9">
                            <!-- Default Image -->
                            <img
                                src="{{asset('publicPages/images/workplaceCulture-wellBeing-video.svg')}}"
                                alt="Default Video Image"
                            />
                            <div
                                class="gradient position-absolute start-0 top-0"
                                style="width: 100%; height: 100%"
                            ></div>
                        </div>

                        <!-- <div
                            class="gradient position-absolute start-0 top-0 w-100 h-100"
                              ></div>-->
                        <div class="card-img-overlay overflow-auto responsive-card">
                            <h5 class="card-title fs-card-xl">HRs Workplace Culture</h5>
                            @foreach ($latestWorkplaceCultures as $latestWorkplaceCulture)
                                     
                            <p class="fw-semibold fs-card-l">{{ \Carbon\Carbon::parse($latestWorkplaceCulture->created_at)->format('l M d Y') }}</p>
                           
                            {{-- <p class="fw-semibold fs-card-md">{{ $latestWorkplaceCulture->author_id == $author->id }}</p> --}}
                            <p class="fw-semibold fs-card-md">{{ $latestWorkplaceCulture->author->userAuthor->firstName}} {{ $latestWorkplaceCulture->author->userAuthor->secondName}}</p>
                        
                            <p class="fs-card-sm open-font fw-semibold">
                                {{Str::limit($latestWorkplaceCulture->content, 281)}}<a
                                    href="#"
                                    class="fw-bold text-decoration-none text-white"
                                >Read more</a
                                > @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end video -->
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
                            <!-- item 1 -->
                            
                            <div class="carousel-item active" data-bs-interval="5000">
                                <!-- text -->
                                
                                <h2 class="pb-4">Workplace Culture</h2>
                                <!-- slide image -->
                                @foreach ($workplaceCultures as $workplaceCulture)
                                <div
                                    class="row pb-4 carousel-img position-relative overflow-hidden"
                                    style="height: 690px"
                                >
                                
                                    <img
                                        src="{{asset('publicPages/images/workplaceCulture-wellBeing-slide-1.png')}}"
                                        class="d-block image-center"
                                        alt="slide-img"
                                    />@endforeach
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
                                   {{-- @endforeach  --}}
                                </div>
                                
                                <!-- team info -->
@foreach ($workplaceCultures as $workplaceCulture)
                                <div class="row justify-content-center py-3">
                                    
                                    <div class="col-xl-2 col-md-3  d-flex">
                                        <div class="rounded-circle-container">
                                           
                                            <img
                                                src="{{asset('publicPages/images/workplaceCulture-wellBeing-profile1.png')}}"
                                                class="img-fluid"
                                                alt="Profile-img"
                                            />
                                            
                                        </div>
                                    </div>
                                    
                                    <div
                                        class="col-xl-10 col-md-9  d-flex flex-column"
                                    >
                                    
                                        
                                    
                                        <h2 class="fw-bolder">{{ $workplaceCulture->title }}</h2>
                                        <h3 class="fw-bold">{{ \Carbon\Carbon::parse($workplaceCulture->created_at)->format('l M d Y') }}</h3>
                                        <h4 class="fw-bold">{{ $workplaceCulture->author->userAuthor->firstName}} {{ $workplaceCulture->author->userAuthor->secondName}}</h4>
                                        <p class="fs-4 fw-semibold">
                                            {{Str::limit($workplaceCulture->content, 281)}}
                                            <a
                                                href="#"
                                                class="text-dark text-decoration-none fw-bold readMoreLink"
                                            >
                                                Read more</a
                                            >
                                            
                                        </p>
                                    </div>
                                   
                                    
                                </div>
   
                                <!-- line -->
                                <div class="row justify-content-center">
                                   
                                    <div class="col-9 border-1 border-dark"></div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                     
                </div>
                @endforeach
                <!-- end carousel 1-->
            </div>
            <!-- end section 1 Workplace Culture-->

            <!-- section 2 Diversity, Equity, and Inclusion (DEI)-->
            
            <div class="row gx-md-5 gx-0 m-auto py-5">
                <!-- carousel 2-->

                <div class="col">
                    
                    <div
                        id="carouselDEI"
                        class="carousel slide custom-carousel"
                        data-bs-ride="carousel"
                    >
                   
                        <div class="carousel-inner">
                            
                            <!-- item 1 -->
                            {{-- @foreach ($hrDiversities as $hrDiversity) --}}
                            <div class="carousel-item active" data-bs-interval="5000">
                                
                                <!-- text -->
                                <h2 class="pb-4">Diversity, Equity, and Inclusion (DEI)</h2>
                                <!-- slide image -->
                                @foreach ($hrDiversities as $hrDiversitie) 
                                <div
                                    class="row pb-4 carousel-img position-relative overflow-hidden"
                                    style="height: 690px"
                                >
                                    <img
                                        src="{{asset('publicPages/images/workplaceCulture-wellBeing-slide-3.png')}}"
                                        class="d-block image-center"
                                        alt="slide-img1"
                                    />
                                    @endforeach
                                    <button
                                        class="carousel-control-prev custom-carousel-prev"
                                        type="button"
                                        data-bs-target="#carouselDEI"
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
                                        data-bs-target="#carouselDEI"
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
                                @foreach ($hrDiversities as $hrDiversitie )
                                    
                                
                                <div class="row justify-content-center py-3">
                                    <div class="col-xl-2 col-md-3  d-flex">
                                        <div class="rounded-circle-container">
                                            <img
                                                src="{{asset('publicPages/images/workplaceCulture-wellBeing-profile3.jpg')}}"
                                                class="img-fluid"
                                                alt="Profile-img1"
                                            />
                                        </div>
                                    </div>

                                    <div
                                        class="col-xl-10 col-md-9  d-flex flex-column"
                                    >
                                        <h2 class="fw-bolder">
                                            {{ $hrDiversity -> title }}
                                        </h2>
                                        <h3 class="fw-bold">Thursday Dec 12 2023</h3>
                                        <h4 class="fw-bold">Nadia S. El-Hawrani</h4>
                                        <p class="fs-4 fw-semibold">
                                            Lorem ipsum dolor sit amet consectetur. Pellentesque
                                            faucibus mi feugiat tristique purus penatibus mauris
                                            nam libero. Non aliquam varius at amet lorem lobortis
                                            netus vulputate. Semper purus turpis vitae nunc urna
                                            sodales mauris. Vulputate sit est pharetra velit
                                            eget.....
                                            <a
                                                href="#"
                                                class="text-dark text-decoration-none fw-bold readMoreLink"
                                            >
                                                Read more</a
                                            >
                                        </p>
                                        
                                    </div>
                                    
                                </div>
                                @endforeach 
                                <!-- line -->
                                <div class="row justify-content-center">
                                    <div class="col-9 border-1 border-dark"></div>

                                </div>
                                
                            </div>
                            

                            </div>
                            
                        </div>
                       
                    </div>
                    
                </div>
                
                <!-- end carousel 2-->
            </div>
            <!-- end section 2 Diversity, Equity, and Inclusion (DEI)-->

            <!-- section 3 Wellness Programs-->
            <div class="row gx-md-5 gx-0 m-auto py-5">
                <!-- carousel 3-->
                <div class="col">
                    <div
                        id="carouselWellnessPrograms"
                        class="carousel slide custom-carousel"
                        data-bs-ride="carousel"
                    >
                        <div class="carousel-inner">
                            <!-- item 1 -->
                            <div class="carousel-item active" data-bs-interval="5000">
                                <!-- text -->
                                <h2 class="pb-4">HRs Wellness Programs</h2>
                                <!-- slide image -->
                                <div
                                    class="row pb-4 carousel-img position-relative overflow-hidden"
                                    style="height: 690px"
                                >
                                    <img
                                        src="{{asset('publicPages/images/workplaceCulture-wellBeing-slide-2.jpg')}}"
                                        class="d-block image-center"
                                        alt="slide-img1"
                                    />
                                    <button
                                        class="carousel-control-prev custom-carousel-prev"
                                        type="button"
                                        data-bs-target="#carouselWellnessPrograms"
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
                                        data-bs-target="#carouselWellnessPrograms"
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
                                                src="{{asset('publicPages/images/workplaceCulture-wellBeing-profile2.jpg')}}"
                                                class="img-fluid"
                                                alt="Profile-img1"
                                            />
                                        </div>
                                    </div>

                                    <div
                                        class="col-xl-10 col-md-9  d-flex flex-column"
                                    >
                                        <h2 class="fw-bolder">HRs Wellness Programs</h2>
                                        <h3 class="fw-bold">Thursday Dec 12 2023</h3>
                                        <h4 class="fw-bold">Amged S. El-Hawrani</h4>
                                        <p class="fs-4 fw-semibold">
                                            Lorem ipsum dolor sit amet consectetur. Pellentesque
                                            faucibus mi feugiat tristique purus penatibus mauris
                                            nam libero. Non aliquam varius at amet lorem lobortis
                                            netus vulputate. Semper purus turpis vitae nunc urna
                                            sodales mauris. Vulputate sit est pharetra velit
                                            eget.....
                                            <a
                                                href="#"
                                                class="text-dark text-decoration-none fw-bold readMoreLink"
                                            >
                                                Read more</a
                                            >
                                        </p>
                                    </div>
                                </div>
                                <!-- line -->
                                <div class="row justify-content-center">
                                    <div class="col-9 border-1 border-dark"></div>
                                </div>
                            </div>
                            
                            
                            <!-- item 2 -->
                            <div class="carousel-item" data-bs-interval="3000">
                                <!-- text -->
                                <h2 class="pb-4">Wellness Programs</h2>
                                <!-- slide image -->
                                <div
                                    class="row pb-4 carousel-img position-relative overflow-hidden"
                                    style="height: 690px"
                                >
                                    <img
                                        src="{{asset('publicPages/images/workplaceCulture-wellBeing-slide-3.png')}}"
                                        class="d-block image-center"
                                        alt="slide-img2"
                                    />
                                    <button
                                        class="carousel-control-prev custom-carousel-prev"
                                        type="button"
                                        data-bs-target="#carouselWellnessPrograms"
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
                                        data-bs-target="#carouselWellnessPrograms"
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
                                                src="{{asset('publicPages/images/workplaceCulture-wellBeing-profile3.jpg')}}"
                                                class="img-fluid"
                                                alt="Profile-img2"
                                            />
                                        </div>
                                    </div>

                                    <div
                                        class="col-xl-10 col-md-9  d-flex flex-column"
                                    >
                                        <h2 class="fw-bolder">HRs Wellness Programs</h2>
                                        <h3 class="fw-bold">Thursday Dec 12 2023</h3>
                                        <h4 class="fw-bold">Nadia S. El-Hawrani</h4>
                                        <p class="fs-4 fw-semibold">
                                            Lorem ipsum dolor sit amet consectetur. Pellentesque
                                            faucibus mi feugiat tristique purus penatibus mauris
                                            nam libero. Non aliquam varius at amet lorem lobortis
                                            netus vulputate. Semper purus turpis vitae nunc urna
                                            sodales mauris. Vulputate sit est pharetra velit
                                            eget.....
                                            <a
                                                href="#"
                                                class="text-dark text-decoration-none fw-bold readMoreLink"
                                            >
                                                Read more</a
                                            >
                                        </p>
                                    </div>
                                </div>
                                <!-- line -->
                                <div class="row justify-content-center">
                                    <div class="col-9 border-1 border-dark"></div>
                                </div>
                            </div>
                            <!-- item 3 -->
                            <div class="carousel-item" data-bs-interval="7000">
                                <!-- text -->
                                <h2 class="pb-4">Wellness Programs</h2>
                                <!-- slide image -->
                                <div
                                    class="row pb-4 carousel-img position-relative overflow-hidden"
                                    style="height: 690px"
                                >
                                    <img
                                        src="{{asset('publicPages/images/workplaceCulture-wellBeing-slide-4.jpg')}}"
                                        class="d-block image-center"
                                        alt="slide-img3"
                                    />
                                    <button
                                        class="carousel-control-prev custom-carousel-prev"
                                        type="button"
                                        data-bs-target="#carouselWellnessPrograms"
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
                                        data-bs-target="#carouselWellnessPrograms"
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
                                                src="{{asset('publicPages/images/workplaceCulture-wellBeing-profile4.jpg')}}"
                                                class="img-fluid"
                                                alt="Profile-img3"
                                            />
                                        </div>
                                    </div>

                                    <div
                                        class="col-xl-10 col-md-9  d-flex flex-column"
                                    >
                                        <h2 class="fw-bolder">HRs Wellness Programs</h2>
                                        <h3 class="fw-bold">Thursday Dec 12 2023</h3>
                                        <h4 class="fw-bold">Nadia S. El-Hawrani</h4>
                                        <p class="fs-4 fw-semibold">
                                            Lorem ipsum dolor sit amet consectetur. Pellentesque
                                            faucibus mi feugiat tristique purus penatibus mauris
                                            nam libero. Non aliquam varius at amet lorem lobortis
                                            netus vulputate. Semper purus turpis vitae nunc urna
                                            sodales mauris. Vulputate sit est pharetra velit
                                            eget.....
                                            <a
                                                href="#"
                                                class="text-dark text-decoration-none fw-bold readMoreLink"
                                            >
                                                Read more</a
                                            >
                                        </p>
                                    </div>
                                </div>
                                <!-- line -->
                                <div class="row justify-content-center">
                                    <div class="col-9 border-1 border-dark"></div>
                                </div>
                            </div>
                            <!-- item 4 -->
                            <div class="carousel-item" data-bs-interval="9000">
                                <!-- text -->
                                <h2 class="pb-4">Wellness Programs</h2>
                                <!-- slide image -->
                                <div
                                    class="row pb-4 carousel-img position-relative overflow-hidden"
                                    style="height: 690px"
                                >
                                    <img
                                        src="{{asset('publicPages/images/workplaceCulture-wellBeing-slide-1.png')}}"
                                        class="d-block image-center"
                                        alt="slide-img4"
                                    />
                                    <button
                                        class="carousel-control-prev custom-carousel-prev"
                                        type="button"
                                        data-bs-target="#carouselWellnessPrograms"
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
                                        data-bs-target="#carouselWellnessPrograms"
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
                                                src="{{asset('publicPages/images/workplaceCulture-wellBeing-profile1.png')}}"
                                                class="img-fluid"
                                                alt="Profile-img4"
                                            />
                                        </div>
                                    </div>

                                    <div
                                        class="col-xl-10 col-md-9  d-flex flex-column"
                                    >
                                        <h2 class="fw-bolder">HRs Wellness Programs</h2>
                                        <h3 class="fw-bold">Thursday Dec 12 2023</h3>
                                        <h4 class="fw-bold">Amged S. El-Hawrani</h4>
                                        <p class="fs-4 fw-semibold">
                                            Lorem ipsum dolor sit amet consectetur. Pellentesque
                                            faucibus mi feugiat tristique purus penatibus mauris
                                            nam libero. Non aliquam varius at amet lorem lobortis
                                            netus vulputate. Semper purus turpis vitae nunc urna
                                            sodales mauris. Vulputate sit est pharetra velit
                                            eget.....
                                            <a
                                                href="#"
                                                class="text-dark text-decoration-none fw-bold readMoreLink"
                                            >
                                                Read more</a
                                            >
                                        </p>
                                    </div>
                                </div>
                                <!-- line -->
                                <div class="row justify-content-center">
                                    <div class="col-9 border-1 border-dark"></div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- end carousel 3 -->
            </div>
            <!-- end section 3 Wellness Programs -->

            <!-- section 4 Mental Health in the Workplace-->
            <div class="row gx-md-5 gx-0 m-auto py-5">
                <!-- carousel 4-->
                
                <div class="col">
                    
                    <div
                        id="carouselMentalHealth"
                        class="carousel slide custom-carousel"
                        data-bs-ride="carousel"
                    >
                   
                        @foreach ($mentalHealthInTheWorkplaces as $mentalHealthInTheWorkplace )
                    
                        <div class="carousel-inner">
                           
                           <!-- item 1 -->

 
                            <div class="carousel-item active" data-bs-interval="5000">
                                <!-- text -->
                                <h2 class="pb-4">Mental Health in the Workplace</h2>
                                <!-- slide image -->
                               
                                <div
                                    class="row pb-4 carousel-img position-relative overflow-hidden"
                                    style="height: 690px"
                                > 
                                    <img
                                        src="{{asset('publicPages/images/workplaceCulture-wellBeing-slide-5.jpg')}}"
                                        class="d-block image-center"
                                        alt="slide-img1"
                                    />
                                    {{-- @endforeach --}}
                                    <button
                                        class="carousel-control-prev custom-carousel-prev"
                                        type="button"
                                        data-bs-target="#carouselMentalHealth"
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
                                        data-bs-target="#carouselMentalHealth"
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
                              {{-- @foreach ($mentalHealthInTheWorkplaces as $mentalHealthInTheWorkplace)   --}}
                                <div class="row justify-content-center py-3">
                                     
                                    <div class="col-xl-2 col-md-3  d-flex">

                                        <div class="rounded-circle-container">
                                            
                                               
                                           
                                            <img
                                                src="{{asset('publicPages/images/workplaceCulture-wellBeing-profile4.jpg')}}"
                                                class="img-fluid"
                                                alt="Profile-img1"
                                            />
                                        </div>
                                    </div>

                                    <div
                                        class="col-xl-10 col-md-9  d-flex flex-column"
                                    >
                                        <h2 class="fw-bolder">
                                            {{ $mentalHealthInTheWorkplace->title }}
                                        </h2>
                                        <h3 class="fw-bold">{{ \Carbon\Carbon::parse($mentalHealthInTheWorkplace->created_at)->format('l M d Y') }}</h3>
                                        {{-- <h4 class="fw-bold">{{ $mentalHealthInTheWorkplace->author->userAuthor->firstName }} {{ $mentalHealthInTheWorkplace->author->userAuthor->secondName }}</h4> --}}
                                        <p class="fs-4 fw-semibold">
                                            {{Str::limit($mentalHealthInTheWorkplace->content, 266)}}
                                            <a
                                                href="#"
                                                class="text-dark text-decoration-none fw-bold readMoreLink"
                                            >
                                                Read more</a
                                            >
                                        </p>
                                      
                                    </div>
                                    
                                </div>
                                 
                                <!-- line -->
                                <div class="row justify-content-center">
                                    <div class="col-9 border-1 border-dark"></div>
                                </div>
                               
                            </div>
                           
                              
                        </div>
                       
                    </div>
                    
                </div>
                 @endforeach 
                <!-- end carousel 4-->
            </div>
            
            <!-- end section 4 Mental Health in the Workplace-->
        </div>
        
    </div>
    
@endsection
