<!-- breadcrumb -->
<section id="nav-author" class="bg-dark text-light py-3">
    <div class="container-fluid ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-light">
                    <a class="text-light text-decoration-none" href="home.html"
                    >Home</a
                    >
                </li>
                <li class="breadcrumb-item active text-light" aria-current="page">
                    @yield('category')
                </li>
            </ol>
        </nav>
        <h2 class="fs-2 fw-bold">@yield('subCategory')</h2>
        <p class="text-white-50 mb-0 fs-4">@yield('createdDate')</p>
    </div>
</section>
<!-- end breadcrumb -->
