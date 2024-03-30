<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <!---------------------------------------/////////////Side Bar/////////////---------------------------------------->

      <!-------------------------------------------------users category-------------------------------------------------->
      <li class="nav-item nav-category">Users</li>
      <li class="nav-item">
        <!-----Admin sub-category--------->
        <a
          class="nav-link"
          data-bs-toggle="collapse"
          href="#admin-basic"
          aria-expanded="false"
          aria-controls="admin-basic"
        >
          <i class="menu-icon mdi mdi-account-outline"></i>
          <span class="menu-title">Admin</span>
          <i class="menu-arrow"></i>
        </a>
        <!--sub-subcategories-->
        <div class="collapse" id="admin-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="pages/users/add-admin-form.html"
                >Add Admin</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/users/admins-table.html"
                >Admins</a
              >
            </li>
          </ul>
        </div>
        <!-----Author sub-category--------->
        <a
          class="nav-link"
          data-bs-toggle="collapse"
          href="#auther-basic"
          aria-expanded="false"
          aria-controls="auther-basic"
        >
          <i class="menu-icon mdi mdi-account-file-text-outline"></i>
          <span class="menu-title">author</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auther-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="pages/users/add-author.html"
                >Add Author</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/users/authors.html"
                >Authors</a
              >
            </li>
          </ul>
        </div>
        <!-----Job Seeker sub-category--------->
        <a
          class="nav-link"
          href="pages/users/job-seekers.html"
          aria-expanded="false"
          aria-controls="job-seek-basic"
        >
          <i class="menu-icon mdi mdi-account-tie-outline"></i>
          <span class="menu-title">Job Seeker</span>
          <i class="menu-arrow"></i>
        </a>
        <!-----Job Seeker sub-category--------->
        <a
          class="nav-link"
          href="pages/users/employers.html"
          aria-expanded="false"
          aria-controls="emp-basic"
        >
          <i class="menu-icon mdi mdi-account-tie"></i>
          <span class="menu-title">Employer</span>
          <i class="menu-arrow"></i>
        </a>
      </li>
      <!-----------------------------------------------Articles category------------------------------------------------->
      <li class="nav-item nav-category">Articles</li>
      <li class="nav-item">
        <a
          class="nav-link"
          href="pages/articles/category_form.html"
          aria-expanded="false"
          aria-controls="charts"
        >
          <i class="menu-icon mdi mdi-folder-plus-outline"></i>
          <span class="menu-title">Add Category</span>
          <i class="menu-arrow"></i>
        </a>
      </li>
      <!-------------------------->
      <li class="nav-item">
        <a
          class="nav-link"
          href="pages/articles/categories.html"
          aria-expanded="false"
          aria-controls="charts"
        >
          <i class="menu-icon mdi mdi-folder-multiple-outline"></i>
          <span class="menu-title">Categories</span>
          <i class="menu-arrow"></i>
        </a>
      </li>
      <!-------------------------->
      <li class="nav-item">
        <a
          class="nav-link"
          href="pages/articles/tag_form.html"
          aria-expanded="false"
          aria-controls="tables"
        >
          <i class="menu-icon mdi mdi-table-plus"></i>
          <span class="menu-title">Add Tag</span>
          <i class="menu-arrow"></i>
        </a>
      </li>
      <!-------------------------->
      <li class="nav-item">
        <a
          class="nav-link"
          href="pages/articles/tags.html"
          aria-expanded="false"
          aria-controls="tags"
        >
          <i class="menu-icon mdi mdi-table-multiple"></i>
          <span class="menu-title">Tags</span>
          <i class="menu-arrow"></i>
        </a>
      </li>
      <!---------------------------->
      <li class="nav-item">
        <a
          class="nav-link"
          href="pages/articles/add-article-form.html"
          aria-expanded="false"
          aria-controls="icons"
        >
          <i class="menu-icon mdi mdi-file-document-plus-outline"></i>
          <span class="menu-title">Add Article</span>
          <i class="menu-arrow"></i>
        </a>
      </li>
      <!--------------------------->
      <li class="nav-item">
        <a
          class="nav-link"
          href="pages/articles/articles.html"
          aria-expanded="false"
          aria-controls="icons"
        >
          <i class="menu-icon mdi mdi-file-document-multiple-outline"></i>
          <span class="menu-title">Articles</span>
          <i class="menu-arrow"></i>
        </a>
      </li>
      <!------------------------------------------------Event Category--------------------------------------------------->
      <li class="nav-item nav-category">Event</li>
      <li class="nav-item">
        <a
          class="nav-link"
          href="pages/events/add-event.html"
          aria-expanded="false"
          aria-controls="auth"
        >
          <i class="menu-icon mdi mdi-calendar-plus"></i>
          <span class="menu-title">Add Event</span>
          <i class="menu-arrow"></i>
        </a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link"
          href="pages/events/events.html"
          aria-expanded="false"
          aria-controls="auth"
        >
          <i class="menu-icon mdi mdi-calendar-multiple"></i>
          <span class="menu-title">Events</span>
          <i class="menu-arrow"></i>
        </a>
      </li>
      <!---------------------------------------------------Jobs Category------------------------------------------------->
      <li class="nav-item nav-category">Jobs</li>
      <li class="nav-item">
        <a
          class="nav-link"
          href="pages/jobs/add_category_form.html"
          aria-expanded="false"
          aria-controls="auth"
        >
          <i class="menu-icon mdi mdi-earth-box-plus"></i>
          <span class="menu-title">Add Categories</span>
          <i class="menu-arrow"></i>
        </a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link"
          href="pages/jobs/categories.html"
          aria-expanded="false"
          aria-controls="auth"
        >
          <i class="menu-icon mdi mdi-earth-box"></i>
          <span class="menu-title">Categories</span>
          <i class="menu-arrow"></i>
        </a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link"
          href="pages/jobs/jobs.html"
          aria-expanded="false"
          aria-controls="auth"
        >
          <i class="menu-icon mdi mdi-briefcase"></i>
          <span class="menu-title">Jobs</span>
          <i class="menu-arrow"></i>
        </a>
      </li>
      <!------------------------------------------------------------------------------------------->
      <li class="nav-item nav-category">help</li>
      <li class="nav-item">
        <a
          class="nav-link"
          href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html"
        >
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>