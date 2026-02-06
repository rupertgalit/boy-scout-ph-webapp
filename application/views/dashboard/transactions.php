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
            <form action="/transactions" method="POST" id="filterForm">
               <div class="row g-2 ml-3">
                  <div class="col-auto">
                     <label for="startDate" class="form-label">Start Date</label>
                     <input type="date" class="form-control" name="date-from" id="startDate"
                        value="<?= $_POST['date-from'] ?? '' ?>" placeholder="Start Date">
                  </div>

                  <div class="col-auto">
                     <label for="endDate" class="form-label">End Date</label>
                     <input type="date" class="form-control" name="date-to" id="endDate"
                        value="<?= $_POST['date-to'] ?? '' ?>" placeholder="End Date">
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
                  <th class="ref-col">Reference #</th>
                  <th class="ref-col">Full Name</th>
                  <th>Status</th>
                  <th>Amount</th>
                  <th>Fees</th>
                  <th>Txn Amount</th>
                  <th class="ref-col">Description</th>
                  <th>Category</th>
                  <th class="ref-col">Scout Level</th>
                  <th>School</th>
                  <th>Sub District</th>
                  <th class="date-col">District</th>
                  <th>Council</th>
                  <th class="date-col">Created</th>
                  <th class="date-col">Modified</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Payment For</th>

               </tr>
               </tr>
            </thead>
            <tbody>

               <?php if (!empty($transactions)) : ?>

                  <?php $i = 1;
                  foreach ($transactions as $row) : ?>

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

                     $amount = number_format($row['amount'], 2);
                     $fee = number_format($row['ngsi_fee'], 2);
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

                        <td><?= htmlspecialchars($row['created_at']); ?></td>

                        <td><?= htmlspecialchars($row['modified_at'] ?? ''); ?></td>

                        <td><?= htmlspecialchars($row['phone']); ?></td>

                        <td><?= htmlspecialchars($row['email']); ?></td>

                        <td><?= htmlspecialchars($row['payment_for']); ?></td>
                     </tr>

                  <?php endforeach; ?>

               <?php else : ?>

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
   jQuery(document).ready(function ($) {

      const today = new Date().toISOString().split('T')[0];

      // $('#startDate').attr('min', today);
      // $('#endDate').attr('min', today);

      if (!$('#startDate').val()) {
         $('#startDate').val(today);
      }

      if (!$('#endDate').val()) {
         $('#endDate').val(today);
      }

      $('#startDate').on('change', function () {
         const start = $(this).val();
         $('#endDate').attr('min', start);

         if ($('#endDate').val() < start) {
            $('#endDate').val(start);
         }
      });


      // Initialize DataTable
      var table = $('#myTable').DataTable({
         scrollX: true,
         searching: true,
         responsive: true,
         autoWidth: false,
         pageLength: 10,
         order: [[14, 'desc']],
         dom: '<"row"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>' +
            '<"row"<"col-sm-12"tr>>' +
            '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
         buttons: [
            {
               extend: 'csvHtml5',
               className: 'btn btn-sm btn-outline-secondary',
               title: 'Transactions_' + today,
               exportOptions: {
                  columns: ':visible'
               }
            },
            {
               extend: 'excelHtml5',
               className: 'btn btn-sm btn-outline-secondary',
               title: 'Transactions_' + today,
               exportOptions: {
                  columns: ':visible'
               }
            },
            {
               extend: 'print',
               className: 'btn btn-sm btn-outline-secondary',
               title: 'Transactions Report',
               exportOptions: {
                  columns: ':visible'
               }
            }
         ],
         language: {
            emptyTable: "No records available",
            zeroRecords: "No matching records found"
         },
         initComplete: function () {
            var api = this.api();
            var container = $('#exportButtonsContainer');
            container.empty();
            api.buttons().container().appendTo(container);

            // Enable/disable export buttons
            if (api.data().count() === 0) {
               api.buttons().disable();
            } else {
               api.buttons().enable();
            }
         }
      });

      // Adjust columns on resize
      $(window).on('resize', function () {
         table.columns.adjust().responsive.recalc();
      });
   });
</script>

<?php if (!empty($session_denied)) : ?>

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