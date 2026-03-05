
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      (function () {
        const sidebar = document.getElementById("sidebar");
        const toggleBtn = document.getElementById("sidebarToggle");
        const overlay = document.getElementById("overlay");
        const isMobile = () => window.innerWidth < 768;

        toggleBtn.addEventListener("click", function (e) {
          e.preventDefault();
          if (isMobile()) {
            sidebar.classList.toggle("collapsed");
            overlay.classList.toggle(
              "active",
              !sidebar.classList.contains("collapsed"),
            );
          } else {
            sidebar.classList.toggle("collapsed");
          }
        });

        overlay.addEventListener("click", function () {
          if (isMobile()) {
            sidebar.classList.add("collapsed");
            overlay.classList.remove("active");
          }
        });

        if (isMobile()) {
          sidebar.classList.add("collapsed");
        }

        // Reinitialize dropdowns to work with dynamic classes
        var dropdownElementList = [].slice.call(
          document.querySelectorAll(".dropdown-toggle"),
        );
        dropdownElementList.map(function (dropdownToggleEl) {
          return new bootstrap.Dropdown(dropdownToggleEl, { autoClose: true });
        });
      })();
    </script>
  </body>
</html>
