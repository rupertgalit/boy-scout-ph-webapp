     <nav id="sidebar" class="sidebar js-sidebar">
       <div class="sidebar-content js-simplebar">
           <a class="sidebar-brand d-block text-center" href="/">
           <img class="img-fluid" src="/assets/images/boyscouts_logofinal.png" width="90" alt="NGSI Logo">
           <span class="d-block mt-2">SCOUTS Dashboard Monitoring</span>
         </a>

         <ul class="sidebar-nav">
           <li class="sidebar-header">Navigation</li>
           <li class="sidebar-item">
             <a class="sidebar-link" href="/dashboard">
               <i class="align-middle" data-feather="sliders"></i>
               <span class="align-middle">Dashboard</span>
             </a>
           </li>
           <li class="sidebar-item">
             <a
               data-bs-target="#pages"
               data-bs-toggle="collapse"
               class="sidebar-link collapsed">
               <i class="align-middle" data-feather="layout"></i>
               <span class="align-middle">Tables</span>
             </a>
             <ul
               id="pages"
               class="sidebar-dropdown list-unstyled collapse"
               data-bs-parent="#sidebar">
               <li class="sidebar-item">
                 <a class="sidebar-link" href="/transactions">Transactions</a>
               </li>
               <li class="sidebar-item">
                 <a class="sidebar-link" href="/transactions-summary">Transactions Summary </a>
               </li>
               <li class="sidebar-item">
                 <a class="sidebar-link" href="/blank-page">Blank Page </a>
               </li>
             </ul>
           </li>

           <li class="sidebar-item">
             <a class="sidebar-link" href="/accounts">
               <i class="align-middle" data-feather="users"></i>
               <span class="align-middle">Accounts</span>
             </a>
           </li>

         </ul>
       </div>
     </nav>

     <script>
       document.addEventListener("DOMContentLoaded", function() {
         const currentPath = window.location.pathname;
         document.querySelectorAll(".sidebar-item a.sidebar-link").forEach((link) => {
           if (link.getAttribute("href") === currentPath) {
             const listItem = link.closest(".sidebar-item");
             if (listItem) {
               listItem.classList.add("active");
             }
             const dropdown = link.closest(".sidebar-dropdown");
             if (dropdown) {
               dropdown.classList.add("show");
               const parentToggle = dropdown.previousElementSibling;
               if (parentToggle && parentToggle.classList.contains("collapsed")) {
                 parentToggle.classList.remove("collapsed");
               }
               const parentItem = dropdown.closest(".sidebar-item");
               if (parentItem) {
                 parentItem.classList.add("active");
               }
             }
           }
         });
       });
     </script>