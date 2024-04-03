<!DOCTYPE html>
<html lang="en">
@include('Admin.include.head')

  <body class="with-welcome-text">
    <div class="container-scroller">
      <!-- banner start -->
      <div class="row p-0 m-0 proBanner d-flex" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div
            class="card-body card-body-padding px-3 d-flex align-items-center justify-content-between"
          >
            <div class="ps-lg-3">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">
                  HR Magazine Admin Dashboard
                </p>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="#"><i class="ti-home me-3 text-white"></i></a>
            </div>
          </div>
        </div>
      </div>
      <!--  banner end -->
      
      <!-- navbar start -->
    @include('Admin.include.navbar')
      <!-- navbar end -->

      <div class="container-fluid page-body-wrapper pt-0">

        <!-- theme setting panel start  -->
        @include("Admin.include.theme")
        <!-- theme setting panel end  -->
        
        <!-- sidebar start -->
        @include("Admin.include.sidebar")
        <!-- sidebar end -->
        <div class="main-panel">

          <!-- main part start -->
          @yield('Content')
          <!-- main-panel ends -->
        @include("Admin.include.footer")
          <!-- partial -->
        </div>

      </div>
    </div>
    
    <!-- container-scroller -->

   @include("Admin.include.footerJs")
   @yield('js')
  </body>
</html>
