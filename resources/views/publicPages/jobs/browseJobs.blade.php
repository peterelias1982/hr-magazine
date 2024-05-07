@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <!-- start of content -->
    <div class="container-fluid">
        <!--the image-->
        <div class="row bg-dark px-md-5 px-1 py-4 mb-3">
            <h3 class="fw-bold fs-2 text-white pb-2 pt-3 text-center">
                HRs Magazine Jobs
            </h3>
            <div class="col">
                <div
                    class="card bg-dark text-white landing-img mx-lg-3 mx-md-3 mx-1"
                    style="height: 695px"
                >
                    <img
                        src="{{asset('publicPages/images/browse-jobs.jpeg')}}"
                        class="card-img rounded-4 image-center"
                        alt="..."
                    />
                </div>
            </div>
        </div>
        <!--single Card-->
        <div
            class="row align-items-center justify-content-center bg-primary mt-4 px-3"
        >
            <div class="m-3 bg-light border-0">
                <div class="row g-0 align-items-center justify-content-center">
                    <nav>
                        <div class="col my-4">
                            <h2 class="fw-bold">
                                Available Jobs
                            </h2>
                        </div>
                    </nav>
                    <!-- navbar -->
                </div>
                <div class="row">
                    <nav
                        class="navbar navbar-expand-md navbar-dark fw-semibold px-2 mb-3 py-2 bg-dark"
                    >
                        <div class="container-fluid">
                            <button
                                class="navbar-toggler text-white"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#browseJobs"
                                aria-controls="browseJobs"
                                aria-expanded="false"
                                aria-label="Toggle navigation"
                            >
                                <span class="navbar-toggler-icon text-white"></span>
                            </button>
                            <div
                                class="collapse navbar-collapse d-lg-flex justify-content-between container-fluid"
                                id="browseJobs"
                            >
                                <div class="row justify-content-between w-100">
                                    <form action="{{route('jobs.browseJobs')}}" method="GET" id="filter">
                                    </form>
                                    <div
                                        class="col-md-5 d-flex align-items-center  bg-white rounded-4 border border-dark mt-2 px-2"
                                    >
                                        <img
                                            src="{{asset('publicPages/images/search-icon.svg')}}"
                                            alt="Search"
                                            class="me-lg-5"
                                            style="max-width: 56px; aspect-ratio: 1"
                                        />
                                        <input
                                            type="text" form="filter" name="search"
                                            class="form-control border-0 fw-bold fs-2 opacity-50 flex-grow-1"
                                            placeholder=" Search..."
                                        />
                                        <button type="button" class="btn p-0" form="filter">
                                            <img
                                                src="{{asset('publicPages/images/close-icon2.svg')}}"
                                                alt="Close"
                                                style="max-width: 40px; aspect-ratio: 1"
                                            />
                                        </button>
                                    </div>

                                    <ul class="col-lg-6 col-xl-4 navbar-nav ps-4 me-0">

                                        <li class="nav-item dropdown me-3">
                                            <a
                                                class="nav-link text-white dropdown-toggle fs-3 fw-bold"
                                                href="#"
                                                id="navbarDropdownBrowseJobsCity"
                                                role="button"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                            >
                                                City
                                            </a>
                                            <ul
                                                class="dropdown-menu dropdown-menu-dark bg-light overflow-auto"
                                                aria-labelledby="navbarDropdownBrowseJobsCity"
                                                style="max-height: 20rem"
                                            >
                                                <li>
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input type="checkbox" class=" form-check-input"
                                                               id="checkbox1" name="optcheckbox[]"
                                                               value="All" form="filter"> All
                                                    </label>
                                                </li>
                                                <li>
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox[]"
                                                            value="Cairo" form="filter"
                                                        />
                                                        Cairo
                                                    </label>
                                                </li>
                                                <li>
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox[]"
                                                            value="Giza"
                                                            form="filter"
                                                        />
                                                        Giza
                                                    </label>
                                                </li>
                                                <li>
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox[]"
                                                            value="Alexandria"
                                                            form="filter"
                                                        />
                                                        Alexandria
                                                    </label>
                                                </li>
                                                <li>
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox[]"
                                                            value="Sadat City"
                                                            form="filter"
                                                        />
                                                        Sadat City
                                                    </label>
                                                </li>
                                                <li>
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox[]"
                                                            value="Aswan"
                                                            form="filter"
                                                        />
                                                        Aswan
                                                    </label>
                                                </li>
                                                <li>
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox[]"
                                                            value="Luxor"
                                                            form="filter"
                                                        />
                                                        Luxor
                                                    </label>
                                                </li>
                                                <li>
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox[]"
                                                            value="Hurghada"
                                                            form="filter"
                                                        />
                                                        Hurghada
                                                    </label>
                                                </li>
                                                <li>
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox[]"
                                                            value="Sharm El Sheikh"
                                                            form="filter"
                                                        />
                                                        Sharm El Sheikh
                                                    </label>
                                                </li>
                                                <li>
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox[]"
                                                            value="Ismailia"
                                                            form="filter"
                                                        />
                                                        Ismailia
                                                    </label>
                                                </li>
                                                <li>
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox[]"
                                                            value="Sohag"
                                                            form="filter"
                                                        />
                                                        Sohag
                                                    </label>
                                                </li>
                                                <li>
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox[]"
                                                            value="6th of October City"
                                                            form="filter"
                                                        />
                                                        6th of October City
                                                    </label>
                                                </li>
                                                <li>
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox[]"
                                                            value="10th of Ramadan City"
                                                            form="filter"
                                                        />
                                                        10th of Ramadan City
                                                    </label>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown me-3">
                                            <a
                                                class="nav-link text-white dropdown-toggle fs-3 fw-bold"
                                                href="#"
                                                id="navbarDropdownBrowseJobsCategory"
                                                role="button"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                            >
                                                Category
                                            </a>
                                            <ul
                                                class="dropdown-menu dropdown-menu-dark bg-light overflow-auto"
                                                aria-labelledby="navbarDropdownBrowseJobsCategory"
                                                style="max-height: 20rem; width: fit-content"
                                            >
                                                <li class="px-2">
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            form="filter"
                                                            name="optcheckbox2[]"
                                                            value="All"
                                                        />
                                                        All
                                                    </label>
                                                </li>
                                                @foreach($categories as $cat)
                                                <li class="px-2">
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox2[]"
                                                            value="{{$cat->category}}"
                                                            form="filter"
                                                        />
                                                        {{$cat->category}}
                                                    </label>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="col">
                    @foreach ($jobs as $job)
                        <div class="card-body">
                            <h5 class="card-title text-dark fw-bold fs-3 m-3">{{$job->title}}</h5>
                            <p class="card-text fs-6 text-dark mx-auto ms-3">
                                {{Str::limit($job->content, 300)}}
                            </p>
                            <div class="col-md-12 d-flex py-4 w-100">
                                <a
                                    href="{{route('jobs.jobDetails', $job->jobSlug)}}"
                                    class="btn btn-primary text-light rounded-4 fs-4 fw-semibold px-5 py-2 m-auto"
                                >
                                    Read more
                                </a>
                            </div>
                        </div>

                    @endforeach
                    <h5 class="ms-3 mb-3 fs-3 fw-bold">
                        If you dont Found your jobs , click
                        <a href="#" class="text-primary"> here </a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <!--end of content-->
@endsection


