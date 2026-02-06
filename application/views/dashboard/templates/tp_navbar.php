      <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
          <a class="sidebar-toggle js-sidebar-toggle">
            <i class="hamburger align-self-center"></i>
          </a>
          <span class="me-2">
                    <strong><?= $this->session->userdata('usertype'); ?> </strong></span>
                </a>

          <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
              <li class="nav-item dropdown"></li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle d-flex align-items-center"
                  href="#"
                  id="userDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <span class="me-2">
                    Welcome, <strong><?= $this->session->userdata('name'); ?> </strong></span>
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-end"
                  aria-labelledby="userDropdown">
                  <li>
                    <a class="dropdown-item" href="/logout">
                      <i data-feather="log-out" class="me-2"></i>
                      Log out
                    </a>
                  </li>

                </ul>
              </li>
            </ul>
          </div>
        </nav>