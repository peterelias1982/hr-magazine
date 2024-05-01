@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <div class="container-fluid">
        <div class="row bg-light px-md-5 px-1 py-4 mb-3">
            <h3 class="fw-bold fs-2">HRs Event</h3>
            <div
                class="position-relative overflow-hidden mx-auto mb-3"
                style="height: 700px"
            >
                <img
                    src="{{asset('publicPages/images/event.png')}}"
                    class="rounded image-center"
                    alt="..."
                />
            </div>
        </div>
        <div class="row bg-dark mb-3 flex-nowrap overflow-auto mt-0">
            <div class="col-12 col-md-8 py-3 px-md-4 px-1">
                <div class="card mb-3 bg-dark border-0">
                    <div class="row g-0 align-items-center justify-content-start">
                        <div
                            class="col-md-3 col-5 overflow-hidden position-relative rounded-fill"
                            style="aspect-ratio: 1.1"
                        >
                            <div
                                class="rounded-4 mt-4 ms-5"
                                style="
                      background-color: white;
                      display: inline-block;
                      padding: 10%;
                    "
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="100%"
                                    height="100%"
                                    fill="currentColor"
                                    class="bi bi-calendar3"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z"
                                    />
                                    <path
                                        d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"
                                    />
                                </svg>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="card-body text-white ms-5">
                                <h5 class="card-title fw-bold fs-2 mb-4">Event Calendar</h5>
                                <p class="card-text fs-16px">
                                    you can show the Upcoming Events Lorem ipsum dolor sit
                                    amet consectetur. Lacus eu tortor ut elementum in
                                    elementum cras nunc vel. Laoreet blandit leo pulvinar
                                    rhoncus ipsum placerat. Metus congue ac a scelerisque
                                    tellus urna tincidunt.
                                    <a href="#" class="fw-600 text-white text-decoration-none"
                                    >Read more</a
                                    >
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('publicPages.includes.upcomingEvents')
    </div>
@endsection
