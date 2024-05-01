@extends('publicPages.layouts.main')

@section('category')
    {{$categoryData->articleCategoryName}}
@endsection
@section('subCategory')
    {{$categoryData->subCategory}}
@endsection
@section('createdDate')
    Thursday Dec 12 2023
@endsection

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
                src="{{asset('publicPages/images/DEI-image-header.png')}}"
                class="rounded image-center"
                alt="DEI-header-img"
            />
        </div>
        <!-- article -->
        <div class="mx-auto" style="max-width: 1225px">
            <article>
                <p>
                    Lorem ipsum dolor sit amet consectetur. Est maecenas tellus nulla
                    sed pulvinar fringilla accumsan quam. Orci lectus ornare nisi et
                    aliquet vitae nisl. Ultrices in bibendum pellentesque a pharetra
                    lacus ante fermentum dui. Vestibulum vitae eget hendrerit
                    tristique. Sagittis et viverra arcu maecenas tristique libero elit
                    egestas at. Scelerisque bibendum quam interdum lobortis
                    consectetur. Nam pulvinar senectus aliquam tincidunt malesuada.
                    Cursus faucibus venenatis metus non sem. Aliquet magna molestie
                    mus semper scelerisque nisl amet faucibus nibh. Lectus commodo
                    quam leo elementum. Proin id commodo ipsum ut sagittis nec nisi.
                    Adipiscing ullamcorper nulla et malesuada. Sollicitudin curabitur
                    eros vitae fusce quam fringilla in.
                </p>

                <h2 class="fs-1">Title 1</h2>
                <p>
                    Molestie interdum cras sit non magna vitae purus cum. Nisi in
                    malesuada nunc eget id maecenas. Blandit porttitor quam tempus sed
                    at gravida urna. Egestas montes nibh aliquam luctus. Eu placerat
                    arcu libero viverra cras. Fermentum ullamcorper velit at
                    condimentum vulputate. Risus in vel commodo ultrices tellus
                    convallis. Sit malesuada tempus ultricies fringilla sit nunc
                    facilisi pretium. Felis aenean massa libero bibendum. Faucibus et
                    imperdiet enim diam viverra. Et egestas imperdiet tempor dictum
                    leo eu.
                </p>

                <p>
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
                    velit tincidunt nunc nulla habitant tristique at. Commodo in nisi
                    vel ornare egestas in donec. In pharetra nibh platea odio. Duis
                    lectus malesuada integer massa in integer risus dis. Facilisi
                    integer tristique sed eu. Mi a posuere enim etiam viverra non. Dui
                    neque turpis sed leo pharetra ultrices. A neque elit orci viverra
                    ornare iaculis scelerisque ultricies. Faucibus scelerisque ut
                    aliquet gravida vehicula scelerisque vitae sit ac. Leo rhoncus
                    justo est dui placerat eros ac. Velit sed commodo quam neque sed
                    dolor eget viverra. Eget felis diam fringilla ut quis scelerisque
                    habitasse. Nec enim pellentesque in orci elit potenti tincidunt
                    quam. Tempor sagittis interdum nec tincidunt libero eu a.
                    Ultricies vulputate at venenatis ipsum consequat sed gravida vitae
                    convallis. Sit aenean in rhoncus ipsum quam augue ultricies eu. Ac
                    ornare dignissim in sodales. Eu nam laoreet laoreet nunc morbi
                    amet urna.
                </p>

                <p>
                    Neque tincidunt enim ullamcorper nullam urna. Etiam interdum
                    posuere laoreet enim enim imperdiet. Purus viverra in fusce
                    interdum vel magna nibh sed urna. Viverra lectus nunc molestie
                    volutpat. Faucibus tortor semper sed pellentesque viverra ut nunc.
                    At etiam vulputate sodales ultrices aliquet. Sem in vivamus
                    aliquam non. Nibh tempus tristique ut suspendisse. Convallis urna
                    orci condimentum ut quam fames. Faucibus dolor commodo sagittis
                    sapien a amet sapien sed. Cras nec blandit sed lectus enim feugiat
                    facilisis dolor. Ultrices viverra nam volutpat eget ut. Gravida
                    lacus proin euismod etiam volutpat diam lacus. Dui integer nulla
                    rhoncus maecenas in eget. Neque in hendrerit in arcu vulputate sed
                    volutpat. Nisi pharetra ut at imperdiet sit massa montes auctor.
                    Praesent nibh et in in. Senectus sem massa nisi iaculis ultricies
                    ullamcorper ultrices. Lectus mi gravida tellus est mauris donec
                    et. Pharetra semper sit viverra fames diam ultricies. In lorem
                    commodo nunc nisi fusce sollicitudin lectus vestibulum integer.
                    Bibendum aliquet hac porttitor elit arcu metus orci. Augue
                    habitant pellentesque fusce blandit malesuada varius gravida
                    rhoncus diam. Diam nulla mi bibendum in luctus urna blandit
                    platea. Nunc orci neque ipsum varius. Nunc ornare at vestibulum
                    aliquam tortor ut. Maecenas purus consequat eget odio viverra sed
                    faucibus nec. Adipiscing ut mauris sit libero elit sollicitudin
                    vel volutpat at. Purus massa eu mattis vel mauris. Fusce fermentum
                    non leo pharetra at in auctor. Diam est non semper ipsum diam. Nec
                    pretium habitasse tristique risus quis. Sociis aliquet nec
                    tristique in arcu at lobortis. Id pharetra feugiat id eget
                    accumsan tellus. Bibendum purus dictum gravida lobortis non.
                    Tellus hendrerit pellentesque fermentum in placerat amet. Id
                    libero justo massa ut quis ultrices. Pretium vel in ut
                    pellentesque vel fusce. fermentum cras varius ornare tempor
                    integer varius et. Sodales porttitor tincidunt velit viverra
                    semper semper. At pharetra at phasellus nisl gravida curabitur.
                    Feugiat diam lectus diam tortor cursus. Etiam at cursus sapien ut
                    id. At enim pretium arcu faucibus fringilla lacus iaculis amet.
                    Consequat consequat ultrices vitae ipsum. Integer enim quam eu a
                    tellus adipiscing orci. Suspendisse pulvinar pellentesque risus
                    velit quis lobortis magna. Porttitor vitae mauris faucibus tempus
                    ultrices fames non congue. Turpis etiam volutpat accumsan aenean
                    aliquam posuere bibendum sed blandit. Elementum sem elementum dui
                    quis. Faucibus scelerisque amet vulputate vitae senectus sit et
                    adipiscing nulla. A maecenas at commodo aliquet facilisi tellus
                    maecenas non vel. Lobortis sed dolor id nisi nibh tincidunt.
                    Egestas nunc turpis volutpat viverra nec aliquam sapien nunc.
                    Scelerisque est pretium vitae dui placerat scelerisque. Mi fames
                    velit et facilisis. In vulputate sit nunc massa lacus pellentesque
                    sit sit. Faucibus morbi mauris nulla magna neque feugiat id.
                    Sodales a cum quis nullam sed aenean morbi ultricies. Nisl viverra
                    aliquet imperdiet ultrices rhoncus vitae. Duis sit dignissim
                    sagittis aliquet et molestie tempor. Sed enim sed molestie duis
                    ligula ultricies vitae orci. Sem adipiscing sit malesuada sit.
                    Convallis interdum eu tincidunt sit. Rutrum suspendisse sem nunc
                    in faucibus dictum. Ullamcorper netus elementum tortor tempor.
                    Commodo habitant sit enim viverra. Viverra et duis eget accumsan.
                    Semper a faucibus convallis sed. Netus id tellus semper arcu ut
                    sed. Risus ullamcorper in sit fusce. Magna id interdum at mauris.
                    Eu mi ut non pellentesque viverra mauris arcu. Nulla libero
                    pulvinar dignissim tellus. Fames cursus ultrices quis augue vitae
                    consectetur augue. Massa nisl amet turpis arcu id. Auctor vitae
                    praesent sit eros fames eu. Egestas interdum sed libero viverra
                    proin sem facilisi lorem viverra
                </p>
            </article>
        </div>
        <!-- team info -->
        <div class="row d-flex justify-content-center">
            <div class="col-xl-2 col-md-3 col-sm-12">
                <div class="mt-5 rounded-circle-container">
                    <img
                        src="{{asset('publicPages/images/DEI-image-profile.png')}}"
                        class="img-fluid"
                        alt="User-Profile-Image"
                    />
                </div>
            </div>
            <div class="col-xl-10 col-md-9 col-sm-12">
                <h4 class="fw-bold mt-5 pb-2">Nadia S. El-Hawrani</h4>
                <p class="fs-4 fw-semibold mt-2 pb-2">
                    Lorem ipsum dolor sit amet consectetur. Pellentesque faucibus mi
                    feugiat tristique purus penatibus mauris nam libero. Non aliquam
                    varius at amet lorem lobortis netus vulputate. Semper purus turpis
                    vitae nunc urna sodales mauris. Vulputate sit est pharetra velit
                    eget.
                </p>
            </div>
        </div>
    </div>

    {{--    if article has comment section --}}
    @include('publicPages.includes.commentSection')
    <!-- end container-->
@endsection
