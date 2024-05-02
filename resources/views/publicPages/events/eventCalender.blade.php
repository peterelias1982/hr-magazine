@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <div class="container-fluid mt-5">
        <div class="row bg-light">
            <!-- Left Column: Title and Calendar -->
            <div class="col-lg-6 col-md-8 col-sm-12">
                <h2 class="my-5 fw-bold text-left text-black">Events Calendar</h2>
                <!-- Calendar section -->
                <div class="rounded-4 bg-dark p-5" style="border: 6px solid grey">
                    <!-- Month Navigation -->
                    <div class="row text-white mb-5">
                        <div class="col-8">
                            <span id="month" class="fw-bold fs-3"></span>
                            <span id="year" class="fw-bold fs-3 mx-2"></span>
                        </div>
                        <div class="col-4 text-end">
                            <button
                                type="button"
                                id="left"
                                class="btn btn-link text-white text-decoration-none"
                            >
                                &#10094;
                            </button>
                            <button
                                type="button"
                                id="right"
                                class="btn btn-link text-white text-decoration-none"
                            >
                                &#10095;
                            </button>
                        </div>
                    </div>

                    <!-- Calendar Table -->
                    <div class="table-responsive">
                        <table class="table text-center table-dark table-borderless">
                            <thead>
                            <tr class="fs-5">
                                <th>Sun</th>
                                <th>Mon</th>
                                <th>Tue</th>
                                <th>Wed</th>
                                <th>Thu</th>
                                <th>Fri</th>
                                <th>Sat</th>
                            </tr>
                            </thead>
                            <tbody id="calendar">
                            <!-- Dynamic day cells with onclick handlers are inserted here by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Right Column: Image -->
            <div class="col-lg-6 col-md-4 col-sm-12 d-sm-none d-md-block">
                <div
                    class="position-relative overflow-hidden"
                    style="height: 780px"
                >
                    <img
                        src="{{asset('publicPages/images/heroeventcalendar-8.jpeg')}}"
                        alt="Event Calendar Image"
                        class="image-center"
                    />
                </div>
            </div>
        </div>
        <!-- Events Display Section -->
        <div class="row mt-3 open-font">
            <div class="col-12 w-100 p-0">
                <h3 class="event-date bg-primary text-white fw-bold fs-2 py-5 px-2">
                    October 8 2024
                </h3>
                <div
                    class="scrollable-card-container bg-light px-5"
                    style="max-height: 1800px !important; overflow-y: auto"
                    id="eventCardContainer"
                >
                    <p class="fw-bold fs-2 mt-2">No Events today</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('publicPagesExtraJS')
    <!-- Script tag for static event data -->
    <script>
        const events = {
         @foreach ( $events_calender as $key=> $events_calender_events)      
             {{(int) date_format(date_create($key)  ,'m')}}:  {
                // October
                {{(int) date_format(date_create($key)  ,'Y')}}: {
                 @foreach ($events_calender_events as $event )
                    {{(int) date_format(date_create($event->fromDate) ,'d')}}: [
                        {
                            eventName: "{{$event->title}} ",
                            eventLocation: "{{$event->streetNo}},{{$event->streetName}},{{$event->city}}, {{$event->country}} ",
                            eventDate: "{{ date_format(date_create($event->fromDate),'d M Y')}} at 1:00 pm",
                            eventContent: `{{$event->description}}`,
                            eventUrl: "{{$event->googleMapLink}}",
                        },
                    ],
                    @endforeach
                },
            }, 
           
         @endforeach
        };
    </script>
    <!-- script for calendar table populating -->
    <script src="{{asset('publicPages/js/events-calendar.js')}}"></script>
@endsection
