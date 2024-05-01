@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <!-- start of content -->
    <!-- section 1 -->
    <div class="container-fluid g-0 bg-light pt-3 pb-3 px-md-5 px-1">
        <div class="row py-4 justify-content-center">
            <h3 class="fw-bold fs-2 text-center pb-2">Job Opportunities and Career Resources</h3>
            <!-- image header -->
            <div
                class="overflow-hidden position-relative mx-lg-5 mx-md-3 mx-1 mb-3"
                style="height: 695px"
            >
                <img
                    src="{{asset('publicPages/images/jobOpportunities-career-header.png')}}"
                    class="rounded image-center"
                    alt="job-career-header-img"
                />
            </div>
        </div>
    </div>
    <!-- section 2 -->
    <div class="container-fluid g-0 bg-dark pt-5 px-md-5 px-1">
        <!-- find job section-->
        <div class="row pb-3">
            <h2 class="text-primary fs-2 fw-bold ">Find Jobs</h2>
            <p class="text-white fw-semibold">
                Lorem ipsum dolor sit amet consectetur. Pellentesque faucibus mi
                feugiat tristique purus penatibus mauris nam libero. Non aliquam
                varius at amet lorem lobortis netus vulputate. Semper purus turpis
                vitae nunc urna sodales mauris. Vulputate sit est pharetra velit
                eget.
            </p>
            <div class="col-md-12 d-flex py-4 w-100 justify-content-center">
                <a href="#">
                    <button
                        class="btn btn-primary text-light fs-5 fw-semibold rounded-4 py-3 px-5"
                    >
                        Browse Jobs
                    </button>
                </a>
            </div>
        </div>

        <!-- job seeker section-->
        <div
            class="position-relative overflow-hidden mx-1 mb-3"
            style="height: 695px"
        >
            <img
                src="{{asset('publicPages/images/jobSeeker-img.png')}}"
                class="rounded image-center"
                alt="job-seeker-img"
            />
        </div>
        <div class="row pb-3">
            <h2 class="text-primary fs-2 fw-bold py-3">Job Seeker</h2>
            <p class="text-white fw-semibold">
                Lorem ipsum dolor sit amet consectetur. Pellentesque faucibus mi
                feugiat tristique purus penatibus mauris nam libero. Non aliquam
                varius at amet lorem lobortis netus vulputate. Semper purus turpis
                vitae nunc urna sodales mauris. Vulputate sit est pharetra velit
                eget.
            </p>
            <div class="col-md-12 d-flex py-4 w-100 justify-content-center">
                <a href="#">
                    <button
                        class="btn btn-primary text-light fs-5 fw-semibold rounded-4 py-3 px-5"
                    >
                        Edit Profile
                    </button>
                </a>
            </div>
        </div>

        <!-- employer jobs section -->
        <!-- img -->
        <div
            class="position-relative overflow-hidden mx-1 mb-3"
            style="height: 695px"
        >
            <img
                src="{{asset('publicPages/images/employerJobs-img.png')}}"
                class="rounded image-center"
                alt="employer-Jobs-img"
            />
        </div>
        <div class="row pb-3">
            <h2 class="text-primary fs-2 fw-bold py-3">Employer Jobs</h2>
            <p class="text-white fw-semibold">
                Lorem ipsum dolor sit amet consectetur. Pellentesque faucibus mi
                feugiat tristique purus penatibus mauris nam libero. Non aliquam
                varius at amet lorem lobortis netus vulputate. Semper purus turpis
                vitae nunc urna sodales mauris. Vulputate sit est pharetra velit
                eget.
            </p>
            <div class="col-md-12 d-flex py-4 w-100 justify-content-center">
                <a href="#">
                    <button
                        class="btn btn-primary text-light fs-5 fw-semibold rounded-4 py-3 px-5"
                    >
                        Send Job
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
