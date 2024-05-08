<div class="row bg-light">
    <h3 class="fw-bold fs-2 pt-5 ps-5">Upcomming Events</h3>
    <div
        class="row mw-100 col-lg-8 col-11 m-auto justify-content-center mt-5 align-items-center mb-5" >
        <!-- event card -->
        <article
        class="bg-white border border-2 border-top-0 border-secondary rounded-4 mw-100 px-2 px-md-3 ps-md-4 ps-lg-5 shadow-effect slide_custom"
    >
        <div
            class="row justify-content-between pt-5 mb-3 align-items-center mw-100 mx-auto"
        >
            <h3 class="fs-5 fw-bold col-auto">{{isset($events[0])? $events[0]->title:''}}</h3>
        </div>
        <div class="row ps-4">
      <span class="row align-items-center mw-100 mb-4">
        <div class="col-1 col-md-auto px-0">
          <img
              class="img-fluid"
              src="{{asset('publicPages/images/Calender.svg')}}"
              alt="Calender icon"
          />
        </div>
        <span class="fw-bold col-9"
        >{{isset($events[0])? date_format(date_create($events[0]->fromDate),'M d Y') : ''}} </span
        >
      </span>
            <span class="row align-items-center mw-100 mb-4">
        <div class="col-1 col-md-auto px-0">
          <img
              class="img-fluid"
              src="{{asset('publicPages/images/place mark.svg')}}"
              alt="place mark icon"
          />
        </div>
        <span class="fw-bold col-9" class="fw-bold"
        >@isset($events[0]){{$events[0]->streetNo}},{{$events[0]->streetName}},{{$events[0]->city}}, {{$events[0]->country}}@endisset</span
        >
      </span>
        </div>
        <p class="col-lg-12 px-1 fw-bold">
            @isset($events[0])
            {{Str::limit($events[0]->description, 300)}}
            @endisset
        </p>
        <div class="event-btn d-flex justify-content-end mb-4">
            @isset($events[0])
            <a href="{{route('event.singleEvent',[$events[0]->slug])}}"
                class="d-inline-block bg-dark text-decoration-none text-light border rounded-5 px-3 py-2"
            >Learn More</a>
            @endisset
        </div>
    </article>
        <!-- end of event card -->
    </div>
    <div
        id="event-slider"
        class="row mw-100 m-auto justify-content-around mt-5 align-items-center pb-5"
    >
        <div
            class="row slide_group overflow-hidden g-0 mx-md-5"
            id="slideContainer"
        >
            <div class="d-flex flex-wrap-nowrap slideWrapper">
              @for ( $i = 1; $i < count($events); $i++)
              <div class="sliderWrapper px-md-5 col-12 col-lg-6">
                <article
                    class="bg-white border border-2 border-top-0 border-secondary rounded-4 mw-100 px-2 px-md-3 ps-md-4 ps-lg-5 shadow-effect slide_custom"
                >
                    <div
                        class="row justify-content-between pt-5 mb-3 align-items-center mw-100 mx-auto"
                    >
                        <h3 class="fs-5 fw-bold col-auto">{{$events[$i]->title}}</h3>
                    </div>
                    <div class="row ps-4">
                  <span class="row align-items-center mw-100 mb-4">
                    <div class="col-1 col-md-auto px-0">
                      <img
                          class="img-fluid"
                          src="{{asset('publicPages/images/Calender.svg')}}"
                          alt="Calender icon"
                      />
                    </div>
                    <span class="fw-bold col-9">{{ date_format(date_create($events[$i]->fromDate),'M d Y')}}</span>
                  </span>
                        <span class="row align-items-center mw-100 mb-4">
                    <div class="col-1 col-md-auto px-0">
                      <img
                          class="img-fluid"
                          src="{{asset('publicPages/images/place mark.svg')}}"
                          alt="place mark icon"
                      />
                    </div>
                    <span class="fw-bold col-9" class="fw-bold"
                    >{{$events[$i]->streetNo}},{{$events[$i]->streetName}},{{$events[$i]->city}}, {{$events[$i]->country}}</span
                    >
                  </span>
                    </div>
                    <p class="col-lg-12 px-1 fw-bold">
                        {{Str::limit($events[$i]->description, 280)}}
                    </p>
                    <div class="event-btn d-flex justify-content-end mb-4">
                        <a href="{{route('event.singleEvent',$events[$i]->slug)}}"
                            class="d-inline-block bg-dark text-decoration-none text-light border rounded-5 px-3 py-2"
                        >Learn More</a
                        >
                    </div>
                </article>
            </div>

              @endfor


            </div>
            <div class="arrow-container d-flex justify-content-between">
                <a class="previous_btn"
                ><img
                        src="{{asset('publicPages/images/Arrow_left.svg')}}"
                        alt="arrow img left"
                    /></a>
                <a class="next_btn"
                ><img
                        src="{{asset('publicPages/images/Arrow_right.svg')}}"
                        alt="arrow img right"
                    /></a>
            </div>
        </div>
    </div>
</div>
