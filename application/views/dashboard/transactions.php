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
                        <option value="SUCCESS">SUCCESS</option>
                        <option value="PENDING">PENDING</option>
                        <option value="FAILED">FAILED</option>

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
                  <th>#</th>
                  <th>Reference #</th>
                  <th>Full Name</th>
                  <th>Status</th>
                  <th>Amount</th>
                  <th>Fees</th>
                  <th>Txn Amount</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Scout Level</th>
                  <th>School</th>
                  <th>Sub District</th>
                  <th>District</th>
                  <th>Council</th>
                  <th>Scout Level</th>
                  <th>Created</th>
                  <th>Modified</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Payment For</th>

               </tr>
               </tr>
            </thead>
            <tbody>

               <?php if (!empty($transactions)): ?>

                  <?php $i = 1;
                  foreach ($transactions as $row): ?>

                     <?php

                     $badge = 'secondary';

                     switch (strtoupper($row['status'])) {
                        case 'PENDING':
                           $badge = 'warning';
                           break;
                        case 'SUCCESS':
                           $badge = 'success';
                           break;
                        case 'FAILED':
                           $badge = 'danger';
                           break;
                     }

                     $amount     = number_format($row['amount'], 2);
                     $fee        = number_format($row['ngsi_fee'], 2);
                     $txn_amount = number_format($row['txn_amount'], 2);
                     ?>

                     <tr>
                        <td><?= $i++; ?></td>

                        <td><?= htmlspecialchars($row['reference_number']); ?></td>

                        <td><?= htmlspecialchars($row['full_name']); ?></td>

                        <td>
                           <span class="badge bg-<?= $badge; ?>">
                              <?= htmlspecialchars($row['status']); ?>
                           </span>
                        </td>

                        <td>₱<?= $amount; ?></td>

                        <td>₱<?= $fee; ?></td>

                        <td>₱<?= $txn_amount; ?></td>

                        <td><?= htmlspecialchars($row['description_name']); ?></td>

                        <td><?= htmlspecialchars($row['category_name']); ?></td>

                        <td><?= htmlspecialchars($row['scout_level']); ?></td>

                        <td><?= htmlspecialchars($row['school_name']); ?></td>

                        <td><?= htmlspecialchars($row['sub_district_name']); ?></td>

                        <td><?= htmlspecialchars($row['district_name']); ?></td>

                        <td><?= htmlspecialchars($row['council_name']); ?></td>

                        <td><?= htmlspecialchars($row['scout_level']); ?></td>

                        <td><?= htmlspecialchars($row['created_at']); ?></td>

                        <td><?= htmlspecialchars($row['modified_at'] ?? ''); ?></td>

                        <td><?= htmlspecialchars($row['phone']); ?></td>

                        <td><?= htmlspecialchars($row['email']); ?></td>

                        <td><?= htmlspecialchars($row['payment_for']); ?></td>
                     </tr>

                  <?php endforeach; ?>

               <?php else: ?>

                  <tr>
                     <td colspan="19" class="text-center text-muted">
                        No records found
                     </td>
                  </tr>

               <?php endif; ?>

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
         autoWidth: true,
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



<?php if (!empty($session_denied)): ?>

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <script>
      Swal.fire({
         icon: 'warning',
         title: 'Session Expired',
         text: '<?= $denied_message; ?>',
         allowOutsideClick: false,
         confirmButtonText: 'OK'
      }).then(() => {
         window.location.href = "<?= base_url('auth/logout'); ?>";
      });
   </script>

<?php endif; ?>