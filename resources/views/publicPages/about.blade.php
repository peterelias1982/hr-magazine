@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <h2 class="text-center bg-primary text-white py-4 mt-5 mb-0 fs-2 fw-bold">
        About Us
    </h2>
    <section id="about-landing" class="bg-secondary">
        <div class="container-fluid pt-3">
            <div class="landing-img mw-100 mt-4 rounded-4 mx-lg-5 mx-md-3 mx-1">
                <img
                    class="image-center"
                    src="{{asset('publicPages/images/landing.png')}}"
                    alt="landing"
                />
            </div>
        </div>
    </section>
    <!--End About landing -->
    <!--Start Who We Are -->
    <section id="who" class="bg-secondary">
        <div class="container-fluid py-4">
            <h2 class="text-center mb-5 mt-5">Who We Are</h2>
            <p class="mx-lg-5 mx-md-3 mx-1 px-lg-5">
                Lorem ipsum dolor sit amet consectetur. Est maecenas tellus nulla
                sed pulvinar fringilla accumsan quam. Orci lectus ornare nisi et
                aliquet vitae nisl. Ultrices in bibendum pellentesque a pharetra
                lacus ante fermentum dui. Vestibulum vitae eget hendrerit tristique.
                Sagittis et viverra arcu maecenas tristique libero elit egestas at.
                Scelerisque bibendum quam interdum lobortis consectetur. Nam
                pulvinar senectus aliquam tincidunt malesuada. Cursus faucibus
                venenatis metus non sem. Aliquet magna molestie mus semper
                scelerisque nisl amet faucibus nibh. Lectus commodo quam leo
                elementum. Proin id commodo ipsum ut sagittis nec nisi. Adipiscing
                ullamcorper nulla et malesuada. Sollicitudin curabitur eros vitae
                fusce quam fringilla in.
            </p>
        </div>
    </section>
    <!--End Who We Are -->
    <!--Start Team -->
    <section id="team" class="bg-secondary pt-5">
        <div class="container-fluid">
            <h2 class="text-center mb-4">Our Team</h2>
            <div class="row text-center">
                <article class="col-lg-4 col-md-6 col-12">
                    <img
                        class="mb-4"
                        src="{{asset('publicPages/images/team 1.png')}}"
                        alt="member photo 1"
                    />
                    <h3>Amged S. El-Hawrani</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur. Pellentesque faucibus mi
                        feugiat tristique purus penatibus mauris nam libero. Non aliquam
                        varius at amet lorem lobortis netus vulputate. Semper purus
                        turpis vitae nunc urna sodales mauris.
                    </p>
                </article>
                <article class="col-lg-4 col-md-6 col-12">
                    <img
                        class="mb-4"
                        src="{{asset('publicPages/images/team 2.png')}}"
                        alt="member photo 2"
                    />
                    <h3>Nadia S. El-Hawrani</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur. Pellentesque faucibus mi
                        feugiat tristique purus penatibus mauris nam libero. Non aliquam
                        varius at amet lorem lobortis netus vulputate. Semper purus
                        turpis vitae nunc urna sodales mauris.
                    </p>
                </article>
                <article class="col-lg-4 col-md-6 col-12">
                    <img
                        class="mb-4"
                        src="{{asset('publicPages/images/team 3.png')}}"
                        alt="member photo 3"
                    />
                    <h3>Amany S. El-Hawrani</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur. Pellentesque faucibus mi
                        feugiat tristique purus penatibus mauris nam libero. Non aliquam
                        varius at amet lorem lobortis netus vulputate. Semper purus
                        turpis vitae nunc urna sodales mauris.
                    </p>
                </article>
                <article class="col-lg-4 col-md-6 col-12">
                    <img
                        class="mb-4"
                        src="{{asset('publicPages/images/team 4.png')}}"
                        alt="member photo 4"
                    />
                    <h3>Amged S. El-Hawrani</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur. Pellentesque faucibus mi
                        feugiat tristique purus penatibus mauris nam libero. Non aliquam
                        varius at amet lorem lobortis netus vulputate. Semper purus
                        turpis vitae nunc urna sodales mauris.
                    </p>
                </article>
                <article class="col-lg-4 col-md-6 col-12">
                    <img
                        class="mb-4"
                        src="{{asset('publicPages/images/team 5.png')}}"
                        alt="member photo 5"
                    />
                    <h3>Nadia S. El-Hawrani</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur. Pellentesque faucibus mi
                        feugiat tristique purus penatibus mauris nam libero. Non aliquam
                        varius at amet lorem lobortis netus vulputate. Semper purus
                        turpis vitae nunc urna sodales mauris.
                    </p>
                </article>
                <article class="col-lg-4 col-md-6 col-12">
                    <img
                        class="mb-4"
                        src="{{asset('publicPages/images/team 6.png')}}"
                        alt="member photo 6"
                    />
                    <h3>Amany S. El-Hawrani</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur. Pellentesque faucibus mi
                        feugiat tristique purus penatibus mauris nam libero. Non aliquam
                        varius at amet lorem lobortis netus vulputate. Semper purus
                        turpis vitae nunc urna sodales mauris.
                    </p>
                </article>
            </div>
        </div>
    </section>
    <!--End Team -->
    <!--Start Conatact Us -->
    <section id="conatact" class="bg-secondary px-lg-5 px-3 mb-5 py-5">
        <div class="container-fluid">
            <h2 class="mb-3">For more information:</h2>
            <span class="text-decoration-underline text-secondary me-lg-3 me-2"
            >Contact Us</span
            >
            <img src="{{asset('publicPages/images/conatact_facebook .png')}}" alt="facebook" />
            <img src="{{asset('publicPages/images/conatact_twitter X.png')}}" alt="twitter" />
            <img src="{{asset('publicPages/images/conatact_youtube.png')}}" alt="youtube" />
            <img src="{{asset('publicPages/images/conatact_instagram.png')}}" alt="instagram" />
            <img src="{{asset('publicPages/images/conatact_linkedin.png')}}" alt="linkedin" />
        </div>
    </section>
    <!--End Conatact Us -->

@endsection
