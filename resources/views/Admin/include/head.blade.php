<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Admin Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/vendors/feather/feather.css')}}" />
    <link
      rel="stylesheet"
      href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}"
    />
    <link
      rel="stylesheet"
      href="{{asset('admin/vendors/ti-icons/css/themify-icons.css')}}"
    />
    <link rel="stylesheet" href="{{asset('admin/vendors/typicons/typicons.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
    <link
      rel="stylesheet"
      href="{{asset('admin/vendors/simple-line-icons/css/simple-line-icons.css')}}"
    />
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link
      rel="stylesheet"
      href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="{{asset('admin/js/select.dataTables.min.css')}}"

    />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin/css/vertical-layout-light/style.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/css/vertical-layout-light/style2.css')}}" />
    <link rel="stylesheet" href="{{ asset('admin/css/custom-add-article.css') }}" />

    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
      crossorigin=""
    />
    <script
      src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
      integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
      crossorigin=""
    ></script>

    <script>
        let messages = {};

        @if(session('messages'))
            messages = {!! session('messages') !!};
        @endif

    </script>

    <!-- endinject -->
  </head>
