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
                                <span class="float-end">
                      Sort By:
                      <span class="dropdown">
                        <button
                            type="button"
                            class="bg-light border-0 text-muted dropdown-toggle"
                            data-bs-toggle="dropdown"
                        >
                          Publish Date
                        </button>
                        <ul
                            class="dropdown-menu dropdown-menu-dark bg-light"
                            aria-labelledby="navbarDropdownBrowseJobsDate"
                        >
                          <li>
                            <a
                                class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                href="#"
                            >All</a
                            >
                          </li>
                          <li>
                            <a
                                class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark border-bottom text-dark"
                                href="#"
                            >Today</a
                            >
                          </li>
                          <li>
                            <a
                                class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark border-bottom text-dark"
                                href="#"
                            >This Week</a
                            >
                          </li>
                          <li>
                            <a
                                class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark border-bottom text-dark"
                                href="#"
                            >This Month</a
                            >
                          </li>
                          <li>
                            <a
                                class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark border-bottom text-dark"
                                href="#"
                            >This Year</a
                            >
                          </li>
                        </ul>
                      </span>
                    </span>
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
                                            type="text"
                                            class="form-control border-0 fw-bold fs-2 opacity-50 flex-grow-1"
                                            placeholder=" Search..."
                                        />
                                        <button type="button" class="btn p-0">
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
                                                id="navbarDropdownBrowseJobsDate"
                                                role="button"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                            >
                                                Date
                                            </a>
                                            <ul
                                                class="dropdown-menu dropdown-menu-dark bg-light overflow-auto"
                                                aria-labelledby="navbarDropdownBrowseJobsDate"
                                                style="max-height: 20rem"
                                            >
                                                <li>
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox"
                                                            value="option1"
                                                        />
                                                        Any
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
                                                            name="optcheckbox"
                                                            value="option1"
                                                        />
                                                        May 2024
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
                                                            name="optcheckbox"
                                                            value="option1"
                                                        />
                                                        April 2024
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
                                                            name="optcheckbox"
                                                            value="option1"
                                                        />
                                                        March 2024
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
                                                            name="optcheckbox"
                                                            value="option1"
                                                        />
                                                        February 2024
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
                                                            name="optcheckbox"
                                                            value="option1"
                                                        />
                                                        January 2024
                                                    </label>
                                                </li>
                                            </ul>
                                        </li>
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
                                                               id="checkbox1" name="optcheckbox"
                                                               value="option1"> All
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
                                                            name="optcheckbox"
                                                            value="option1"
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
                                                            name="optcheckbox"
                                                            value="option1"
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
                                                            name="optcheckbox"
                                                            value="option1"
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
                                                            name="optcheckbox"
                                                            value="option1"
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
                                                            name="optcheckbox"
                                                            value="option1"
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
                                                            name="optcheckbox"
                                                            value="option1"
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
                                                            name="optcheckbox"
                                                            value="option1"
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
                                                            name="optcheckbox"
                                                            value="option1"
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
                                                            name="optcheckbox"
                                                            value="option1"
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
                                                            name="optcheckbox"
                                                            value="option1"
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
                                                            name="optcheckbox"
                                                            value="option1"
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
                                                            name="optcheckbox"
                                                            value="option1"
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
                                                            name="optcheckbox"
                                                            value="option1"
                                                        />
                                                        All
                                                    </label>
                                                </li>
                                                <li class="px-2">
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox"
                                                            value="option1"
                                                        />
                                                        Arts
                                                    </label>
                                                </li>
                                                <li class="px-2">
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox"
                                                            value="option1"
                                                        />
                                                        Education & study & training
                                                    </label>
                                                </li>
                                                <li class="px-2">
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox"
                                                            value="option1"
                                                        />
                                                        Business
                                                    </label>
                                                </li>
                                                <li class="px-2">
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox"
                                                            value="option1"
                                                        />
                                                        Sales
                                                    </label>
                                                </li>
                                                <li class="px-2">
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox"
                                                            value="option1"
                                                        />
                                                        Communications
                                                    </label>
                                                </li>
                                                <li class="px-2">
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox"
                                                            value="option1"
                                                        />
                                                        Finance
                                                    </label>
                                                </li>
                                                <li class="px-2">
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox"
                                                            value="option1"
                                                        />
                                                        Legal
                                                    </label>
                                                </li>
                                                <li class="px-2">
                                                    <label
                                                        class="dropdown-item border border-start-0 border-top-0 border-end-0 border-dark text-dark"
                                                        href="#"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="form-check-input"
                                                            id="checkbox1"
                                                            name="optcheckbox"
                                                            value="option1"
                                                        />
                                                        Technology
                                                    </label>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="col">
                    <div class="card-body">
                        <h5 class="card-title text-dark fw-bold fs-3 m-3">Jobs Name</h5>
                        <p class="card-text fs-6 text-dark mx-auto ms-3">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque faucibus
                            mi feugiat tristique purus penatibus mauris nam libero. Non
                            aliquam varius at amet lorem lobortis netus vulputate. Semper
                            purus turpis vitae nunc urna sodales mauris. Vulputate sit est
                            pharetra velit eget.
                        </p>
                        <div class="col-md-12 d-flex py-4 w-100">
                            <button
                                type="submit"
                                class="btn btn-primary text-light rounded-4 fs-4 fw-semibold px-5 py-2 m-auto"
                            >
                                Apply Job
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-dark fw-bold fs-3 m-3">Jobs Name</h5>
                        <p class="card-text fs-6 text-dark mx-auto ms-3">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque faucibus
                            mi feugiat tristique purus penatibus mauris nam libero. Non
                            aliquam varius at amet lorem lobortis netus vulputate. Semper
                            purus turpis vitae nunc urna sodales mauris. Vulputate sit est
                            pharetra velit eget.
                        </p>
                        <div class="col-md-12 d-flex py-4 w-100">
                            <button
                                type="submit"
                                class="btn btn-primary text-light rounded-4 fs-4 fw-semibold px-5 py-2 m-auto"
                            >
                                Apply Job
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-dark fw-bold fs-3 m-3">Jobs Name</h5>
                        <p class="card-text fs-6 text-dark mx-auto ms-3">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque faucibus
                            mi feugiat tristique purus penatibus mauris nam libero. Non
                            aliquam varius at amet lorem lobortis netus vulputate. Semper
                            purus turpis vitae nunc urna sodales mauris. Vulputate sit est
                            pharetra velit eget.
                        </p>
                        <div class="col-md-12 d-flex py-4 w-100">
                            <button
                                type="submit"
                                class="btn btn-primary text-light rounded-4 fs-4 fw-semibold px-5 py-2 m-auto"
                            >
                                Apply Job
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-dark fw-bold fs-3 m-3">Jobs Name</h5>
                        <p class="card-text fs-6 text-dark mx-auto ms-3">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque faucibus
                            mi feugiat tristique purus penatibus mauris nam libero. Non
                            aliquam varius at amet lorem lobortis netus vulputate. Semper
                            purus turpis vitae nunc urna sodales mauris. Vulputate sit est
                            pharetra velit eget.
                        </p>
                        <div class="col-md-12 d-flex py-4 w-100">
                            <button
                                type="submit"
                                class="btn btn-primary text-light rounded-4 fs-4 fw-semibold px-5 py-2 m-auto"
                            >
                                Apply Job
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-dark fw-bold fs-3 m-3">Jobs Name</h5>
                        <p class="card-text fs-6 text-dark mx-auto ms-3">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque faucibus
                            mi feugiat tristique purus penatibus mauris nam libero. Non
                            aliquam varius at amet lorem lobortis netus vulputate. Semper
                            purus turpis vitae nunc urna sodales mauris. Vulputate sit est
                            pharetra velit eget.
                        </p>
                        <div class="col-md-12 d-flex py-4 w-100">
                            <button
                                type="submit"
                                class="btn btn-primary text-light rounded-4 fs-4 fw-semibold px-5 py-2 m-auto"
                            >
                                Apply Job
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-dark fw-bold fs-3 m-3">Jobs Name</h5>
                        <p class="card-text fs-6 text-dark mx-auto ms-3">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque faucibus
                            mi feugiat tristique purus penatibus mauris nam libero. Non
                            aliquam varius at amet lorem lobortis netus vulputate. Semper
                            purus turpis vitae nunc urna sodales mauris. Vulputate sit est
                            pharetra velit eget.
                        </p>
                        <div class="col-md-12 d-flex py-4 w-100">
                            <button
                                type="submit"
                                class="btn btn-primary text-light rounded-4 fs-4 fw-semibold px-5 py-2 m-auto"
                            >
                                Apply Job
                            </button>
                        </div>
                    </div>
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


