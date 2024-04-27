@extends('publicPages.layouts.main')

@section('publicPagesContent')
    <!-- start of content -->
    @include('publicPages.includes.breadcrumb')
    <div class="container-fluid g-0 bg-light pt-3 pb-5 px-lg-5 px-md-3 px-1">
        <!-- image header -->
        <div
            class="position-relative overflow-hidden mx-3 mb-3"
            style="height: 695px"
        >
            <img
                src="{{asset('publicPages/images/hrsCase-studies2-header.png')}}"
                class="rounded image-center border-dark border-5 rounded-4"
                alt="DEI-header-img"
            />
        </div>
        <!-- article -->
        <div class="mx-auto pt-4" style="max-width: 1225px">
            <article class="mx-lg-4 ">
                <p>
                    Lorem ipsum dolor sit amet consectetur. Est maecenas tellus nulla
                    sed pulvinar fringilla accumsan quam. Orci lectus ornare nisi et
                    aliquet vitae nisl. Ultrices in bibendum pellentesque a pharetra
                    lacus ante fermentum dui. Vestibulum vitae eget hendrerit
                    tristique. Sagittis et viverra arcu maecenas tristique libero elit
                    egestas at. Scelerisque bibendum quam interdum lobortis
                    consectetur. Nam pulvinar senectus aliquam tincidunt malesuada.
                </p>

                <h2 class="fs-1 py-4">Title 1</h2>
                <p>
                    Molestie interdum cras sit non magna vitae purus cum. Nisi in
                    malesuada nunc eget id maecenas. Blandit porttitor quam tempus sed
                    at gravida urna. Egestas montes nibh aliquam luctus. Eu placerat
                    arcu libero viverra cras. Fermentum ullamcorper velit at
                    condimentum vulputate. Risus in vel commodo ultrices tellus
                    convallis. Sit malesuada tempus ultricies fringilla sit nunc
                    facilisi pretium. Felis aenean massa libero bibendum. Faucibus et
                    imperdiet enim diam viverra. Et egestas imperdiet tempor dictum
                    leo eu.<br /><br />

                    Sit suscipit neque mauris fames. Sit purus nullam in et. Massa
                    aliquet neque scelerisque sed vestibulum porta velit scelerisque.
                    Fames egestas congue vivamus nulla sit porta arcu ultrices.
                    Porttitor phasellus volutpat elit maecenas mauris molestie. Semper
                    in dui lectus fames ultrices erat. Sed arcu sit scelerisque
                    consequat amet. Consectetur purus tempus cras neque interdum arcu
                    magna feugiat vel.<br /><br />

                    Lacus molestie maecenas duis sit malesuada orci sed. Mauris augue
                    sodales lacus eget at nunc morbi in tellus. Quis mi venenatis in
                    tempor ultricies ridiculus. Vestibulum in mauris pellentesque
                    platea in. Massa sagittis non quam montes sagittis elementum.
                    Tellus amet morbi orci at aliquam. Consequat elementum scelerisque
                    amet sollicitudin id. Scelerisque consequat habitant velit
                    tincidunt nunc nulla habitant tristique at.
                </p>

                <!-- video -->
                <div class="row m-auto g-0 pb-3">
                    <div class="col">
                        <div class="card bg-light text-white border-light">
                            <div class="ratio ratio-16x9">
                                <!-- Default Image -->
                                <img
                                    src="{{asset('publicPages/images/hrsCase-studies2-video.png')}}"
                                    alt="Default Video Image"
                                    class="embed-cover"
                                />
                                <!-- Iframe for Video -->
                                <iframe
                                    src="https://www.youtube.com/embed/7S0Lj4scspU?list=PL7h7VRXAvXNpehO1CPzEPdNEJNqItu6HM&enablejsapi=1"
                                    class="youtube-video embed-cover"
                                    style="display: none"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                >
                                </iframe>

                                <!-- Custom Play Button -->
                                <button
                                    type="button"
                                    class="btn position-absolute top-50 start-50 translate-middle"
                                    aria-label="Play Video"
                                    onclick="playVideo()"
                                >
                                    <img
                                        src="{{asset('publicPages/images/video-play-btn.svg')}}"
                                        alt="Play Video"
                                        class="embed-cover-btn"
                                    />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end video -->
                <p>
                    Commodo in nisi vel ornare egestas in donec. In pharetra nibh
                    platea odio. Duis lectus malesuada integer massa in integer risus
                    dis. Facilisi integer tristique sed eu. Mi a posuere enim etiam
                    viverra non. Dui neque turpis sed leo pharetra ultrices. A neque
                    elit orci viverra ornare iaculis scelerisque ultricies. Faucibus
                    scelerisque ut aliquet gravida vehicula scelerisque vitae sit ac.
                    Leo rhoncus justo est dui placerat eros ac. Velit sed commodo quam
                    neque sed dolor eget viverra. Eget felis diam fringilla ut quis
                    scelerisque habitasse. Nec enim pellentesque in orci elit potenti
                    tincidunt quam. Tempor sagittis interdum nec tincidunt libero eu
                    a. Ultricies vulputate at venenatis ipsum consequat sed gravida
                    vitae convallis. Sit aenean in rhoncus ipsum quam augue ultricies
                    eu. Ac ornare dignissim in sodales. Eu nam laoreet laoreet nunc
                    morbi amet urna. Neque tincidunt enim ullamcorper nullam urna.
                    Etiam interdum posuere laoreet enim enim imperdiet. Purus viverra
                    in fusce interdum vel magna nibh sed urna. Viverra lectus nunc
                    molestie volutpat. Faucibus tortor semper sed pellentesque viverra
                    ut nunc. At etiam vulputate sodales ultrices aliquet.
                </p>

                <p>
                    Sem in vivamus aliquam non. Nibh tempus tristique ut suspendisse.
                    Convallis urna orci condimentum ut quam fames. Faucibus dolor
                    commodo sagittis sapien a amet sapien sed. Cras nec blandit sed
                    lectus enim feugiat facilisis dolor. Ultrices viverra nam volutpat
                    eget ut. Gravida lacus proin euismod etiam volutpat diam lacus.
                    Dui integer nulla rhoncus maecenas in eget. Neque in hendrerit in
                    arcu vulputate sed volutpat. Nisi pharetra ut at imperdiet sit
                    massa montes auctor. Praesent nibh et in in. Senectus sem massa
                    nisi iaculis ultricies ullamcorper ultrices. Lectus mi gravida
                    tellus est mauris donec et. Pharetra semper sit viverra fames diam
                    ultricies. In lorem commodo nunc nisi fusce sollicitudin lectus
                    vestibulum integer. Bibendum aliquet hac porttitor elit arcu metus
                    orci. Augue habitant pellentesque fusce blandit malesuada varius
                    gravida rhoncus diam. Diam nulla mi bibendum in luctus urna
                    blandit platea. Nunc orci neque ipsum varius. Nunc ornare at
                    vestibulum aliquam tortor ut. Maecenas purus consequat eget odio
                    viverra sed faucibus nec. Adipiscing ut mauris sit libero elit
                    sollicitudin vel volutpat at. Purus massa eu mattis vel mauris.
                </p>

                <p>
                    Molestie interdum cras sit non magna vitae purus cum. Nisi in
                    malesuada nunc eget id maecenas. Blandit porttitor quam tempus sed
                    at gravida urna. Egestas montes nibh aliquam luctus. Eu placerat
                    arcu libero viverra cras. Fermentum ullamcorper velit at
                    condimentum vulputate. Risus in vel commodo ultrices tellus
                    convallis. Sit malesuada tempus ultricies fringilla sit nunc
                    facilisi pretium. Felis aenean massa libero bibendum. Faucibus et
                    imperdiet enim diam viverra. Et egestas imperdiet tempor dictum
                    leo eu.<br /><br />

                    Sit suscipit neque mauris fames. Sit purus nullam in et. Massa
                    aliquet neque scelerisque sed vestibulum porta velit scelerisque.
                    Fames egestas congue vivamus nulla sit porta arcu ultrices.
                    Porttitor phasellus volutpat elit maecenas mauris molestie. Semper
                    in dui lectus fames ultrices erat. Sed arcu sit scelerisque
                    consequat amet. Consectetur purus tempus cras neque interdum arcu
                    magna feugiat vel.<br /><br />

                    Lacus molestie maecenas duis sit malesuada orci sed. Mauris augue
                    sodales lacus eget at nunc morbi in tellus. Quis mi venenatis in
                    tempor ultricies ridiculus. Vestibulum in mauris pellentesque
                    platea in. Massa sagittis non quam montes sagittis elementum.
                    Tellus amet morbi orci at aliquam. Consequat elementum scelerisque
                    amet sollicitudin id. Scelerisque consequat habitant velit
                    tincidunt nunc nulla habitant tristique at.<br /><br />
                </p>
            </article>
        </div>
        <!-- end article -->
        <!-- team info -->
        <div class="row d-flex justify-content-center">
            <div class="col-xl-2 col-md-3 col-sm-6">
                <div class="mt-5 rounded-circle-container">
                    <img
                        src="{{asset('publicPages/images/wellness-programs-profile.png')}}"
                        class="img-fluid"
                        alt="User-Profile-Image"
                    />
                </div>
            </div>
            <div class="col-xl-10 col-md-9 col-sm-6">
                <h4 class="fw-bold mt-5 pb-2">Amged S. El-Hawrani</h4>
                <p class="fs-4 fw-semibold mt-2 pb-2">
                    Lorem ipsum dolor sit amet consectetur. Pellentesque faucibus mi
                    feugiat tristique purus penatibus mauris nam libero. Non aliquam
                    varius at amet lorem lobortis netus vulputate. Semper purus turpis
                    vitae nunc urna sodales mauris. Vulputate sit est pharetra velit
                    eget.
                </p>
            </div>
        </div>
        <!-- team info -->
    </div>
@endsection
