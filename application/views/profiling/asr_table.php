<!-- Table section -->
<div class="container-fluid py-4 px-4">
    <div class="table-card">
        <div class="table-header-bar">
            <h2>
                <i class="fas fa-fleur-de-lis"></i> Application for Additional Scout Registration
            </h2>
            <a href="/aur-form" class="btn-create">
                <i class="fas fa-plus-circle"></i> Create ASR
            </a>
        </div>

        <div class="filter-section">
            <div class="row g-3 align-items-end">
                <div class="col-md-2">
                    <label class="filter-label">Date From</label>
                    <input type="date" id="dateFrom" class="form-control form-control-sm">
                </div>
                <div class="col-md-2">
                    <label class="filter-label">Date To</label>
                    <input type="date" id="dateTo" class="form-control form-control-sm">
                </div>
                <div class="col-md-2">
                    <label class="filter-label">Registration Status</label>
                    <select id="regStatus" class="form-control form-control-sm">
                        <option value="">All Registration</option>
                        <option value="Registered">Registered</option>
                        <option value="Pending">Pending</option>
                        <option value="For Review">For Review</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="filter-label">Payment Status</label>
                    <select id="payStatus" class="form-control form-control-sm">
                        <option value="">All Payment</option>
                        <option value="Paid">Paid</option>
                        <option value="Unpaid">Unpaid</option>
                        <option value="Partial">Partial</option>
                    </select>
                </div>
                  <div class="col-md-2">
                    <label class="filter-label">&nbsp;</label>
                    <button class="btn btn-success btn-sm w-100">
                        <i class="fas fa-filter"></i> Apply Filters
                    </button>
                </div>
                <div class="col-md-2">
                    <label class="filter-label">Search</label>
                    <div class="input-group input-group-sm">
                        <input type="text" id="customSearch" class="form-control" placeholder="Search...">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
              
            </div>
        </div>

        <!-- Table Wrapper -->
        <div class="table-wrapper">
            <table id="scoutTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ref No.</th>
                        <th>Unit Name</th>
                        <th>AUR #</th>
                        <th>Date Created</th>
                        <th>District</th>
                        <th>School</th>
                        <th>Reg. Status</th>
                        <th>Amount</th>
                        <th>Pay. Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- Row 1 -->
                    <tr>
                        <td data-label="ID">001</td>
                        <td data-label="Ref No."><strong>AUR-2024-0001</strong></td>
                        <td data-label="Unit Name">
                            <div>Eagle Scout Troop 101</div>
                            <small style="color: var(--bsp-brown);">Juan Dela Cruz</small>
                        </td>
                        <td data-label="AUR #">AUR-001-2024</td>
                        <td data-label="Date Created">Jan 15, 2024</td>
                        <td data-label="District">Manila North</td>
                        <td data-label="School">Manila Science High School</td>
                        <td data-label="Reg. Status">
                            <span class="status-badge status-registered">Registered</span>
                        </td>
                        <td data-label="Amount">₱2,500.00</td>
                        <td data-label="Pay. Status">
                            <span class="payment-badge payment-paid">Paid</span>
                        </td>
                        <td data-label="Actions">
                            <div class="action-buttons">
                                <button class="btn-action btn-view" data-tooltip="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn-action btn-edit" data-tooltip="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-action btn-print" data-tooltip="Print">
                                    <i class="fas fa-print"></i>
                                </button>
                                <button class="btn-action btn-delete" data-tooltip="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr>
                        <td data-label="ID">002</td>
                        <td data-label="Ref No."><strong>AUR-2024-0002</strong></td>
                        <td data-label="Unit Name">
                            <div>Falcon Patrol</div>
                            <small style="color: var(--bsp-brown);">Maria Santos</small>
                        </td>
                        <td data-label="AUR #">AUR-002-2024</td>
                        <td data-label="Date Created">Jan 18, 2024</td>
                        <td data-label="District">Quezon City East</td>
                        <td data-label="School">Quezon City High School</td>
                        <td data-label="Reg. Status">
                            <span class="status-badge status-pending">Pending</span>
                        </td>
                        <td data-label="Amount">₱1,800.00</td>
                        <td data-label="Pay. Status">
                            <span class="payment-badge payment-unpaid">Unpaid</span>
                        </td>
                        <td data-label="Actions">
                            <div class="action-buttons">
                                <button class="btn-action btn-view" data-tooltip="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn-action btn-edit" data-tooltip="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-action btn-print" data-tooltip="Print">
                                    <i class="fas fa-print"></i>
                                </button>
                                <button class="btn-action btn-delete" data-tooltip="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 3 -->
                    <tr>
                        <td data-label="ID">003</td>
                        <td data-label="Ref No."><strong>AUR-2024-0003</strong></td>
                        <td data-label="Unit Name">
                            <div>Wolf Pack Unit</div>
                            <small style="color: var(--bsp-brown);">Jose Rizal</small>
                        </td>
                        <td data-label="AUR #">AUR-003-2024</td>
                        <td data-label="Date Created">Jan 20, 2024</td>
                        <td data-label="District">Makati</td>
                        <td data-label="School">Makati Science High School</td>
                        <td data-label="Reg. Status">
                            <span class="status-badge status-review">For Review</span>
                        </td>
                        <td data-label="Amount">₱3,200.00</td>
                        <td data-label="Pay. Status">
                            <span class="payment-badge payment-partial">Partial</span>
                        </td>
                        <td data-label="Actions">
                            <div class="action-buttons">
                                <button class="btn-action btn-view" data-tooltip="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn-action btn-edit" data-tooltip="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-action btn-print" data-tooltip="Print">
                                    <i class="fas fa-print"></i>
                                </button>
                                <button class="btn-action btn-delete" data-tooltip="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 4 -->
                    <tr>
                        <td data-label="ID">004</td>
                        <td data-label="Ref No."><strong>AUR-2024-0004</strong></td>
                        <td data-label="Unit Name">
                            <div>Sea Scout Squadron</div>
                            <small style="color: var(--bsp-brown);">Andres Bonifacio</small>
                        </td>
                        <td data-label="AUR #">AUR-004-2024</td>
                        <td data-label="Date Created">Jan 22, 2024</td>
                        <td data-label="District">Pasig</td>
                        <td data-label="School">Pasig Catholic School</td>
                        <td data-label="Reg. Status">
                            <span class="status-badge status-registered">Registered</span>
                        </td>
                        <td data-label="Amount">₱2,800.00</td>
                        <td data-label="Pay. Status">
                            <span class="payment-badge payment-paid">Paid</span>
                        </td>
                        <td data-label="Actions">
                            <div class="action-buttons">
                                <button class="btn-action btn-view" data-tooltip="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn-action btn-edit" data-tooltip="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-action btn-print" data-tooltip="Print">
                                    <i class="fas fa-print"></i>
                                </button>
                                <button class="btn-action btn-delete" data-tooltip="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 5 -->
                    <tr>
                        <td data-label="ID">005</td>
                        <td data-label="Ref No."><strong>AUR-2024-0005</strong></td>
                        <td data-label="Unit Name">
                            <div>Air Scout Squadron</div>
                            <small style="color: var(--bsp-brown);">Emilio Aguinaldo</small>
                        </td>
                        <td data-label="AUR #">AUR-005-2024</td>
                        <td data-label="Date Created">Jan 25, 2024</td>
                        <td data-label="District">Mandaluyong</td>
                        <td data-label="School">Mandaluyong High School</td>
                        <td data-label="Reg. Status">
                            <span class="status-badge status-rejected">Rejected</span>
                        </td>
                        <td data-label="Amount">₱2,100.00</td>
                        <td data-label="Pay. Status">
                            <span class="payment-badge payment-unpaid">Unpaid</span>
                        </td>
                        <td data-label="Actions">
                            <div class="action-buttons">
                                <button class="btn-action btn-view" data-tooltip="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn-action btn-edit" data-tooltip="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-action btn-print" data-tooltip="Print">
                                    <i class="fas fa-print"></i>
                                </button>
                                <button class="btn-action btn-delete" data-tooltip="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 6 -->
                    <tr>
                        <td data-label="ID">006</td>
                        <td data-label="Ref No."><strong>AUR-2024-0006</strong></td>
                        <td data-label="Unit Name">
                            <div>Mountain Scout Troop</div>
                            <small style="color: var(--bsp-brown);">Lapu Lapu</small>
                        </td>
                        <td data-label="AUR #">AUR-006-2024</td>
                        <td data-label="Date Created">Jan 28, 2024</td>
                        <td data-label="District">Paranaque</td>
                        <td data-label="School">Paranaque National High School</td>
                        <td data-label="Reg. Status">
                            <span class="status-badge status-pending">Pending</span>
                        </td>
                        <td data-label="Amount">₱1,950.00</td>
                        <td data-label="Pay. Status">
                            <span class="payment-badge payment-paid">Paid</span>
                        </td>
                        <td data-label="Actions">
                            <div class="action-buttons">
                                <button class="btn-action btn-view" data-tooltip="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn-action btn-edit" data-tooltip="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-action btn-print" data-tooltip="Print">
                                    <i class="fas fa-print"></i>
                                </button>
                                <button class="btn-action btn-delete" data-tooltip="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>