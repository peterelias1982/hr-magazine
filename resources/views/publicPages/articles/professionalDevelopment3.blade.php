@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <!-- start of content -->
    <div class="container-fluid">
        <!--the hero image-->
        <div class="row bg-dark px-md-5 px-1 py-4 mb-0">
            <h3 class="fw-bold fs-2 text-white">Training and Development</h3>
            <div class="col">
                <div
                    class="card bg-dark text-white landing-img mx-lg-5 mx-md-3 mx-1 border-light"
                    style="height: 695px"
                >
                    <img
                        src="{{asset('publicPages/images/training.jpg')}}"
                        class="card-img image-center"
                        alt="..."
                    />
                </div>
            </div>
        </div>
        <!--single Card-->
        <div class="row bg-primary mb-3 mt-0 ">
            <div class="card bg-primary text-white mx-auto my-1 border-0">
                <div
                    class="row align-items-center mx-2 justify-content-center"
                >
                    <!-- Card Content -->
                    <div class="col-md-3">
                        <div
                            class="position-relative overflow-hidden"
                            style="max-width: 218px; aspect-ratio: 1"
                        >
                            <img
                                src="{{asset('publicPages/images/single-avatar.png')}}"
                                class="rounded-circle border-light image-center"
                                alt="Profile Image"
                            />
                        </div>
                    </div>
                    <div class="card-body col-md-8">
                        <div>
                            <h5 class="card-title fw-bold fs-3">
                                HRs Training and Developments
                            </h5>
                            <p class="card-text fw-semibold fs-4">
                                Thursday Dec 12 2023
                            </p>
                            <p class="card-text fw-semibold fs-4">
                                Nadia S. El-Hawrani
                            </p>
                            <p class="carousel-p card-text fw-medium fs-5">
                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                faucibus mi feugiat tristique purus penatibus mauris
                                nam libero....
                                <a
                                    href="#"
                                    class="fw-bold text-white text-decoration-none"
                                >Read more</a
                                >
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end of single card-->
        <!--cards Caousel-->
        <div class="row bg-dark my-3 pb-3">
            <div class="col-12 bg-dark px-4 pt-3 text-white">
                <h3 class="fw-bold fs-2">Professional Advice</h3>
            </div>
            <div class="col-12">
                <!-- Bootstrap Carousel -->
                <div
                    id="cardCarousel"
                    class="carousel slide"
                    data-bs-ride="carousel"
                >
                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card bg-dark text-white mx-auto my-1 border-0">
                                <div
                                    class="row align-items-center mx-2 justify-content-center"
                                >
                                    <!-- Card Content -->
                                    <div class="col-md-3">
                                        <div
                                            class="position-relative overflow-hidden"
                                            style="max-width: 218px; aspect-ratio: 1"
                                        >
                                            <img
                                                src="{{asset('publicPages/images/avatar1.svg')}}"
                                                class="rounded-circle border-light image-center"
                                                alt="Profile Image"
                                            />
                                        </div>
                                    </div>
                                    <div class="card-body col-md-8">
                                        <div>
                                            <h5 class="card-title fw-bold fs-3">
                                                HRs Training and Developments
                                            </h5>
                                            <p class="card-text fw-semibold fs-4">
                                                Thursday Dec 12 2023
                                            </p>
                                            <p class="card-text fw-semibold fs-4">
                                                Nadia S. El-Hawrani
                                            </p>
                                            <p class="carousel-p card-text fw-medium fs-5">
                                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                                faucibus mi feugiat tristique purus penatibus mauris
                                                nam libero....
                                                <a
                                                    href="#"
                                                    class="fw-bold text-white text-decoration-none"
                                                >Read more</a
                                                >
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card bg-dark text-white mx-auto my-1 border-0">
                                <div
                                    class="row align-items-center mx-2 justify-content-center"
                                >
                                    <!-- Card Content -->
                                    <div class="col-md-3">
                                        <div
                                            class="position-relative overflow-hidden"
                                            style="max-width: 218px; aspect-ratio: 1"
                                        >
                                            <img
                                                src="{{asset('publicPages/images/avatar5.svg')}}"
                                                class="rounded-circle border-light image-center"
                                                alt="Profile Image"
                                            />
                                        </div>
                                    </div>
                                    <div class="card-body col-md-8">
                                        <div>
                                            <h5 class="card-title fw-bold fs-3">
                                                HRs Training and Developments
                                            </h5>
                                            <p class="card-text fw-semibold fs-4">
                                                Thursday Dec 12 2023
                                            </p>
                                            <p class="card-text fw-semibold fs-4">
                                                Nadia S. El-Hawrani
                                            </p>
                                            <p class="carousel-p card-text fw-medium fs-5">
                                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                                faucibus mi feugiat tristique purus penatibus mauris
                                                nam libero....
                                                <a
                                                    href="#"
                                                    class="fw-bold text-white text-decoration-none"
                                                >Read more</a
                                                >
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card bg-dark text-white mx-auto my-1 border-0">
                                <div
                                    class="row align-items-center gx-5 mx-2 justify-content-center"
                                >
                                    <!-- Card Content -->
                                    <div class="col-md-3">
                                        <div
                                            class="position-relative overflow-hidden"
                                            style="max-width: 218px; aspect-ratio: 1"
                                        >
                                            <img
                                                src="{{asset('publicPages/images/avatar4.svg')}}"
                                                class="rounded-circle border-light image-center"
                                                alt="Profile Image"
                                            />
                                        </div>
                                    </div>
                                    <div class="card-body col-md-8">
                                        <div>
                                            <h5 class="card-title fw-bold fs-3">
                                                HRs Training and Developments
                                            </h5>
                                            <p class="card-text fw-semibold fs-4">
                                                Thursday Dec 12 2023
                                            </p>
                                            <p class="card-text fw-semibold fs-4">
                                                Nadia S. El-Hawrani
                                            </p>
                                            <p class="carousel-p card-text fw-medium fs-5">
                                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                                faucibus mi feugiat tristique purus penatibus mauris
                                                nam libero....
                                                <a
                                                    href="#"
                                                    class="fw-bold text-white text-decoration-none"
                                                >Read more</a
                                                >
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card bg-dark text-white mx-auto my-1 border-0">
                                <div
                                    class="row align-items-center gx-5 mx-2 justify-content-center"
                                >
                                    <!-- Card Content -->
                                    <div class="col-md-3">
                                        <div
                                            class="position-relative overflow-hidden"
                                            style="max-width: 218px; aspect-ratio: 1"
                                        >
                                            <img
                                                src="{{asset('publicPages/images/avatar3.svg')}}"
                                                class="rounded-circle border-light image-center"
                                                alt="Profile Image"
                                            />
                                        </div>
                                    </div>
                                    <div class="card-body col-md-8">
                                        <div>
                                            <h5 class="card-title fw-bold fs-3">
                                                HRs Training and Developments
                                            </h5>
                                            <p class="card-text fw-semibold fs-4">
                                                Thursday Dec 12 2023
                                            </p>
                                            <p class="card-text fw-semibold fs-4">
                                                Nadia S. El-Hawrani
                                            </p>
                                            <p class="carousel-p card-text fw-medium fs-5">
                                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                                faucibus mi feugiat tristique purus penatibus mauris
                                                nam libero....
                                                <a
                                                    href="#"
                                                    class="fw-bold text-white text-decoration-none"
                                                >Read more</a
                                                >
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card bg-dark text-white mx-auto my-1 border-0">
                                <div
                                    class="row align-items-center gx-5 mx-2 justify-content-center"
                                >
                                    <!-- Card Content -->
                                    <div class="col-md-3">
                                        <div
                                            class="position-relative overflow-hidden"
                                            style="max-width: 218px; aspect-ratio: 1"
                                        >
                                            <img
                                                src="{{asset('publicPages/images/avatar2.svg')}}"
                                                class="rounded-circle border-light image-center"
                                                alt="Profile Image"
                                            />
                                        </div>
                                    </div>
                                    <div class="card-body col-md-8">
                                        <div>
                                            <h5 class="card-title fw-bold fs-3">
                                                HRs Training and Developments
                                            </h5>
                                            <p class="card-text fw-semibold fs-4">
                                                Thursday Dec 12 2023
                                            </p>
                                            <p class="card-text fw-semibold fs-4">
                                                Nadia S. El-Hawrani
                                            </p>
                                            <p class="carousel-p card-text fw-medium fs-5">
                                                Lorem ipsum dolor sit amet consectetur. Pellentesque
                                                faucibus mi feugiat tristique purus penatibus mauris
                                                nam libero....
                                                <a
                                                    href="#"
                                                    class="fw-bold text-white text-decoration-none"
                                                >Read more</a
                                                >
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Left and right controls/icons with inline styling for custom arrow appearance -->
                        <button
                            class="carousel-control-prev"
                            type="button"
                            data-bs-target="#cardCarousel"
                            data-bs-slide="prev"
                        >
                            <img
                                src="{{asset('publicPages/images/prev-arrow-black-circle.svg')}}"
                                alt="Previous"
                                class="carousel-control-prev-icon"
                            />
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button
                            class="carousel-control-next"
                            type="button"
                            data-bs-target="#cardCarousel"
                            data-bs-slide="next"
                        >
                            <img
                                src="{{asset('publicPages/images/next-arrow-black-circle.svg')}}"
                                alt="Next"
                                class="carousel-control-next-icon"
                            />
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--End of card carousel-->
        <!--column of article Cards section -->
        <div class="row bg-light">
            <div class="col-12 bg-primary p-md-5 p-1 text-white">
                <h3 class="fw-bold fs-2">Authors</h3>
            </div>
            <!--cards list-->
            <div class="col-12">
                <div class="scrollable-card-container">
                        <div class="card bg-dark text-white mx-auto mx-lg-5 my-3">
                            <div
                                class="row align-items-center gx-5 mx-2 my-3  justify-content-center"
                            >
                                <!-- Card Content -->
                                <div class="col-md-3">
                                    <div
                                        class="position-relative overflow-hidden"
                                        style="max-width: 218px; aspect-ratio: 1"
                                    >
                                        <img
                                            src="{{asset('publicPages/images/av1-p7.jpg')}}"
                                            class="rounded-circle  image-center"
                                            alt="Profile Image"
                                        />
                                    </div>
                                </div>
                                <div class="card-body col-md-8">
                                    <div>
                                        <h5 class="card-title fw-bold fs-3">
                                            Author Name
                                        </h5>
                                        <p class="card-text fw-semibold fs-4">
                                            Author Position
                                        </p>

                                        <p class="carousel-p card-text fw-medium fs-5">
                                            Lorem ipsum dolor sit amet consectetur. Pellentesque
                                            faucibus mi feugiat tristique purus penatibus mauris nam
                                            libero....
                                            <a
                                                href="#"
                                                class="fw-bold text-white text-decoration-none"
                                            >Read more</a
                                            >
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-dark text-white mx-auto mx-lg-5 my-3">
                            <div
                                class="row align-items-center gx-5 mx-2 my-3 justify-content-center"
                            >
                                <!-- Card Content -->
                                <div class="col-md-3">
                                    <div
                                        class="position-relative overflow-hidden"
                                        style="max-width: 218px; aspect-ratio: 1"
                                    >
                                        <img
                                            src="{{asset('publicPages/images/av2-p7.jpg')}}"
                                            class="rounded-circle  image-center"
                                            alt="Profile Image"
                                        />
                                    </div>
                                </div>
                                <div class="card-body col-md-8">
                                    <div>
                                        <h5 class="card-title fw-bold fs-3">
                                            Author Name
                                        </h5>
                                        <p class="card-text fw-semibold fs-4">
                                            Author Position
                                        </p>

                                        <p class="carousel-p card-text fw-medium fs-5">
                                            Lorem ipsum dolor sit amet consectetur. Pellentesque
                                            faucibus mi feugiat tristique purus penatibus mauris nam
                                            libero....
                                            <a
                                                href="#"
                                                class="fw-bold text-white text-decoration-none"
                                            >Read more</a
                                            >
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-dark text-white mx-auto mx-lg-5 my-3">
                            <div
                                class="row align-items-center gx-5 mx-2 my-3 justify-content-center"
                            >
                                <!-- Card Content -->
                                <div class="col-md-3">
                                    <div
                                        class="position-relative overflow-hidden"
                                        style="max-width: 218px; aspect-ratio: 1"
                                    >
                                        <img
                                            src="{{asset('publicPages/images/av3-p7.jpg')}}"
                                            class="rounded-circle  image-center"
                                            alt="Profile Image"
                                        />
                                    </div>
                                </div>
                                <div class="card-body col-md-8">
                                    <div>
                                        <h5 class="card-title fw-bold fs-3">
                                            Author Name
                                        </h5>
                                        <p class="card-text fw-semibold fs-4">
                                            Author Position
                                        </p>

                                        <p class="carousel-p card-text fw-medium fs-5">
                                            Lorem ipsum dolor sit amet consectetur. Pellentesque
                                            faucibus mi feugiat tristique purus penatibus mauris nam
                                            libero....
                                            <a
                                                href="#"
                                                class="fw-bold text-white text-decoration-none"
                                            >Read more</a
                                            >
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-dark text-white mx-auto mx-lg-5 my-3">
                            <div
                                class="row align-items-center gx-5 mx-2 my-3 justify-content-center"
                            >
                                <!-- Card Content -->
                                <div class="col-md-3">
                                    <div
                                        class="position-relative overflow-hidden"
                                        style="max-width: 218px; aspect-ratio: 1"
                                    >
                                        <img
                                            src="{{asset('publicPages/images/av4-p7.jpg')}}"
                                            class="rounded-circle  image-center"
                                            alt="Profile Image"
                                        />
                                    </div>
                                </div>
                                <div class="card-body col-md-8">
                                    <div>
                                        <h5 class="card-title fw-bold fs-3">
                                            Author Name
                                        </h5>
                                        <p class="card-text fw-semibold fs-4">
                                            Author Position
                                        </p>

                                        <p class="carousel-p card-text fw-medium fs-5">
                                            Lorem ipsum dolor sit amet consectetur. Pellentesque
                                            faucibus mi feugiat tristique purus penatibus mauris nam
                                            libero....
                                            <a
                                                href="#"
                                                class="fw-bold text-white text-decoration-none"
                                            >Read more</a
                                            >
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-dark text-white mx-auto mx-lg-5 my-3">
                            <div
                                class="row align-items-center gx-5 mx-2 my-3 justify-content-center"
                            >
                                <!-- Card Content -->
                                <div class="col-md-3">
                                    <div
                                        class="position-relative overflow-hidden"
                                        style="max-width: 218px; aspect-ratio: 1"
                                    >
                                        <img
                                            src="{{asset('publicPages/images/av5-p7.jpg')}}"
                                            class="rounded-circle  image-center"
                                            alt="Profile Image"
                                        />
                                    </div>
                                </div>
                                <div class="card-body col-md-8">
                                    <div>
                                        <h5 class="card-title fw-bold fs-3">
                                            Author Name
                                        </h5>
                                        <p class="card-text fw-semibold fs-4">
                                            Author Position
                                        </p>

                                        <p class="carousel-p card-text fw-medium fs-5">
                                            Lorem ipsum dolor sit amet consectetur. Pellentesque
                                            faucibus mi feugiat tristique purus penatibus mauris nam
                                            libero....
                                            <a
                                                href="#"
                                                class="fw-bold text-white text-decoration-none"
                                            >Read more</a
                                            >
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-dark text-white mx-auto mx-lg-5 my-3">
                            <div
                                class="row align-items-center gx-5 mx-2 my-3 justify-content-center"
                            >
                                <!-- Card Content -->
                                <div class="col-md-3">
                                    <div
                                        class="position-relative overflow-hidden"
                                        style="max-width: 218px; aspect-ratio: 1"
                                    >
                                        <img
                                            src="{{asset('publicPages/images/av6-p7.jpg')}}"
                                            class="rounded-circle  image-center"
                                            alt="Profile Image"
                                        />
                                    </div>
                                </div>
                                <div class="card-body col-md-8">
                                    <div>
                                        <h5 class="card-title fw-bold fs-3">
                                            Author Name
                                        </h5>
                                        <p class="card-text fw-semibold fs-4">
                                            Author Position
                                        </p>

                                        <p class="carousel-p card-text fw-medium fs-5">
                                            Lorem ipsum dolor sit amet consectetur. Pellentesque
                                            faucibus mi feugiat tristique purus penatibus mauris nam
                                            libero....
                                            <a
                                                href="#"
                                                class="fw-bold text-white text-decoration-none"
                                            >Read more</a
                                            >
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-dark text-white mx-auto mx-lg-5 my-3">
                            <div
                                class="row align-items-center gx-5 mx-2 my-3 justify-content-center"
                            >
                                <!-- Card Content -->
                                <div class="col-md-3">
                                    <div
                                        class="position-relative overflow-hidden"
                                        style="max-width: 218px; aspect-ratio: 1"
                                    >
                                        <img
                                            src="{{asset('publicPages/images/av7-p7.jpg')}}"
                                            class="rounded-circle  image-center"
                                            alt="Profile Image"
                                        />
                                    </div>
                                </div>
                                <div class="card-body col-md-8">
                                    <div>
                                        <h5 class="card-title fw-bold fs-3">
                                            Author Name
                                        </h5>
                                        <p class="card-text fw-semibold fs-4">
                                            Author Position
                                        </p>

                                        <p class="carousel-p card-text fw-medium fs-5">
                                            Lorem ipsum dolor sit amet consectetur. Pellentesque
                                            faucibus mi feugiat tristique purus penatibus mauris nam
                                            libero....
                                            <a
                                                href="#"
                                                class="fw-bold text-white text-decoration-none"
                                            >Read more</a
                                            >
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <!--end of card list-->
        </div>
        <!--end of col of article cards section-->
    </div>
@endsection
