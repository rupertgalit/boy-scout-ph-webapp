<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function () {
    $('#scoutTable').DataTable({
      pageLength: 5,
      lengthMenu: [5, 10, 25, 50],
      info: true,
      searching: false,
      lengthChange: false,
      scrollX: true,
      responsive: true,
      autoWidth: false
    });
  });
  (function () {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');
    const overlay = document.getElementById('overlay');

    // helper
    function isMobile() {
      return window.innerWidth < 768;
    }

    function initDropdowns() {
      document.querySelectorAll('.dropdown-toggle').forEach(dropdown => {
        const existing = bootstrap.Dropdown.getInstance(dropdown);
        if (existing) existing.dispose();

        if (isMobile()) {
          dropdown.setAttribute('data-bs-display', 'static');
        } else {
          dropdown.removeAttribute('data-bs-display');
        }

        new bootstrap.Dropdown(dropdown, {
          autoClose: true,
          popperConfig: isMobile() ? { strategy: 'fixed' } : {
            modifiers: [
              { name: 'preventOverflow', options: { boundary: 'viewport' } },
              { name: 'flip', options: { fallbackPlacements: ['bottom', 'top'] } }
            ]
          }
        });
      });
    }

    // control sidebar + overlay
    function setSidebarState(collapse) {
      if (isMobile()) {
        if (collapse) {
          sidebar.classList.add('collapsed');
          overlay.classList.remove('active');
        } else {
          sidebar.classList.remove('collapsed');
          overlay.classList.add('active');
        }
      } else {
        if (collapse) {
          sidebar.classList.add('collapsed');
        } else {
          sidebar.classList.remove('collapsed');
        }
        overlay.classList.remove('active');
      }
      // slight delay for DOM update
      setTimeout(initDropdowns, 15);
    }

    function toggleSidebar() {
      if (isMobile()) {
        if (sidebar.classList.contains('collapsed')) {
          setSidebarState(false); // open
        } else {
          setSidebarState(true);  // close
        }
      } else {
        if (sidebar.classList.contains('collapsed')) {
          setSidebarState(false);
        } else {
          setSidebarState(true);
        }
      }
    }

    // initial state
    if (isMobile()) {
      setSidebarState(true);   // start collapsed on mobile
    } else {
      setSidebarState(false);  // expanded on desktop
    }

    // toggle click
    toggleBtn.addEventListener('click', (e) => {
      e.preventDefault();
      toggleSidebar();
    });

    // overlay closes sidebar on mobile
    overlay.addEventListener('click', () => {
      if (isMobile()) setSidebarState(true);
    });

    // resize event
    window.addEventListener('resize', () => {
      if (!isMobile()) {
        overlay.classList.remove('active');
      } else {
        // if sidebar open on mobile, overlay should be active
        if (!sidebar.classList.contains('collapsed')) {
          overlay.classList.add('active');
        }
      }
      initDropdowns();
    });

    document.addEventListener('shown.bs.dropdown', () => { });

    const observer = new MutationObserver(() => initDropdowns());
    observer.observe(sidebar, { attributes: true, attributeFilter: ['class'] });

    // first init
    initDropdowns();
  })();
</script>
</body>

</html>