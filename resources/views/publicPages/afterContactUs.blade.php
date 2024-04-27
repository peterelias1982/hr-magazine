@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <!-- start of content -->
    <h2
        class="text-center bg-primary text-white py-4 mt-5 mb-0 fs-2 fw-bold mx-0"
    >
        Contact Us
    </h2>
    <div class="container-fluid">
        <div class="row bg-light">
            <div class="row py-5 m-auto px-md-5 px-1">
                <div class="col">
                    <div class="border border-dark border-4 rounded-3">
                        <div id="map" style="height: 699px"></div>
                    </div>
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-12 text-center">
                    <h3 class="text-primary fs-1 fw-bolder pb-2">Thank You</h3>
                    <p class="fs-3 fw-semibold">
                        We have received your request and will be in touch<br />shortly
                    </p>
                </div>
            </div>

            <!-- contact us info -->
            <div class="row g-0 align-items-center text-center flex-column">
                <h3 class="fw-bold">For more information:</h3>
                <div class="col-auto d-flex align-items-start">
                    <img src="{{asset('publicPages/images/location-icon-black.svg')}}" />
                    <p class="fs-3 fw-bold text-primary">
                        Location:
                        <span class="fs-5 fw-normal text-dark"
                        >1, My Address, My Street, New York City, NY, USA</span
                        >
                    </p>
                </div>
                <div class="col-auto d-flex align-items-start">
                    <img src="{{asset('publicPages/images/email-icon-black.svg')}}" />
                    <p class="fs-3 fw-bold text-primary">
                        Email:
                        <span class="fs-5 fw-normal text-dark">contact@domain.com</span>
                    </p>
                </div>
                <div class="col-auto d-flex align-items-start">
                    <img src="{{asset('publicPages/images/phon-icon-black.svg')}}" />
                    <p class="fs-3 fw-bold text-primary">
                        Phone:
                        <span class="fs-5 fw-normal text-dark">+1234567890</span>
                    </p>
                </div>
                <div class="col-auto d-flex flex-column mb-2">
                    <p class="fs-3 fw-bold text-primary text-center">Follow Us</p>
                    <ul class="list-inline d-flex justify-content-center">
                        <li class="list-inline-item">
                            <a href="#" target="_blank" title="facebook">
                                <img src="{{asset('publicPages/images/facebook-colored.svg')}}" />
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" target="_blank" title="twitter">
                                <img src="{{asset('publicPages/images/twitter-colored.svg')}}" />
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" target="_blank" title="youtube">
                                <img src="{{asset('publicPages/images/youtube-colored.svg')}}" />
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" target="_blank" title="instagram">
                                <img src="{{asset('publicPages/images/instagram-colored.svg')}}" />
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" target="_blank" title="linkedin">
                                <img src="{{asset('publicPages/images/linkedin-colored.svg')}}" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end bg light-->
        </div>
    </div>
    <!-- end container-->
@endsection

