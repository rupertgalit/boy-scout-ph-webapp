<main class="content">
   <div class="container-fluid p-0">
      <div class="row mb-2 mb-xl-3">
         <div class="col-auto d-none d-sm-block">
            <h3>Transactions</h3>
         </div>

      </div>
      <div class="card">
         <div class="card-header">
            <h5 class="card-title">Filter</h5>
            <form action="/transactions" method="POST">
               <div class="row g-2 ml-3">
                  <div class="col-auto">
                     <label for="startDate" class="form-label">Start Date</label>
                     <input type="date" class="form-control" name="date-from" id="startDate"
                        placeholder="Start Date">
                  </div>

                  <div class="col-auto">
                     <label for="endDate" class="form-label">End Date</label>
                     <input type="date" class="form-control" name="date-to" id="endDate"
                        value=""
                        placeholder="End Date">
                  </div>
                  <div class="col-auto">
                     <label for="statusSelect" class="form-label">Status</label>
                     <select class="form-select" id="statusSelect" name="status">

                        <option value="ALL">ALL</option>

                     </select>

                  </div>







                  <div class="col-auto d-flex align-items-end">
                     <button type="submit" class="btn btn-primary" id="filterBtn">Submit</button>
                  </div>
               </div>
            </form>
            <div class="col-auto mt-4">
               <div id="exportButtonsContainer"></div>
            </div>
         </div>



         <table id="myTable" class="table table-hover">
            <thead>
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
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>REF-2026-00123</td>
                  <td><span class="badge bg-success">Success</span></td>
                  <td>Juan Dela Cruz</td>
                  <td>09171234567</td>
                  <td>juan.delacruz@email.com</td>
                  <td>Metro Manila Council</td>
                  <td>District 1</td>
                  <td>Sub-district A</td>
                  <td>Rizal High School</td>
                  <td>Registration payment</td>
                  <td>Senior Scout</td>
                  <td>Membership</td>
                  <td>2026-01-10</td>
                  <td>2026-01-12</td>
                  <td>National HQ</td>
                  <td>TXN-987654321</td>
                  <td>₱1,000.00</td>
                  <td>₱50.00</td>
                  <td>₱1,050.00</td>
                  <td>Paid in full</td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<script>
   jQuery(document).ready(function($) {

      var table = $('#myTable').DataTable({
         scrollX: true,
         searching: true,
         responsive: false,
         autoWidth: false,
         dom: 'Bfrtip',
         buttons: [{
               extend: 'csvHtml5',
            },
            {
               extend: 'excelHtml5',
            },
            {
               extend: 'print',
            }
         ],
         initComplete: function() {
            var api = this.api();
            api.buttons().container().appendTo('#exportButtonsContainer');
            if (api.data().count() === 0) {
               api.buttons().disable();
            } else {
               api.buttons().enable();
            }
         }
      });

      $(window).on('resize', function() {
         table.columns.adjust();
      });

      const today = new Date().toISOString().split('T')[0];
      if (!$('#startDate').val()) {
         $('#startDate').val(today);
      }
      if (!$('#endDate').val()) {
         $('#endDate').val(today);
      }
   });
</script>