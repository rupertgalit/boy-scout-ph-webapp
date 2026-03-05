<div class="overlay" id="overlay"></div>
<div class="wrapper">
  <!-- SIDEBAR with Register Unit dropdown -->
  <nav class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <h3>
        <i class="fas fa-fleur-de-lis"></i>
        <span>BSP <span style="font-size: 0.7rem; font-weight: 300">| council</span></span>
      </h3>
    </div>
    <ul class="nav flex-column mt-2">
      <li class="nav-item">
        <a class="nav-link" href="/landing">
          <i class="fas fa-tachometer-alt"></i> 
          <span class="nav-text">Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-users"></i> 
          <span class="nav-text">Letter to the Parent</span>
        </a>
      </li>

      <!-- Register Unit with dropdown - FIXED with ellipsis -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle d-flex align-items-center" 
           href="#" 
           id="registerUnitDropdown" 
           role="button" 
           data-bs-toggle="dropdown" 
           aria-expanded="false">
          <i class="fas fa-calendar-alt"></i> 
          <span class="nav-text flex-grow-1 text-truncate">Register Unit</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="registerUnitDropdown">
          <li>
            <a class="dropdown-item" href="#">
              <i class="fas fa-plus-circle me-2"></i>
              <span class="text-truncate d-inline-block" style="max-width: 180px;">Application for Unit Registration</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="#">
              <i class="fas fa-pen-fancy me-2"></i>
              <span class="text-truncate d-inline-block" style="max-width: 180px;">Application for Additional Scout Registration</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-tasks"></i>
          <span class="nav-text">Account Registration - Scout</span>
        </a>
      </li>
    </ul>
  </nav>