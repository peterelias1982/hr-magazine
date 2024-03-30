<nav
class="navbar default-layout col-lg-12 col-12 p-0 d-flex align-items-top flex-row pt-5 mt-3"
>
<div
  class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start"
>
  <div class="me-3">
    <button
      class="navbar-toggler navbar-toggler align-self-center"
      type="button"
      data-bs-toggle="minimize"
    >
      <span class="icon-menu"></span>
    </button>
  </div>
  <div>
    <a class="navbar-brand brand-logo" href="index.html">
      <img src="{{asset('admin/images/hr-logo.svg')}}" alt="logo" />
    </a>
    <a class="navbar-brand brand-logo-mini" href="index.html">
      <img src="{{asset('admin/images/logo-hr-mini.svg')}}" alt="logo" />
    </a>
  </div>
</div>
<div class="navbar-menu-wrapper d-flex align-items-top">
  <ul class="navbar-nav">
    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
      <h1 class="welcome-text">
        Good Morning,
        <span class="text-black fw-bold" id="userName"></span>
      </h1>
      <h3 class="welcome-sub-text w-75" id="quote"></h3>
    </li>
  </ul>

  <ul class="navbar-nav ms-auto">
    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
      <a
        class="nav-link"
        id="UserDropdown"
        href="#"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        <img
          class="img-xs rounded-circle"
          src="{{asset('admin/images/avatar-default.svg')}}"
          alt="Profile image"
        />
      </a>
      <div
        class="dropdown-menu dropdown-menu-right navbar-dropdown"
        aria-labelledby="UserDropdown"
      >
        <div class="dropdown-header text-center">
          <img
            class="img-md rounded-circle"
            src="{{asset('admin/images/avatar-default.svg')}}"
            alt="Profile image"
            width="80"
            height="80"
          />
          <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
          <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
        </div>
        <a class="dropdown-item"
          ><i
            class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"
          ></i>
          My Profile
          <span class="badge badge-pill badge-danger">1</span></a
        >
        
        <a class="dropdown-item"
          ><i
            class="dropdown-item-icon mdi mdi-power text-primary me-2"
          ></i
          >Sign Out</a
        >
        <p
          class="footer"
          style="padding-top: 15px; font-size: 9px; text-align: center"
        >
          Privacy Policy . Terms . Cookies
        </p>
      </div>
    </li>
  </ul>
  <button
    class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
    type="button"
    data-bs-toggle="offcanvas"
  >
    <span class="mdi mdi-menu"></span>
  </button>
</div>
</nav>