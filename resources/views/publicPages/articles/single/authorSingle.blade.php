@extends('publicPages.layouts.main')

@section('category')
    Professional Development
@endsection
@section('subCategory')
    Authors
@endsection
@section('createdDate')
    Thursday Dec 12 2023
@endsection

@section('publicPagesContent')
   @include('publicPages.includes.breadcrumb')

    <!--Start Author landing -->
    <section id="landing-author" class="bg-secondary">
        <div class="container-fluid pt-3">
            <div
                class="card landing-img border border-dark border-5 d-flex mw-100 mt-4 rounded-4 mx-lg-5 mx-md-3 mx-1"
            >
                <img
                    class="image-center"
                    src="{{asset('publicPages/images/Author.png')}}"
                    alt="Author"
                />
                <div
                    class="card-img-overlay d-flex flex-column justify-content-end"
                >
                    <h2 class="card-title fs-5 text-light">Anne-Maartje</h2>
                    <span class="card-text mb-4 text-light">Author Position</span>
                </div>
            </div>
        </div>
    </section>
    <!--End Author landing -->
    <!--Start Description -->
    <section id="description" class="bg-secondary">
        <div class="container-fluid py-4">
            <h2 class="mb-5 mt-5 mx-lg-5 mx-md-3 mx-1 px-lg-3">Description</h2>
            <p class="mx-lg-5 mx-md-3 mx-1 px-lg-3">
                Sit suscipit neque mauris fames. Sit purus nullam in et. Massa
                aliquet neque scelerisque sed vestibulum porta velit scelerisque.
                Fames egestas congue vivamus nulla sit porta arcu ultrices.
                Porttitor phasellus volutpat elit maecenas mauris molestie. Semper
                in dui lectus fames ultrices erat. Sed arcu sit scelerisque
                consequat amet. Consectetur purus tempus cras neque interdum arcu
                magna feugiat vel. Lacus molestie maecenas duis sit malesuada orci
                sed. Mauris augue sodales lacus eget at nunc morbi in tellus. Quis
                mi venenatis in tempor ultricies ridiculus. Vestibulum in mauris
                pellentesque platea in. Massa sagittis non quam montes sagittis
                elementum. Tellus amet morbi orci at aliquam. Consequat elementum
                scelerisque amet sollicitudin id. Scelerisque consequat habitant
                velit tincidunt nunc nulla habitant tristique at.
            </p>
            <p class="mx-lg-5 mx-md-3 mx-1 px-lg-3">
                Commodo in nisi vel ornare egestas in donec. In pharetra nibh platea
                odio. Duis lectus malesuada integer massa in integer risus dis.
                Facilisi integer tristique sed eu. Mi a posuere enim etiam viverra
                non. Dui neque turpis sed leo pharetra ultrices. A neque elit orci
                viverra ornare iaculis scelerisque ultricies. Faucibus scelerisque
                ut aliquet gravida vehicula scelerisque vitae sit ac. Leo rhoncus
                justo est dui placerat eros ac. Velit sed commodo quam neque sed
                dolor eget viverra. Eget felis diam fringilla ut quis scelerisque
                habitasse. Nec enim pellentesque in orci elit potenti tincidunt
                quam. Tempor sagittis interdum nec tincidunt libero eu a. Ultricies
                vulputate at venenatis ipsum consequat sed gravida vitae convallis.
                Sit aenean in rhoncus ipsum quam augue ultricies eu. Ac ornare
                dignissim in sodales. Eu nam laoreet laoreet nunc morbi amet urna.
            </p>
        </div>
    </section>
    <!--End Description -->
    <!--Start Authors Articles -->
    <section id="description" class="bg-secondary">
        <div class="container-fluid py-4">
            <h2 class="mb-5 mt-5 mx-lg-5 mx-md-3 mx-1 px-lg-3">
                Authors Articles
            </h2>
            <a
                class="d-block mb-3 text-info mx-lg-5 mx-md-3 mx-1 px-lg-3"
                href="javascript:0;"
            >
                Neque tincidunt enim ullamcorper nullam urna. Etiam interdum posuere
                laoreet enim enim imperdiet. Purus viverra in fusce interdum
            </a>
            <a
                class="d-block mb-3 text-info mx-lg-5 mx-md-3 mx-1 px-lg-3"
                href="javascript:0;"
            >
                vel magna nibh sed urna. Viverra lectus nunc molestie volutpat.
                Faucibus tortor semper sed pellentesque viverra ut nunc.
            </a>
            <a
                class="d-block mb-3 text-info mx-lg-5 mx-md-3 mx-1 px-lg-3"
                href="javascript:0;"
            >
                At etiam vulputate sodales ultrices aliquet.
            </a>
            <a
                class="d-block mb-3 text-info mx-lg-5 mx-md-3 mx-1 px-lg-3"
                href="javascript:0;"
            >
                Gravida lacus proin euismod etiam volutpat diam lacus.
            </a>
        </div>
    </section>
    <!--End Authors Articles -->
    <!--Start Conatact Us -->
    <section id="conatact" class="bg-secondary px-5 py-5">
        <div class="container-fluid">
            <h2 class="mb-3">To Reach the Author</h2>
            <div class="mx-5">
                <img src="{{asset('publicPages/images/Author_Facebook .png')}}" alt="facebook" />
                <img src="{{asset('publicPages/images/Author_Youtube.png')}}" alt="youtube" />
                <img src="{{asset('publicPages/images/Author_Linkedin.png')}}" alt="linkedin" />
            </div>
        </div>
    </section>
    <!--End Conatact Us -->

@endsection
