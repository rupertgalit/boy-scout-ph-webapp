<main class="content">
   <div class="container-fluid p-0">
      <div class="row mb-2 mb-xl-3">
         <div class="col-auto d-none d-sm-block">
            <h3>Transactions Summary</h3>
         </div>

      </div>
      <div class="card">
         <div class="card-header">
            <h5 class="card-title">Filter</h5>
            <div class="row g-2 ml-3">
               <div class="col-auto">
                  <label for="startDate" class="form-label">Start Date</label>
                  <input type="date" class="form-control" id="startDate" placeholder="Start Date">
               </div>
               <div class="col-auto">
                  <label for="endDate" class="form-label">End Date</label>
                  <input type="date" class="form-control" id="endDate" placeholder="End Date">
               </div>
               <div class="col-auto">
                  <label for="statusSelect" class="form-label">Status</label>
                  <select class="form-select" id="statusSelect">
                     <option value="">All</option>
                     <option value="pending">Pending</option>
                     <option value="approved">Approved</option>
                     <option value="rejected">Rejected</option>
                  </select>
               </div>
               <div class="col-auto d-flex align-items-end">
                  <button class="btn btn-primary" id="filterBtn">Submit</button>
               </div>
            </div>
         </div>


         <table id="myTable" class="table table-hover">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Phone Number</th>
                  <th>Date of Birth</th>
                  <th>Date of Birth</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>Vanessa Tucker</td>
                  <td>864-348-0485</td>
                  <td>June 21, 1961</td>
                  <td>June 21, 1961</td>
                  <td class="table-action">
                     <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle">
                           <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                        </svg></a>
                     <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle">
                           <polyline points="3 6 5 6 21 6"></polyline>
                           <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        </svg></a>
                  </td>
               </tr>
               <tr>
                  <td>William Harris</td>
                  <td>914-939-2458</td>
                  <td>May 15, 1948</td>
                  <td>May 15, 1948</td>
                  <td class="table-action">
                     <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle">
                           <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                        </svg></a>
                     <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle">
                           <polyline points="3 6 5 6 21 6"></polyline>
                           <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        </svg></a>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
   jQuery(document).ready(function($) {
      var table = $('#myTable').DataTable({
         scrollX: true,
         searching: true,
         responsive: false,
         autoWidth: false,
         dom: 'Bfrtip',
      });
      $(window).on('resize', function() {
         table.columns.adjust();
      });
   });
</script>