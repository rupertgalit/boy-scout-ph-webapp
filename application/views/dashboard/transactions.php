<main class="content">
   <div class="container-fluid p-0">
      <div class="row mb-3 mb-xl-4">
         <div class="col-auto">
            <h3 class="mb-0">Transactions</h3>
         </div>

      </div>

      <div class="card border-0 shadow-sm">
         <div class="card-header bg-white ">
            <div class="row ">
               <div class="col-auto">
                  <h5 class="card-title ">Filters</h5>
               </div>
               <div class="col-auto ms-auto">
                  <button class="btn btn-outline-primary" id="exportBtn">
                     <i class="fas fa-download me-2"></i>Export CSV
                  </button>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="row align-items-end">
               <div class="col-md-3 ">
                  <label for="startDate" class="form-label small fw-semibold text-muted">Start Date</label>
                  <div class="input-group">
                     <span class="input-group-text"><i class="far fa-calendar"></i></span>
                     <input type="date" class="form-control" id="startDate">
                  </div>
               </div>
               <div class="col-md-3 ">
                  <label for="endDate" class="form-label small fw-semibold text-muted">End Date</label>
                  <div class="input-group">
                     <span class="input-group-text"><i class="far fa-calendar"></i></span>
                     <input type="date" class="form-control" id="endDate">
                  </div>
               </div>
               <div class="col-md-3 col-lg-2">
                  <label for="statusSelect" class="form-label small fw-semibold text-muted">Status</label>
                  <select class="form-select" id="statusSelect">
                     <option value="">All Status</option>
                     <option value="approved">Approved</option>
                     <option value="pending">Pending</option>
                     <option value="rejected">Rejected</option>
                  </select>
               </div>

               <div class="col-md-6 col-lg-2 d-flex gap-2">
                  <button class="btn btn-primary flex-fill" id="filterBtn">
                     <i class="fas fa-filter me-2"></i>Apply Filters
                  </button>
               </div>
            </div>
         </div>

         <div class="card-body pt-0">
            <div class="table-responsive">
               <table id="myTable" class="table table-hover table-striped align-middle" style="width:100%">
                  <thead class="table-light">
                     <tr>
                        <th>Reference #</th>
                        <th>Status</th>
                        <th>Full Name</th>
                        <th>Mobile #</th>
                        <th>Email</th>
                        <th>Council</th>
                        <th>District</th>
                        <th>Sub-district</th>
                        <th>School</th>
                        <th>Description</th>
                        <th>Scout Level</th>
                        <th>Category</th>
                        <th>Created date</th>
                        <th>Modified date</th>
                        <th>Destination</th>
                        <th>Transaction #</th>
                        <th>Amount</th>
                        <th>Fees</th>
                        <th>Total</th>
                        <th>Remarks</th>
                     </tr>
                  </thead>
                  <tbody>
                     
                  </tbody>

               </table>
            </div>
         </div>
      </div>
   </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
   jQuery(document).ready(function ($) {
      var table = $('#myTable').DataTable({
         scrollX: true,
         searching: true,
         responsive: false,
         autoWidth: false,
         dom: 'Bfrtip',
      });
      $(window).on('resize', function () {
         table.columns.adjust();
      });
   });
</script>
