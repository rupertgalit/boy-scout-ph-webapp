<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BSP Payment Portal | Boy Scouts of the Philippines</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="/assets/css/form.css" rel="stylesheet" />
    <link href="/assets/css/modal.css" rel="stylesheet" />


    <style>
        .loading-select {
            background:
                url("data:image/svg+xml,%3Csvg viewBox='0 0 50 50' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='25' cy='25' r='20' fill='none' stroke='%23666' stroke-width='5' stroke-linecap='round' stroke-dasharray='31.4 31.4'%3E%3CanimateTransform attributeName='transform' type='rotate' from='0 25 25' to='360 25 25' dur='1s' repeatCount='indefinite'/%3E%3C/circle%3E%3C/svg%3E") no-repeat right 8px center;
            background-size: 20px 20px;
        }
    </style>
</head>

<body>

    <div class="main-panel">

        <div class="header-container animate__animated animate__fadeInDown">
            <div class="header-row row align-items-center">
                <div class="col-lg-2 col-md-3 text-center text-md-start">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Flag_of_the_Philippines.svg"
                        alt="Philippine Flag" class="header-flag float-animation">
                </div>

                <div class="col-lg-8 col-md-6 header-center">
                    <h1>BOY SCOUTS OF THE PHILIPPINES</h1>
                    <p class="subtitle">National Headquarters</p>
                    <p class="tagline">"Be Prepared"</p>
                    <div class="badge-container">
                        <i class="fas fa-shield-alt me-2"></i>
                        <span>Official Payment Portal</span>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 text-center text-md-end">
                    <img src="assets\images\boyscouts_logofinal.png" alt="BSP Logo" class="header-logo float-animation">
                </div>
            </div>
        </div>


        <div class="content-wrapper" id="formView">

            <div class="form-card animate__animated animate__fadeInLeft">
                <div class="form-header">
                    <h2><i class="fas fa-qrcode me-2"></i>QR Ph Payment Portal</h2>
                    <p>Secure online payment processing for all BSP transactions using QR Ph</p>
                </div>

                <form id="paymentForm" method="POST" action="/generate-qr" novalidate>

                    <div class="form-section">
                        <div class="section-header collapsed" data-bs-toggle="collapse"
                            data-bs-target="#paymentTypeCollapse" aria-expanded="true">
                            <div>
                                <h3 class="section-title"><i class="fas fa-money-check-alt me-2"></i>Payment Destination
                                </h3>
                                <p class="section-subtitle">Select where your payment will be directed</p>
                            </div>
                            <i class="fas fa-chevron-down section-icon"></i>
                        </div>

                        <div class="collapse show" id="paymentTypeCollapse">
                            <div class="section-content">
                                <div class="payment-options">
                                    <div class="payment-option">
                                        <label class="payment-card">
                                            <input type="radio" name="payment-for" value="BSP-COUNCIL" required style="display:none;">
                                            <div class="checkmark"><i class="fas fa-check"></i></div>
                                            <div class="card-content">
                                                <div class="card-icon"><i class="fas fa-landmark"></i></div>
                                                <div class="card-title">COUNCIL Headquarters</div>
                                            </div>
                                        </label>
                                    </div>

                                    <div class="payment-option">
                                        <label class="payment-card">
                                            <input type="radio" name="payment-for" value="BSP-DISTRICT" style="display:none;">
                                            <div class="checkmark"><i class="fas fa-check"></i></div>
                                            <div class="card-content">
                                                <div class="card-icon"><i class="fas fa-map-marked-alt"></i></div>
                                                <div class="card-title">DISTRICT</div>
                                            </div>
                                        </label>
                                    </div>

                                    <div class="payment-option">
                                        <label class="payment-card">
                                            <input type="radio" name="payment-for" value="BSP-SCHOOL" style="display:none;">
                                            <div class="checkmark"><i class="fas fa-check"></i></div>
                                            <div class="card-content">
                                                <div class="card-icon"><i class="fas fa-users"></i></div>
                                                <div class="card-title">School Unit</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="error-message d-none" id="paymentTypeError">
                                    <i class="fas fa-exclamation-circle"></i>
                                    Please select a payment destination
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Information Section -->
                    <div class="form-section">
                        <div class="section-header collapsed" data-bs-toggle="collapse"
                            data-bs-target="#personalCollapse">
                            <div>
                                <h3 class="section-title"><i class="fas fa-user-circle me-2"></i>Personal Information
                                </h3>
                                <p class="section-subtitle">Enter your personal details</p>
                            </div>
                            <i class="fas fa-chevron-down section-icon"></i>
                        </div>

                        <div class="collapse show" id="personalCollapse">
                            <div class="section-content">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-user"></i>
                                            Full Name <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="fullname" id="fullName"
                                            placeholder="Enter your full name" required>
                                        <div class="error-message d-none" id="nameError"></div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-mobile-alt"></i>
                                            Mobile Number <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="phone" id="mobileNumber"
                                            placeholder="09123456789" maxlength="11" required
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                        <div class="error-message d-none" id="mobileError"></div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">
                                            <i class="fas fa-envelope"></i>
                                            Email Address <span class="required">*</span>
                                        </label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="your.email@example.com" required>
                                        <div class="error-message d-none" id="emailError"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Scout Information Section -->
                    <div class="form-section">
                        <div class="section-header collapsed" data-bs-toggle="collapse" data-bs-target="#scoutCollapse">
                            <div>
                                <h3 class="section-title"><i class="fas fa-scroll me-2"></i>Scout Information</h3>
                                <p class="section-subtitle">Select your region, council, and payment purpose</p>
                            </div>
                            <i class="fas fa-chevron-down section-icon"></i>
                        </div>

                        <div class="collapse show" id="scoutCollapse">
                            <div class="section-content">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-map-marker-alt"></i>
                                            Council <span class="required">*</span>
                                        </label>
                                        <select class="form-control" name="council-code" id="region" required>
                                            <option value="" disabled selected>Select Region</option>
                                        </select>
                                        <div class="error-message d-none" id="regionError"></div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-school"></i>
                                            District <span class="required">*</span>
                                        </label>
                                        <select class="form-control" name="district-code" id="district" required>
                                            <option value="" disabled selected>Select District</option>
                                        </select>
                                        <div class="error-message d-none" id="districtError"></div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-building"></i>
                                            District Unit<span class="required">*</span>
                                        </label>
                                        <select class="form-control" name="sub-district-code" id="districtUnit" required>
                                            <option value="" disabled selected>Select District Unit</option>
                                        </select>
                                        <div class="error-message d-none" id="districtUnitError"></div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-bullseye"></i>
                                            School <span class="required">*</span>
                                        </label>
                                        <select class="form-control" name="school-code" id="school" required>
                                            <option value="" disabled selected>Select School</option>
                                        </select>
                                        <div class="error-message d-none" id="schoolError"></div>
                                    </div>

                                    <div class="col-12" id="otherSchoolFields" style="display: none;">
                                        <label class="form-label">
                                            <i class="fas fa-edit"></i>
                                            Specify School Purpose
                                        </label>
                                        <input type="text" class="form-control" name="other_school"
                                            placeholder="Please specify the school payment purpose">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Scout Details Section -->
                    <div class="form-section">
                        <div class="section-header collapsed" data-bs-toggle="collapse"
                            data-bs-target="#scoutDetailsCollapse">
                            <div>
                                <h3 class="section-title"><i class="fas fa-scroll me-2"></i>Scout Details</h3>
                                <p class="section-subtitle">Additional scout information</p>
                            </div>
                            <i class="fas fa-chevron-down section-icon"></i>
                        </div>

                        <div class="collapse show" id="scoutDetailsCollapse">
                            <div class="section-content">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-user-shield"></i>
                                            Scout Type <span class="required">*</span>
                                        </label>
                                        <select class="form-control" name="scout-code" id="scoutType" required>
                                            <option value="" disabled selected>Select Scout Type</option>

                                        </select>
                                        <div class="error-message d-none" id="scoutTypeError"></div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-file-alt"></i>
                                            Payment Type <span class="required">*</span>
                                        </label>
                                        <select class="form-control" name="payment-type-code" id="description" required>
                                            <option value="" disabled selected>Select Description</option>

                                        </select>
                                        <div class="error-message d-none" id="descriptionError"></div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">
                                            <i class="fas fa-box"></i>
                                            Payment Description <span class="required">*</span>
                                        </label>
                                        <select class="form-control" name="description-code" id="itemCategory" required>
                                            <option value="" disabled selected>Select Item Category</option>

                                        </select>
                                        <div class="error-message d-none" id="itemCategoryError"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Amount Section -->
                    <div class="form-section">
                        <div class="section-header collapsed" data-bs-toggle="collapse"
                            data-bs-target="#amountCollapse">
                            <div>
                                <h3 class="section-title"><i class="fas fa-money-bill-wave me-2"></i>Payment Amount</h3>
                                <p class="section-subtitle">Enter the payment amount</p>
                            </div>
                            <i class="fas fa-chevron-down section-icon"></i>
                        </div>

                        <div class="collapse show" id="amountCollapse">
                            <div class="section-content">
                                <div class="row g-3 align-items-end">
                                    <div class="col-md-8">
                                        <label class="form-label">
                                            <i class="fas fa-peso-sign"></i>
                                            Amount <span class="required">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">₱</span>
                                            <input type="number" class="form-control" name="amount" id="amount"
                                                placeholder="0.00" min="1" step="0.01" required
                                                onkeydown="if(event.key === 'e' || event.key === 'E' || event.key === '-' ) event.preventDefault()">
                                        </div>
                                        <div class="error-message d-none" id="amountError"></div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="d-grid">
                                            <button type="button" class="btn-submit" id="previewBtn">
                                                <i class="fas fa-eye"></i>
                                                Preview Payment
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Payment Methods Footer -->
        <div class="footer " id="footer">
            <div class="powered-by text-center">
                <p class="m-0">Powered by:</p>
                <img src="/assets/images/ngsiblack.png" alt="Powered By NGSI" />
            </div>
        </div>
    </div>

    <!-- Preview Modal -->
    <div class="modal fade" id="previewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-file-invoice-dollar me-2"></i>
                        Payment Summary
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <div class="row ">
                        <div class="col-md-12 mb-2">
                            <div class="preview-item">
                                <span class="preview-label">Payment Destination:</span>
                                <span class="preview-value" id="previewPaymentType">-</span>
                            </div>
                        </div>
                    </div>
                    <!-- Personal Information Section -->
                    <h6 class="text-secondary mb-2">
                        <i class="fas fa-user-circle me-2"></i>Personal Information
                    </h6>
                    <div class="row ">
                        <div class="col-md-6 mb-2">
                            <div class="preview-item">
                                <span class="preview-label">Full Name:</span>
                                <span class="preview-value" id="previewName">-</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="preview-item">
                                <span class="preview-label">Mobile Number:</span>
                                <span class="preview-value" id="previewMobile">-</span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="preview-item">
                                <span class="preview-label">Email Address:</span>
                                <span class="preview-value" id="previewEmail">-</span>
                            </div>
                        </div>

                    </div>
                    <h6 class="text-secondary mb-2">
                        <i class="fas fa-scroll me-2"></i>Scout Details
                    </h6>
                    <div class="row ">
                        <div class="col-md-6 mb-2">
                            <div class="preview-item">
                                <span class="preview-label">Council</span>
                                <span class="preview-value" id="previewRegion">-</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="preview-item">
                                <span class="preview-label">District</span>
                                <span class="preview-value" id="previewDistrict">-</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="preview-item">
                                <span class="preview-label">District Unit:</span>
                                <span class="preview-value" id="previewDistrictUnit">-</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="preview-item">
                                <span class="preview-label">School:</span>
                                <span class="preview-value" id="previewSchool">-</span>
                            </div>
                        </div>
                    </div>
                    <!-- Scout Details Section -->
                    <h6 class="text-secondary mb-2">
                        <i class="fas fa-scroll me-2"></i>Scout Details
                    </h6>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="preview-item">
                                <span class="preview-label">Scout Type:</span>
                                <span class="preview-value" id="previewScoutType">-</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="preview-item">
                                <span class="preview-label">Scout Payment Type:</span>
                                <span class="preview-value" id="previewDescription">-</span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="preview-item">
                                <span class="preview-label">Payment Description:</span>
                                <span class="preview-value" id="previewItemCategory">-</span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Details Section -->
                    <h6 class="text-secondary mb-2">
                        <i class="fas fa-money-bill-wave me-2"></i>Payment Details
                    </h6>
                    <div class="payment-summary">
                        <div class="payment-row">
                            <span class="payment-label">Amount:</span>
                            <span class="payment-value" id="previewAmount">₱0.00</span>
                        </div>
                        <div class="payment-row">
                            <span class="payment-label">Service Fee:</span>
                            <span class="payment-value" id="previewFee">₱20.00</span>
                        </div>
                        <div class="payment-row total-row">
                            <span class="payment-label">Total Amount</span>
                            <span class="payment-value total-amount" id="previewTotal">₱0.00</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-edit me-1"></i> Edit Details
                    </button>
                    <button type="button" class="btn btn-success" id="confirmPaymentBtn">
                        <i class="fas fa-check-circle me-1"></i> Generate QR Ph
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {

            <?php if ($this->session->flashdata('error')): ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    html: `<?= $this->session->flashdata('error'); ?>`,
                    confirmButtonColor: '#3085d6'
                });
            <?php endif; ?>

            <?php if ($this->session->flashdata('success')): ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    html: `<?= $this->session->flashdata('success'); ?>`,
                    confirmButtonColor: '#3085d6'
                });
            <?php endif; ?>

        });
    </script>
    <script>
        // SweetAlert Error
        function showError(message) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: message,
                confirmButtonColor: '#d33'
            });
        }

        // Global variables
        let currentPaymentData = {};

        const amountInput = document.getElementById('amount');

        amountInput.addEventListener('input', function() {
            let value = this.value;

            if (/^9{4,}$/.test(value)) {
                this.value = 1000;
                return;
            }
            let num = parseFloat(value);

            if (num > 100000) {
                this.value = 100000;
            }
            if (num < 0) {
                this.value = '';
            }
        });


        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Bootstrap collapse
            const collapses = document.querySelectorAll('.collapse');
            collapses.forEach(collapse => {
                collapse.addEventListener('show.bs.collapse', function() {
                    this.closest('.form-section').querySelector('.section-header').classList.remove('collapsed');
                });
                collapse.addEventListener('hide.bs.collapse', function() {
                    this.closest('.form-section').querySelector('.section-header').classList.add('collapsed');
                });
            });

            // Initialize Bootstrap Modal
            const previewModal = new bootstrap.Modal(document.getElementById('previewModal'));

            // Preview button event listener
            document.getElementById('previewBtn').addEventListener('click', function() {
                if (validateForm()) {
                    updatePreview();

                    const itemCat = document.getElementById("itemCategory");
                    const errorDiv = document.getElementById("itemCategoryError");

                    // 1. Check if disabled or no valid value
                    if (itemCat.disabled || !itemCat.value) {

                        errorDiv.classList.remove("d-none");
                        errorDiv.innerText = "Please select a valid item category.";

                        itemCat.classList.add("is-invalid");

                        return; // STOP – do not proceed
                    }

                    // 2. Passed validation
                    errorDiv.classList.add("d-none");
                    itemCat.classList.remove("is-invalid");

                    previewModal.show();
                }
            });

            // Confirm payment button event listener
            document.getElementById('confirmPaymentBtn').addEventListener('click', function() {
                if (validateForm()) {

                    previewModal.hide();
                }
            });

            // School select change handler
            document.getElementById('school').addEventListener('change', function() {
                const otherFields = document.getElementById('otherSchoolFields');
                if (this.value === 'other') {
                    otherFields.style.display = 'block';
                } else {
                    otherFields.style.display = 'none';
                    document.querySelector('input[name="other_school"]').value = '';
                }
            });

            // Payment card click handlers
            document.querySelectorAll('.payment-card').forEach(card => {
                const input = card.querySelector('input[type="radio"]');
                card.addEventListener('click', function(e) {
                    if (e.target !== input) {
                        input.checked = true;
                        updateCardStates();

                        // Clear error state
                        document.getElementById('paymentTypeError').classList.add('d-none');
                        document.querySelectorAll('.payment-card').forEach(c => c.classList.remove('border-danger'));
                    }
                });

                input.addEventListener('change', function() {
                    updateCardStates();
                });
            });
            document.querySelectorAll('input, select').forEach(element => {
                // Real-time validation
                element.addEventListener('input', validateField);
                element.addEventListener('blur', validateField);

                if (element.tagName.toLowerCase() === 'input') {
                    element.addEventListener('keyup', function() {
                        const errorElement = this.closest('.col-md-6, .col-12, .col-md-8')?.querySelector('.error-message');
                        if (errorElement) {
                            errorElement.classList.add('d-none');
                        }

                    });
                }

                if (element.tagName.toLowerCase() === 'select') {
                    element.addEventListener('change', function() {
                        const errorElement = this.closest('.col-md-6, .col-12')?.querySelector('.error-message');
                        if (errorElement) {
                            errorElement.classList.add('d-none');
                        }
                        this.classList.remove('is-invalid');
                    });
                }
            });
        });

        function updateCardStates() {
            document.querySelectorAll('.payment-card').forEach(card => {
                const input = card.querySelector('input[type="radio"]');
                if (input.checked) {
                    card.classList.add('checked');
                } else {
                    card.classList.remove('checked');
                }
            });
        }

        function validateForm() {
            let isValid = true;

            // Reset errors
            document.querySelectorAll('.error-message').forEach(el => el.classList.add('d-none'));
            document.querySelectorAll('.form-control').forEach(el => el.classList.remove('is-invalid'));
            document.querySelectorAll('.payment-card').forEach(el => el.classList.remove('border-danger'));

            // Validate payment type
            const paymentTypeSelected = document.querySelector('input[name="payment-for"]:checked');
            if (!paymentTypeSelected) {
                document.getElementById('paymentTypeError').classList.remove('d-none');
                document.querySelectorAll('.payment-card').forEach(el => el.classList.add('border-danger'));
                isValid = false;
            }

            // Validate name
            const name = document.getElementById('fullName').value.trim();
            if (!name) {
                document.getElementById('nameError').textContent = 'Please enter your full name';
                document.getElementById('nameError').classList.remove('d-none');
                document.getElementById('fullName').classList.add('is-invalid');
                isValid = false;
            }

            // Validate mobile
            const mobile = document.getElementById('mobileNumber').value.trim();
            if (!/^09\d{9}$/.test(mobile)) {
                document.getElementById('mobileError').textContent = 'Please enter a valid 11-digit mobile number starting with 09';
                document.getElementById('mobileError').classList.remove('d-none');
                document.getElementById('mobileNumber').classList.add('is-invalid');
                isValid = false;
            }

            // Validate email
            const email = document.getElementById('email').value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                document.getElementById('emailError').textContent = 'Please enter a valid email address';
                document.getElementById('emailError').classList.remove('d-none');
                document.getElementById('email').classList.add('is-invalid');
                isValid = false;
            }

            // Validate region
            const region = document.getElementById('region').value;
            if (!region) {
                document.getElementById('regionError').textContent = 'Please select a region';
                document.getElementById('regionError').classList.remove('d-none');
                document.getElementById('region').classList.add('is-invalid');
                isValid = false;
            }

            // Validate district
            const district = document.getElementById('district').value;
            if (!district) {
                document.getElementById('districtError').textContent = 'Please select a district';
                document.getElementById('districtError').classList.remove('d-none');
                document.getElementById('district').classList.add('is-invalid');
                isValid = false;
            }

            // Validate district unit
            const districtUnit = document.getElementById('districtUnit').value;
            if (!districtUnit) {
                document.getElementById('districtUnitError').textContent = 'Please select a district unit';
                document.getElementById('districtUnitError').classList.remove('d-none');
                document.getElementById('districtUnit').classList.add('is-invalid');
                isValid = false;
            }

            // Validate school
            const school = document.getElementById('school').value;
            if (!school) {
                document.getElementById('schoolError').textContent = 'Please select a school';
                document.getElementById('schoolError').classList.remove('d-none');
                document.getElementById('school').classList.add('is-invalid');
                isValid = false;
            } else if (school === 'other') {
                const otherSchool = document.querySelector('input[name="other_school"]').value.trim();
                if (!otherSchool) {
                    alert('Please specify the school payment purpose');
                    document.querySelector('input[name="other_school"]').focus();
                    isValid = false;
                }
            }

            // Validate scout type
            const scoutType = document.getElementById('scoutType').value;
            if (!scoutType) {
                document.getElementById('scoutTypeError').textContent = 'Please select a scout type';
                document.getElementById('scoutTypeError').classList.remove('d-none');
                document.getElementById('scoutType').classList.add('is-invalid');
                isValid = false;
            }

            // Validate description
            const description = document.getElementById('description').value;
            if (!description) {
                document.getElementById('descriptionError').textContent = 'Please select a description';
                document.getElementById('descriptionError').classList.remove('d-none');
                document.getElementById('description').classList.add('is-invalid');
                isValid = false;
            }

            // Validate item category
            const itemCategory = document.getElementById('itemCategory').value;
            if (!itemCategory) {
                document.getElementById('itemCategoryError').textContent = 'Please select an item category';
                document.getElementById('itemCategoryError').classList.remove('d-none');
                document.getElementById('itemCategory').classList.add('is-invalid');
                isValid = false;
            }

            // Validate amount
            const amount = parseFloat(document.getElementById('amount').value);
            if (isNaN(amount) || amount <= 0) {
                document.getElementById('amountError').textContent = 'Please enter a valid amount greater than 0';
                document.getElementById('amountError').classList.remove('d-none');
                amountField.classList.add('is-invalid');
                isValid = false;
            } else if (isNaN(amount) || amount <= 0 || amount > 100000) {
                document.getElementById('amountError').textContent =
                    'Amount must be between ₱1 and ₱100,000 only';
                document.getElementById('amountError').classList.remove('d-none');
                amountField.classList.add('is-invalid');
                isValid = false;
            }

            // Store payment data if valid
            if (isValid) {
                const paymentTypeElement = document.querySelector('input[name="payment-for"]:checked');
                const paymentTypeCard = paymentTypeElement?.closest('.payment-card');

                currentPaymentData = {
                    name: name,
                    mobile: mobile,
                    email: email,
                    paymentType: paymentTypeElement?.value || '',
                    paymentTypeText: paymentTypeCard?.querySelector('.card-title')?.textContent || '-',
                    region: region,
                    regionText: document.getElementById('region').selectedOptions[0]?.text || '-',
                    district: district,
                    districtText: document.getElementById('district').selectedOptions[0]?.text || '-',
                    districtUnit: districtUnit,
                    districtUnitText: document.getElementById('districtUnit').selectedOptions[0]?.text || '-',
                    school: school,
                    schoolText: school === 'other' ? document.querySelector('input[name="other_school"]').value : document.getElementById('school').selectedOptions[0]?.text || '-',
                    scoutType: scoutType,
                    scoutTypeText: document.getElementById('scoutType').selectedOptions[0]?.text || '-',
                    description: description,
                    descriptionText: document.getElementById('description').selectedOptions[0]?.text || '-',
                    itemCategory: itemCategory,
                    itemCategoryText: document.getElementById('itemCategory').selectedOptions[0]?.text || '-',
                    amount: amount,
                    fee: 20.00,
                    total: amount + 20.00,
                    transactionId: 'BSP-' + Date.now().toString().slice(-10),
                    reference: 'BSP-QRPH-' + Math.floor(Math.random() * 10000).toString().padStart(4, '0'),
                    date: new Date().toLocaleString('en-PH', {
                        timeZone: 'Asia/Manila',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit'
                    })
                };
            }

            return isValid;
        }

        function validateField(e) {
            const field = e.target;
            let isValid = true;

            switch (field.id) {
                case 'fullName':
                    isValid = field.value.trim().length > 0;
                    break;
                case 'mobileNumber':
                    isValid = /^09\d{9}$/.test(field.value.trim());
                    break;
                case 'email':
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    isValid = emailRegex.test(field.value.trim());
                    break;
                case 'region':
                case 'district':
                case 'districtUnit':
                case 'school':
                case 'scoutType':
                case 'description':
                case 'itemCategory':
                    isValid = field.value !== '';
                    break;
                case 'amount':
                    isValid = !isNaN(parseFloat(field.value)) && parseFloat(field.value) > 0;
                    break;
            }

            if (!isValid && field.id) {
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }
        }

        function updatePreview() {
            // Update preview with form values
            document.getElementById('previewName').textContent = document.getElementById('fullName').value;
            document.getElementById('previewMobile').textContent = document.getElementById('mobileNumber').value;
            document.getElementById('previewEmail').textContent = document.getElementById('email').value;

            // Payment type
            const paymentType = document.querySelector('input[name="payment-for"]:checked');
            let paymentTypeText = '-';
            if (paymentType) {
                const card = paymentType.closest('.payment-card');
                paymentTypeText = card.querySelector('.card-title').textContent;
            }
            document.getElementById('previewPaymentType').textContent = paymentTypeText;

            // Region
            document.getElementById('previewRegion').textContent =
                document.getElementById('region').selectedOptions[0]?.text || '-';

            // District
            document.getElementById('previewDistrict').textContent =
                document.getElementById('district').selectedOptions[0]?.text || '-';

            // District Unit
            document.getElementById('previewDistrictUnit').textContent =
                document.getElementById('districtUnit').selectedOptions[0]?.text || '-';

            // Scout details
            document.getElementById('previewScoutType').textContent =
                document.getElementById('scoutType').selectedOptions[0]?.text || '-';
            document.getElementById('previewDescription').textContent =
                document.getElementById('description').selectedOptions[0]?.text || '-';
            document.getElementById('previewItemCategory').textContent =
                document.getElementById('itemCategory').selectedOptions[0]?.text || '-';

            // School
            const school = document.getElementById('school').value;
            let schoolText = document.getElementById('school').selectedOptions[0]?.text || '-';
            if (school === 'other') {
                schoolText = document.querySelector('input[name="other_school"]').value || 'Other (Not Specified)';
            }
            document.getElementById('previewSchool').textContent = schoolText;

            // Amount
            const amount = parseFloat(document.getElementById('amount').value) || 0;
            const fee = 20.00;
            const total = amount + fee;

            document.getElementById('previewAmount').textContent = '₱' + amount.toFixed(2);
            document.getElementById('previewFee').textContent = '₱' + fee.toFixed(2);
            document.getElementById('previewTotal').textContent = '₱' + total.toFixed(2);
        }
    </script>





    <!-- =============================FOR SCOUT INFORMATION DROPDOWN API=========================================== -->

    <script>
        const baseUrl = "<?= base_url('form'); ?>";

        console.log(baseUrl);

        /* ===== UTILITIES ===== */
        function setLoading(id, isLoading) {
            const el = document.getElementById(id);

            if (isLoading)
                el.classList.add("loading-select");
            else
                el.classList.remove("loading-select");
        }

        function resetSelect(id, placeholder) {
            document.getElementById(id).innerHTML =
                `<option value="" selected disabled>${placeholder}</option>`;
        }

        function showError(id, msg) {
            const err = document.getElementById(id + "Error");
            err.innerText = msg;
            err.classList.remove("d-none");
        }

        function setDisabled(id, state) {
            document.getElementById(id).disabled = state;
        }


        /* ===== COUNCILS ===== */
        function loadCouncils() {

            setLoading("region", true);
            setDisabled("region", true);

            const council_api = baseUrl + "/council_list";

            fetch(council_api)
                .then(r => r.json())
                .then(res => {

                    setLoading("region", false);

                    let opt = `<option value="" selected disabled>Select Council</option>`;

                    let list = Array.isArray(res.data) ? res.data : [res.data];

                    if (!res.data || list.length === 0) {
                        document.getElementById("region").innerHTML = opt;
                        setDisabled("region", true);
                        showError("region", "No councils available");
                        return;
                    }

                    list.forEach(c => {
                        opt += `<option value="${c.council_code}">
                            ${c.council_name}
                        </option>`;
                    });

                    document.getElementById("region").innerHTML = opt;
                    setDisabled("region", false);
                })
                .catch(() => {
                    setDisabled("region", true);
                    showError("region", "Failed to load councils");
                });
        }


        /* ===== DISTRICT ===== */
        document.getElementById("region").addEventListener("change", function() {

            let council = this.value;

            resetSelect("district", "Select District");
            resetSelect("districtUnit", "Select District Unit");
            resetSelect("school", "Select School");

            setDisabled("district", true);
            setDisabled("districtUnit", true);
            setDisabled("school", true);

            setLoading("district", true);

            fetch(baseUrl + "/district_list?council_code=" + council)
                .then(r => r.json())
                .then(res => {

                    setLoading("district", false);

                    let opt = `<option value="" selected disabled>Select District</option>`;

                    let list = Array.isArray(res.data) ? res.data : [res.data];

                    if (!res.data || list.length === 0) {
                        document.getElementById("district").innerHTML = opt;
                        setDisabled("district", true);
                        showError("district", "No districts found");
                        return;
                    }

                    list.forEach(d => {
                        opt += `<option value="${d.district_code}">
                        ${d.district_name}
                    </option>`;
                    });

                    document.getElementById("district").innerHTML = opt;
                    setDisabled("district", false);
                })
                .catch(() => {
                    setDisabled("district", true);
                    showError("district", "Failed to load districts");
                });
        });


        /* ===== SUB DISTRICT ===== */
        document.getElementById("district").addEventListener("change", function() {

            let district = this.value;

            resetSelect("districtUnit", "Select District Unit");
            resetSelect("school", "Select School");

            setDisabled("districtUnit", true);
            setDisabled("school", true);

            setLoading("districtUnit", true);

            fetch(baseUrl + "/sub_district_list?district_code=" + district)
                .then(r => r.json())
                .then(res => {

                    setLoading("districtUnit", false);

                    let opt = `<option value="" selected disabled>Select District Unit</option>`;

                    let list = Array.isArray(res.data) ? res.data : [res.data];

                    if (!res.data || list.length === 0) {
                        document.getElementById("districtUnit").innerHTML = opt;
                        setDisabled("districtUnit", true);
                        showError("districtUnit", "No units found");
                        return;
                    }

                    list.forEach(s => {
                        opt += `<option value="${s.sub_district_code}">
                        ${s.sub_district_name}
                    </option>`;
                    });

                    document.getElementById("districtUnit").innerHTML = opt;
                    setDisabled("districtUnit", false);
                })
                .catch(() => {
                    setDisabled("districtUnit", true);
                    showError("districtUnit", "Failed to load units");
                });
        });


        /* ===== SCHOOL ===== */
        document.getElementById("districtUnit").addEventListener("change", function() {

            let council = document.getElementById("region").value;
            let district = document.getElementById("district").value;
            let sub = this.value;

            resetSelect("school", "Select School");
            setDisabled("school", true);

            setLoading("school", true);

            let url =
                `${baseUrl}/school_list?council_code=${council}` +
                `&district_code=${district}` +
                `&sub_district_code=${sub}`;

            fetch(url)
                .then(r => r.json())
                .then(res => {

                    setLoading("school", false);

                    let opt = `<option value="" selected disabled>Select School</option>`;

                    let list = Array.isArray(res.data) ? res.data : [res.data];

                    if (!res.data || list.length === 0) {
                        document.getElementById("school").innerHTML = opt;
                        setDisabled("school", true);
                        showError("school", "No schools found");
                        return;
                    }

                    list.forEach(s => {
                        opt += `<option value="${s.school_code}">
                        ${s.school_name}
                    </option>`;
                    });

                    document.getElementById("school").innerHTML = opt;

                    setDisabled("school", false);
                })
                .catch(() => {
                    setDisabled("school", true);
                    showError("school", "Failed to load schools");
                });
        });



        loadCouncils();
    </script>


    <script>
        /* ===================== HELPERS ===================== */

        function setSkeleton(id, text) {
            document.getElementById(id).innerHTML =
                `<option disabled selected>${text}</option>`;
        }

        function setDisabled(id, bool) {
            document.getElementById(id).disabled = bool;
        }

        function resetSelect(id, placeholder) {
            document.getElementById(id).innerHTML =
                `<option disabled selected>${placeholder}</option>`;
        }

        function autoSelectIfSingle(id) {
            let el = document.getElementById(id);
            if (el.options.length === 2) {
                el.selectedIndex = 1;
                el.dispatchEvent(new Event("change"));
            }
        }




        /*SCOUT TYPE*/

        function loadScoutTypes() {

            setSkeleton("scoutType", "Loading scout types...");
            setDisabled("scoutType", true);



            fetch(baseUrl + "/scout_list")
                .then(r => r.json())
                .then(res => {

                    let opt = `<option disabled selected>Select Scout Type</option>`;

                    let list = Array.isArray(res.data) ? res.data : [res.data];

                    if (!res.data || list.length === 0) {
                        setSkeleton("scoutType", "No scout types available");
                        return;
                    }

                    list.forEach(s => {
                        opt += `<option value="${s.scout_code}">
        ${s.scout_level}
      </option>`;
                    });

                    document.getElementById("scoutType").innerHTML = opt;
                    setDisabled("scoutType", false);

                    autoSelectIfSingle("scoutType");

                })
                .catch(() => {
                    setSkeleton("scoutType", "Failed to load scout types");
                });

        }


        /*  SCOUT TYPE  */

        document.getElementById("scoutType").addEventListener("change", function() {

            let scout = this.value;

            resetSelect("description", "Select Description");
            resetSelect("itemCategory", "Select Item Category");

            setDisabled("description", true);
            setDisabled("itemCategory", true);

            setSkeleton("description", "Loading descriptions...");

            fetch(baseUrl + "/scout_payment_type")
                .then(r => r.json())
                .then(res => {

                    let opt = `<option disabled selected>Select Description</option>`;

                    let list = Array.isArray(res.data) ? res.data : [res.data];

                    if (!res.data || list.length === 0) {
                        setSkeleton("description", "No descriptions available");
                        return;
                    }

                    list.forEach(p => {
                        opt += `<option value="${p.payment_type_code}">
                        ${p.category_name}
                        </option>`;
                    });

                    document.getElementById("description").innerHTML = opt;
                    setDisabled("description", false);

                    autoSelectIfSingle("description");

                })
                .catch(() => {
                    setSkeleton("description", "Failed to load");
                });

        });



        /*  ON DESCRIPTION */

        document.getElementById("description").addEventListener("change", function() {


            let scout = document.getElementById("scoutType").value;
            let type = this.value;

            // CLEAR AMOUNT ON NEW PAYMENT TYPE
            const amountInput = document.getElementById("amount");
            amountInput.value = "";
            amountInput.removeAttribute("readonly");

            resetSelect("itemCategory", "Select Item Category");
            setDisabled("itemCategory", true);

            setSkeleton("itemCategory", "Loading items...");

            let url =
                `${baseUrl}/scout_payment_description?scout_code=${scout}&payment_type_code=${type}`;

            fetch(url)
                .then(r => r.json())
                .then(res => {

                    let opt = `<option disabled selected>Select Item Category</option>`;

                    let list = Array.isArray(res.data) ? res.data : [res.data];

                    if (
                        !res.data ||
                        res.data === "" ||
                        (Array.isArray(res.data) && res.data.length === 0) ||
                        list.length === 0
                    ) {


                        setSkeleton("itemCategory", "No items available");

                        const itemCat = document.getElementById("itemCategory");
                        const amountInput = document.getElementById("amount");

                        itemCat.setAttribute("required", true);
                        itemCat.setAttribute("disabled", true);


                        //  CLEAR AMOUNT
                        amountInput.value = "";
                        amountInput.removeAttribute("readonly");

                        document.getElementById("itemCategoryError").classList.remove("d-none");
                        document.getElementById("itemCategoryError").innerText =
                            "No available items for selected payment type.";

                        return;
                    }


                    list.forEach(d => {

                        const code = d.description_code || '';
                        const name = d.description_name || '';
                        const amount_fix = d.is_fix; // 1 or 0
                        const amount = d.amount;
                        const amount_display = d.amount ? '(₱' + parseFloat(d.amount).toFixed(2) + ')' : '';
                        const fee = d.ngsi_fee || '';


                        opt += `<option 
                            value="${code}" 
                            data-amount="${amount}" 
                            data-fee="${fee}"
                            data-fix="${amount_fix}">
                            ${name} ${amount_display}
                        </option>`;

                    });

                    let input_amount = document.getElementById('amount').value

                    document.getElementById("itemCategory").innerHTML = opt;

                    setDisabled("itemCategory", false);

                    autoSelectIfSingle("itemCategory");
                    const itemCat = document.getElementById("itemCategory");
                    itemCat.removeAttribute("disabled");
                    itemCat.setAttribute("required", true);

                })
                .catch(() => {
                    setSkeleton("itemCategory", "Failed to load");
                });

        });




        loadScoutTypes();

        /*  ON DESCRIPTION ITEM CATEGORY */
        document.getElementById("itemCategory").addEventListener("change", function() {

            const selected = this.options[this.selectedIndex];

            const fix = selected.getAttribute("data-fix");
            const amount = selected.getAttribute("data-amount");

            const amountInput = document.getElementById("amount");

            if (fix == "1") {

                amountInput.value = amount;
                amountInput.setAttribute("readonly", true);

                //  Remove hover & cursor
                amountInput.style.pointerEvents = "none";
                amountInput.style.cursor = "default";


                amountInput.style.backgroundColor = "#e9ecef";


            } else {

                //  CLEAR IF NOT FIX
                amountInput.value = "";
                amountInput.removeAttribute("readonly");


                amountInput.style.pointerEvents = "";
                amountInput.style.cursor = "";

                amountInput.style.backgroundColor = "";

            }

        });
    </script>



    <script>
        document.getElementById("confirmPaymentBtn").addEventListener("click", function() {

            const btn = this;


            if (btn.disabled) return;

            btn.disabled = true;


            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Processing...';


            document.getElementById("paymentForm").submit();


            setTimeout(() => {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-check-circle me-1"></i> Generate QR Ph';
            }, 5000);
        });
    </script>






</body>

</html>