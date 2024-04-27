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
                            <img
                                src="{{asset('publicPages/images/legal-compliance-video.svg')}}"
                                alt="Default Video Image"
                                class="embed-cover"
                            />
                            <!-- Iframe for Video -->
                            <iframe
                                src="https://www.youtube.com/embed/7S0Lj4scspU?list=PL7h7VRXAvXNpehO1CPzEPdNEJNqItu6HM&enablejsapi=1"
                                class="youtube-video embed-cover"
                                style="display: none"
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
                                onclick="playVideo()"
                            >
                                <img
                                    src="{{asset('publicPages/images/video-play-btn.svg')}}"
                                    alt="Play Video"
                                    class="embed-cover-btn"
                                />
                            </button>
                        </div>

                        <!-- <div
                        class="gradient position-absolute start-0 top-0 w-100 h-100"
                          ></div>-->
                        <div class="card-img-overlay overflow-auto responsive-card">
                            <h5 class="card-title fs-card-xl">
                                HRs Legal and compliance
                            </h5>
                            <p class="fw-semibold fs-card-l">Thursday Dec 12 2023</p>
                            <p class="fw-semibold fs-card-md">Nadia S. El-Hawrani</p>
                            <p class="fs-card-sm open-font fw-semibold">
                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                faucibus mi feugiat tristique purus penatibus mauris nam
                                libero. Non aliquam varius at amet lorem lobortis netus
                                vulputate. Semper purus turpis vitae nunc urna sodales
                                mauris. Vulputate sit est pharetra velit eget.....<a
                                    href="#"
                                    class="fw-bold text-decoration-none text-white"
                                >Read more</a
                                >
                            </p>
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
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 border-0">
                        <img
                            src="{{asset('publicPages/images/legal-compliance-img1.png')}}"
                            class="card-img-top rounded-top img-fluid"
                            alt="legal-compliance-img1"
                            style="height: 390px"
                        />
                        <div class="card-body bg-dark text-white pt-4">
                            <h4 class="card-title">HRs Legal Industry Updates</h4>
                            <h5>Thursday Dec 12 2023</h5>
                            <h6>Amged S. El-Hawrani</h6>

                            <p class="card-text fw-semibold">
                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                faucibus mi feugiat tristique purus penatibus mauris nam
                                libero. Non aliquam varius at amet lorem lobortis netus
                                vulputate. Semper purus turpis vitae nunc urna sodales
                                mauris....
                                <a
                                    href="#"
                                    class="text-white text-decoration-none fw-bold readMoreLink"
                                >
                                    Read more</a
                                >
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 border-0">
                        <img
                            src="{{asset('publicPages/images/legal-compliance-img2.png')}}"
                            class="card-img-top rounded-top img-fluid"
                            style="height: 390px"
                            alt="legal-compliance-img2"
                        />
                        <div class="card-body bg-dark text-white pt-4">
                            <h4 class="card-title">HRs Legal Industry Updates</h4>
                            <h5>Thursday Dec 12 2023</h5>
                            <h6>Amged S. El-Hawrani</h6>

                            <p class="card-text fw-semibold">
                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                faucibus mi feugiat tristique purus penatibus mauris nam
                                libero. Non aliquam varius at amet lorem lobortis netus
                                vulputate. Semper purus turpis vitae nunc urna sodales
                                mauris....
                                <a
                                    href="#"
                                    class="text-white text-decoration-none fw-bold readMoreLink"
                                >
                                    Read more</a
                                >
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 border-0">
                        <img
                            src="{{asset('publicPages/images/legal-compliance-img3.png')}}"
                            class="card-img-top rounded-top img-fluid"
                            style="height: 390px"
                            alt="legal-compliance-img3"
                        />
                        <div class="card-body bg-dark text-white pt-4">
                            <h4 class="card-title">HRs Legal Industry Updates</h4>
                            <h5>Thursday Dec 12 2023</h5>
                            <h6>Amged S. El-Hawrani</h6>

                            <p class="card-text fw-semibold">
                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                faucibus mi feugiat tristique purus penatibus mauris nam
                                libero. Non aliquam varius at amet lorem lobortis netus
                                vulputate. Semper purus turpis vitae nunc urna sodales
                                mauris....
                                <a
                                    href="#"
                                    class="text-white text-decoration-none fw-bold readMoreLink"
                                >
                                    Read more</a
                                >
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 border-0">
                        <img
                            src="{{asset('publicPages/images/legal-compliance-img4.png')}}"
                            class="card-img-top rounded-top img-fluid"
                            style="height: 390px"
                            alt="legal-compliance-img4"
                        />
                        <div class="card-body bg-dark text-white pt-4">
                            <h4 class="card-title">HRs Legal Industry Updates</h4>
                            <h5>Thursday Dec 12 2023</h5>
                            <h6>Amged S. El-Hawrani</h6>

                            <p class="card-text fw-semibold">
                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                faucibus mi feugiat tristique purus penatibus mauris nam
                                libero. Non aliquam varius at amet lorem lobortis netus
                                vulputate. Semper purus turpis vitae nunc urna sodales
                                mauris....
                                <a
                                    href="#"
                                    class="text-white text-decoration-none fw-bold readMoreLink"
                                >
                                    Read more</a
                                >
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Card 5 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 border-0">
                        <img
                            src="{{asset('publicPages/images/legal-compliance-img5.png')}}"
                            class="card-img-top rounded-top img-fluid"
                            style="height: 390px"
                            alt="legal-compliance-img5"
                        />
                        <div class="card-body bg-dark text-white pt-4">
                            <h4 class="card-title">HRs Legal Industry Updates</h4>
                            <h5>Thursday Dec 12 2023</h5>
                            <h6>Amged S. El-Hawrani</h6>

                            <p class="card-text fw-semibold">
                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                faucibus mi feugiat tristique purus penatibus mauris nam
                                libero. Non aliquam varius at amet lorem lobortis netus
                                vulputate. Semper purus turpis vitae nunc urna sodales
                                mauris....
                                <a
                                    href="#"
                                    class="text-white text-decoration-none fw-bold readMoreLink"
                                >
                                    Read more</a
                                >
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Card 6 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 border-0">
                        <img
                            src="{{asset('publicPages/images/legal-compliance-img6.png')}}"
                            class="card-img-top rounded-top img-fluid"
                            style="height: 390px"
                            alt="legal-compliance-img6"
                        />
                        <div class="card-body bg-dark text-white pt-4">
                            <h4 class="card-title">HRs Legal Industry Updates</h4>
                            <h5>Thursday Dec 12 2023</h5>
                            <h6>Amged S. El-Hawrani</h6>

                            <p class="card-text fw-semibold">
                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                faucibus mi feugiat tristique purus penatibus mauris nam
                                libero. Non aliquam varius at amet lorem lobortis netus
                                vulputate. Semper purus turpis vitae nunc urna sodales
                                mauris....
                                <a
                                    href="#"
                                    class="text-white text-decoration-none fw-bold readMoreLink"
                                >
                                    Read more</a
                                >
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Card 7 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 border-0">
                        <img
                            src="{{asset('publicPages/images/legal-compliance-img7.png')}}"
                            class="card-img-top rounded-top img-fluid"
                            style="height: 390px"
                            alt="legal-compliance-img7"
                        />
                        <div class="card-body bg-dark text-white pt-4">
                            <h4 class="card-title">HRs Legal Industry Updates</h4>
                            <h5>Thursday Dec 12 2023</h5>
                            <h6>Amged S. El-Hawrani</h6>

                            <p class="card-text fw-semibold">
                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                faucibus mi feugiat tristique purus penatibus mauris nam
                                libero. Non aliquam varius at amet lorem lobortis netus
                                vulputate. Semper purus turpis vitae nunc urna sodales
                                mauris....
                                <a
                                    href="#"
                                    class="text-white text-decoration-none fw-bold readMoreLink"
                                >
                                    Read more</a
                                >
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Card 8 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 border-0">
                        <img
                            src="{{asset('publicPages/images/legal-compliance-img8.png')}}"
                            class="card-img-top rounded-top img-fluid"
                            style="height: 390px"
                            alt="legal-compliance-img8"
                        />
                        <div class="card-body bg-dark text-white pt-4">
                            <h4 class="card-title">HRs Legal Industry Updates</h4>
                            <h5>Thursday Dec 12 2023</h5>
                            <h6>Amged S. El-Hawrani</h6>

                            <p class="card-text fw-semibold">
                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                faucibus mi feugiat tristique purus penatibus mauris nam
                                libero. Non aliquam varius at amet lorem lobortis netus
                                vulputate. Semper purus turpis vitae nunc urna sodales
                                mauris....
                                <a
                                    href="#"
                                    class="text-white text-decoration-none fw-bold readMoreLink"
                                >
                                    Read more</a
                                >
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Card 9 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 border-0">
                        <img
                            src="{{asset('publicPages/images/legal-compliance-img9.png')}}"
                            class="card-img-top rounded-top img-fluid"
                            style="height: 390px"
                            alt="legal-compliance-img9"
                        />
                        <div class="card-body bg-dark text-white pt-4">
                            <h4 class="card-title">HRs Legal Industry Updates</h4>
                            <h5>Thursday Dec 12 2023</h5>
                            <h6>Amged S. El-Hawrani</h6>

                            <p class="card-text fw-semibold">
                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                faucibus mi feugiat tristique purus penatibus mauris nam
                                libero. Non aliquam varius at amet lorem lobortis netus
                                vulputate. Semper purus turpis vitae nunc urna sodales
                                mauris....
                                <a
                                    href="#"
                                    class="text-white text-decoration-none fw-bold readMoreLink"
                                >
                                    Read more</a
                                >
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 10 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 border-0">
                        <img
                            src="{{asset('publicPages/images/legal-compliance-img10.jpg')}}"
                            class="card-img-top rounded-top img-fluid"
                            alt="legal-compliance-img10"
                            style="height: 390px"
                        />
                        <div class="card-body bg-dark text-white pt-4">
                            <h4 class="card-title">HRs Legal Industry Updates</h4>
                            <h5>Thursday Dec 12 2023</h5>
                            <h6>Amged S. El-Hawrani</h6>

                            <p class="card-text fw-semibold">
                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                faucibus mi feugiat tristique purus penatibus mauris nam
                                libero. Non aliquam varius at amet lorem lobortis netus
                                vulputate. Semper purus turpis vitae nunc urna sodales
                                mauris....
                                <a
                                    href="#"
                                    class="text-white text-decoration-none fw-bold readMoreLink"
                                >
                                    Read more</a
                                >
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 11 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 border-0">
                        <img
                            src="{{asset('publicPages/images/legal-compliance-img11.jpg')}}"
                            class="card-img-top rounded-top img-fluid"
                            alt="legal-compliance-img11"
                            style="height: 390px"
                        />
                        <div class="card-body bg-dark text-white pt-4">
                            <h4 class="card-title">HRs Legal Industry Updates</h4>
                            <h5>Thursday Dec 12 2023</h5>
                            <h6>Amged S. El-Hawrani</h6>

                            <p class="card-text fw-semibold">
                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                faucibus mi feugiat tristique purus penatibus mauris nam
                                libero. Non aliquam varius at amet lorem lobortis netus
                                vulputate. Semper purus turpis vitae nunc urna sodales
                                mauris....
                                <a
                                    href="#"
                                    class="text-white text-decoration-none fw-bold readMoreLink"
                                >
                                    Read more</a
                                >
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 12 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 border-0">
                        <img
                            src="{{asset('publicPages/images/legal-compliance-img12.jpg')}}"
                            class="card-img-top rounded-top img-fluid"
                            alt="legal-compliance-img12"
                            style="height: 390px"
                        />
                        <div class="card-body bg-dark text-white pt-4">
                            <h4 class="card-title">HRs Legal Industry Updates</h4>
                            <h5>Thursday Dec 12 2023</h5>
                            <h6>Amged S. El-Hawrani</h6>

                            <p class="card-text fw-semibold">
                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                faucibus mi feugiat tristique purus penatibus mauris nam
                                libero. Non aliquam varius at amet lorem lobortis netus
                                vulputate. Semper purus turpis vitae nunc urna sodales
                                mauris....
                                <a
                                    href="#"
                                    class="text-white text-decoration-none fw-bold readMoreLink"
                                >
                                    Read more</a
                                >
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end bg primary-->
        </div>
    </div>
@endsection
