<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BSP Payment Portal | Boy Scouts of the Philippines</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
     <link href="/assets/css/form.css" rel="stylesheet" />
   
</head>
<body>
    <!-- Main Container -->
    <div class="main-panel">
     
        <div class="header-container animate__animated animate__fadeInDown">
            <div class="header-row row align-items-center">
                <div class="col-lg-2 col-md-3 text-center text-md-start">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Flag_of_the_Philippines.svg" 
                         alt="Philippine Flag" 
                         class="header-flag float-animation">
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
                    <img src="assets\images\boyscouts_logofinal.png" 
                         alt="BSP Logo" 
                         class="header-logo float-animation">
                </div>
            </div>
        </div>

        <!-- Progress Indicator -->
        <div class="progress-indicator animate__animated animate__fadeIn">
            <div class="progress-step active" id="step1">
                <div class="step-number">1</div>
                <div class="step-label">Payment Details</div>
            </div>
            <div class="progress-step" id="step2">
                <div class="step-number">2</div>
                <div class="step-label">Review & Confirm</div>
            </div>
            <div class="progress-step" id="step3">
                <div class="step-number">3</div>
                <div class="step-label">QR Ph Code</div>
            </div>
        </div>

        <!-- Main Content - Form View -->
        <div class="content-wrapper" id="formView">
            <!-- Form Card -->
            <div class="form-card animate__animated animate__fadeInLeft">
                <div class="form-header">
                    <h2><i class="fas fa-qrcode me-2"></i>QR Ph Payment Portal</h2>
                    <p>Secure online payment processing for all BSP transactions using QR Ph</p>
                </div>

                <form id="paymentForm" novalidate>
                    <!-- Payment Type Section -->
                    <div class="form-section">
                        <div class="section-header collapsed" data-bs-toggle="collapse" data-bs-target="#paymentTypeCollapse" aria-expanded="false">
                            <div>
                                <h3 class="section-title"><i class="fas fa-money-check-alt me-2"></i>Payment Destination</h3>
                                <p class="section-subtitle">Select where your payment will be directed</p>
                            </div>
                            <i class="fas fa-chevron-down section-icon"></i>
                        </div>
                        
                        <div class="collapse" id="paymentTypeCollapse">
                            <div class="section-content">
                                <div class="payment-options">
                                    <div class="payment-option">
                                        <label class="payment-card">
                                            <input type="radio" name="payment_type" value="national" required>
                                            <div class="checkmark"><i class="fas fa-check"></i></div>
                                            <div class="card-content">
                                                <div class="card-icon"><i class="fas fa-landmark"></i></div>
                                                <div class="card-title">National Headquarters</div>
                                            </div>
                                        </label>
                                    </div>
                                    
                                    <div class="payment-option">
                                        <label class="payment-card">
                                            <input type="radio" name="payment_type" value="regional">
                                            <div class="checkmark"><i class="fas fa-check"></i></div>
                                            <div class="card-content">
                                                <div class="card-icon"><i class="fas fa-map-marked-alt"></i></div>
                                                <div class="card-title">Regional Council</div>
                                            </div>
                                        </label>
                                    </div>
                                    
                                    <div class="payment-option">
                                        <label class="payment-card">
                                            <input type="radio" name="payment_type" value="local">
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
                        <div class="section-header collapsed" data-bs-toggle="collapse" data-bs-target="#personalCollapse">
                            <div>
                                <h3 class="section-title"><i class="fas fa-user-circle me-2"></i>Personal Information</h3>
                                <p class="section-subtitle">Enter your personal details</p>
                            </div>
                            <i class="fas fa-chevron-down section-icon"></i>
                        </div>
                        
                        <div class="collapse" id="personalCollapse">
                            <div class="section-content">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-user"></i>
                                            Full Name <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="name" id="fullName" 
                                               placeholder="Enter your full name" required>
                                        <div class="error-message d-none" id="nameError"></div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-mobile-alt"></i>
                                            Mobile Number <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="mobile" id="mobileNumber" 
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
                        
                        <div class="collapse" id="scoutCollapse">
                            <div class="section-content">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-map-marker-alt"></i>
                                            Region <span class="required">*</span>
                                        </label>
                                        <select class="form-control" name="region" id="region" required>
                                            <option value="" disabled selected>Select Region</option>
                                            <option value="NCR">National Capital Region (NCR)</option>
                                            <option value="CAR">Cordillera Administrative Region (CAR)</option>
                                            <option value="Region1">Region I - Ilocos Region</option>
                                            <option value="Region2">Region II - Cagayan Valley</option>
                                            <option value="Region3">Region III - Central Luzon</option>
                                            <option value="Region4A">Region IV-A - CALABARZON</option>
                                            <option value="Region4B">Region IV-B - MIMAROPA</option>
                                            <option value="Region5">Region V - Bicol Region</option>
                                            <option value="Region6">Region VI - Western Visayas</option>
                                            <option value="Region7">Region VII - Central Visayas</option>
                                            <option value="Region8">Region VIII - Eastern Visayas</option>
                                            <option value="Region9">Region IX - Zamboanga Peninsula</option>
                                            <option value="Region10">Region X - Northern Mindanao</option>
                                            <option value="Region11">Region XI - Davao Region</option>
                                            <option value="Region12">Region XII - SOCCSKSARGEN</option>
                                            <option value="Region13">Region XIII - Caraga</option>
                                            <option value="BARMM">Bangsamoro Autonomous Region</option>
                                        </select>
                                        <div class="error-message d-none" id="regionError"></div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-school"></i>
                                            District <span class="required">*</span>
                                        </label>
                                        <select class="form-control" name="district" id="district" required>
                                            <option value="" disabled selected>Select District</option>
                                            <option value="public_school">Public School District</option>
                                            <option value="private_school">Private School District</option>
                                            <option value="state_univ">State University District</option>
                                            <option value="local_school">Local School District</option>
                                            <option value="special_school">Special Education District</option>
                                        </select>
                                        <div class="error-message d-none" id="districtError"></div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label class="form-label">
                                            <i class="fas fa-building"></i>
                                            District Unit<span class="required">*</span>
                                        </label>
                                        <select class="form-control" name="district_unit" id="districtUnit" required>
                                            <option value="" disabled selected>Select District Unit</option>
                                            <option value="elementary">Elementary School Unit</option>
                                            <option value="high_school">High School Unit</option>
                                            <option value="college">College/University Unit</option>
                                            <option value="integrated">Integrated School Unit</option>
                                            <option value="vocational">Vocational School Unit</option>
                                            <option value="special_unit">Special School Unit</option>
                                        </select>
                                        <div class="error-message d-none" id="districtUnitError"></div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label class="form-label">
                                            <i class="fas fa-bullseye"></i>
                                            School <span class="required">*</span>
                                        </label>
                                        <select class="form-control" name="school" id="school" required>
                                            <option value="" disabled selected>Select School</option>
                                            <option value="tuition_fee">School Tuition Fee</option>
                                            <option value="membership">BSP Membership Fee</option>
                                            <option value="registration">School Registration</option>
                                            <option value="uniform">School Uniform & Scout Uniform</option>
                                            <option value="books">School Books & Scout Handbook</option>
                                            <option value="activity_fee">School Activity & Scout Camping</option>
                                            <option value="training">Scout Training & School Seminar</option>
                                            <option value="merit_badges">Scout Merit Badges</option>
                                            <option value="library_fee">School Library Fee</option>
                                            <option value="laboratory_fee">School Laboratory Fee</option>
                                            <option value="other">Other School/Scout Related</option>
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
                        <div class="section-header collapsed" data-bs-toggle="collapse" data-bs-target="#scoutDetailsCollapse">
                            <div>
                                <h3 class="section-title"><i class="fas fa-scroll me-2"></i>Scout Details</h3>
                                <p class="section-subtitle">Additional scout information</p>
                            </div>
                            <i class="fas fa-chevron-down section-icon"></i>
                        </div>
                        
                        <div class="collapse" id="scoutDetailsCollapse">
                            <div class="section-content">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-user-shield"></i>
                                            Scout Type <span class="required">*</span>
                                        </label>
                                        <select class="form-control" name="scout_type" id="scoutType" required>
                                            <option value="" disabled selected>Select Scout Type</option>
                                            <option value="kabataan">Kabataan Scout (6-9 yrs)</option>
                                            <option value="junior">Junior Scout (10-12 yrs)</option>
                                            <option value="senior">Senior Scout (13-16 yrs)</option>
                                            <option value="rover">Rover Scout (17-24 yrs)</option>
                                            <option value="adult">Adult Leader/Teacher</option>
                                            <option value="school_scout">School-Sponsored Scout</option>
                                        </select>
                                        <div class="error-message d-none" id="scoutTypeError"></div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-file-alt"></i>
                                            Description <span class="required">*</span>
                                        </label>
                                        <select class="form-control" name="description" id="description" required>
                                            <option value="" disabled selected>Select Description</option>
                                            <option value="new_member">New Scout Registration</option>
                                            <option value="renewal">Scout Membership Renewal</option>
                                            <option value="school_registration">School Registration</option>
                                            <option value="upgrade">Rank Upgrade</option>
                                            <option value="badge_award">Badge Award</option>
                                            <option value="camp_fee">Camp Participation Fee</option>
                                            <option value="training_fee">Training Program Fee</option>
                                            <option value="school_fee">School Fee Payment</option>
                                        </select>
                                        <div class="error-message d-none" id="descriptionError"></div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label class="form-label">
                                            <i class="fas fa-box"></i>
                                            Item Category <span class="required">*</span>
                                        </label>
                                        <select class="form-control" name="item_category" id="itemCategory" required>
                                            <option value="" disabled selected>Select Item Category</option>
                                            <option value="membership">Scout Membership Fees</option>
                                            <option value="school_fees">School Tuition Fees</option>
                                            <option value="uniform">School & Scout Uniforms</option>
                                            <option value="badges">Scout Badges & Patches</option>
                                            <option value="books">School Books & Scout Handbooks</option>
                                            <option value="equipment">Camping Equipment</option>
                                            <option value="activity">School & Scout Activities</option>
                                            <option value="others">Other School/Scout Items</option>
                                        </select>
                                        <div class="error-message d-none" id="itemCategoryError"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Amount Section -->
                    <div class="form-section">
                        <div class="section-header collapsed" data-bs-toggle="collapse" data-bs-target="#amountCollapse">
                            <div>
                                <h3 class="section-title"><i class="fas fa-money-bill-wave me-2"></i>Payment Amount</h3>
                                <p class="section-subtitle">Enter the payment amount</p>
                            </div>
                            <i class="fas fa-chevron-down section-icon"></i>
                        </div>
                        
                        <div class="collapse" id="amountCollapse">
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

        <!-- QR Ph Display View (Hidden Initially) -->
        <div id="qrView" class="animate__animated animate__fadeIn" style="display: none;">
            <!-- QR Ph Card -->
            <div class="qrph-container">
                <div class="qrph-header">
                    <div class="qrph-logo">
                        <div class="qrph-icon">
                            <i class="fas fa-qrcode"></i>
                        </div>
                        <div>
                            <h3 class="qrph-title">QR Ph Payment</h3>
                            <p class="qrph-subtitle">Scan to Pay via BSP QR Ph</p>
                        </div>
                    </div>
                </div>

                <div class="success-message">
                    <div class="success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h2 class="text-success">QR Ph Generated Successfully!</h2>
                    <p class="text-muted">Scan this QR Ph code with your bank or e-wallet app to complete payment</p>
                    
                    <div class="qrph-card">
                        <div class="qrph-merchant">
                            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/Boy_Scouts_of_the_Philippines.svg/1200px-Boy_Scouts_of_the_Philippines.svg.png" 
                                 alt="BSP Logo" class="qrph-merchant-logo">
                            <div>
                                <div class="qrph-merchant-name">Boy Scouts of the Philippines</div>
                                <div class="text-muted">Official Payment QR Ph</div>
                            </div>
                        </div>
                        
                        <div class="qrph-amount" id="qrphAmount">₱0.00</div>
                        
                        <div class="qrph-code-container">
                            <div class="qrph-overlay">
                                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8c/Boy_Scouts_of_the_Philippines.svg/1200px-Boy_Scouts_of_the_Philippines.svg.png" 
                                     alt="BSP Logo" class="qrph-logo-small">
                            </div>
                            <!-- Static QR Code Image -->
                            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQwIiBoZWlnaHQ9IjI0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZmZmZmZmIi8+PHBhdGggZD0iTTAgMGgyNDB2MjQwSDB6IiBmaWxsPSIjMWQ0ZWQ4Ii8+PHBhdGggZD0iTTQwIDQwaDE2MHYxNjBINDB6TTgwIDgwaDgwdjgwSDgweiIgZmlsbD0iI2ZmZmZmZiIvPjxjaXJjbGUgY3g9IjEyMCIgY3k9IjEyMCIgcj0iMjAiIGZpbGw9IiNmNTllMGIiLz48L3N2Zz4=" 
                                 alt="QR Code" 
                                 style="width: 200px; height: 200px;">
                        </div>
                        
                        <div class="transaction-details mt-4">
                            <div class="row">
                                <div class="col-md-6 text-start">
                                    <small class="text-muted">Transaction ID:</small>
                                    <div class="transaction-id" id="qrphTransactionIdText">BSP-1234567890</div>
                                </div>
                                <div class="col-md-6 text-end">
                                    <small class="text-muted">Date & Time:</small>
                                    <div class="fw-bold" id="qrphDateText">January 31, 2024 14:30:00</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Instructions -->
                    <div class="qrph-instructions">
                        <h6><i class="fas fa-info-circle me-2"></i>How to Pay using QR Ph:</h6>
                        <ul class="qrph-instruction-list">
                            <li class="qrph-instruction-item">
                                <div class="qrph-instruction-number">1</div>
                                <div>Open your bank or e-wallet app</div>
                            </li>
                            <li class="qrph-instruction-item">
                                <div class="qrph-instruction-number">2</div>
                                <div>Tap "Scan QR" or "QR Ph" in the app</div>
                            </li>
                            <li class="qrph-instruction-item">
                                <div class="qrph-instruction-number">3</div>
                                <div>Point your camera at the QR code above</div>
                            </li>
                            <li class="qrph-instruction-item">
                                <div class="qrph-instruction-number">4</div>
                                <div>Verify payment details and confirm</div>
                            </li>
                            <li class="qrph-instruction-item">
                                <div class="qrph-instruction-number">5</div>
                                <div>Wait for payment confirmation</div>
                            </li>
                        </ul>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="navigation-buttons">
                        <button class="nav-btn nav-btn-primary" onclick="window.location.reload()">
                            <i class="fas fa-plus-circle me-1"></i>
                            New Payment
                        </button>
                        <button class="nav-btn nav-btn-secondary" onclick="showFormView()">
                            <i class="fas fa-arrow-left me-1"></i>
                            Back to Form
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Methods Footer -->
        <div class="footer animate__animated animate__fadeInUp" id="footer">
          
            <div class="powered-by">
                <span class="text-muted">Payment processing powered by</span>
                <img src="https://via.placeholder.com/150x40/1B5E20/FFFFFF?text=BSP+QR+Ph" alt="BSP QR Ph">
            </div>
        </div>
    </div>

    <!-- Preview Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-file-invoice-dollar me-2"></i>
                        Payment Summary
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <h6 class="text-secondary mb-3">Personal Information</h6>
                    <table class="summary-table mb-4">
                        <tr>
                            <td class="label">Full Name</td>
                            <td class="value" id="previewName">-</td>
                        </tr>
                        <tr>
                            <td class="label">Mobile</td>
                            <td class="value" id="previewMobile">-</td>
                        </tr>
                        <tr>
                            <td class="label">Email</td>
                            <td class="value" id="previewEmail">-</td>
                        </tr>
                        <tr>
                            <td class="label">Payment To</td>
                            <td class="value" id="previewPaymentType">-</td>
                        </tr>
                        <tr>
                            <td class="label">Region</td>
                            <td class="value" id="previewRegion">-</td>
                        </tr>
                        <tr>
                            <td class="label">District</td>
                            <td class="value" id="previewDistrict">-</td>
                        </tr>
                        <tr>
                            <td class="label">District Unit</td>
                            <td class="value" id="previewDistrictUnit">-</td>
                        </tr>
                    </table>
                    
                    <h6 class="text-secondary mb-3">Scout Details</h6>
                    <table class="summary-table mb-4">
                        <tr>
                            <td class="label">Scout Type</td>
                            <td class="value" id="previewScoutType">-</td>
                        </tr>
                        <tr>
                            <td class="label">Description</td>
                            <td class="value" id="previewDescription">-</td>
                        </tr>
                        <tr>
                            <td class="label">Item Category</td>
                            <td class="value" id="previewItemCategory">-</td>
                        </tr>
                        <tr>
                            <td class="label">School</td>
                            <td class="value" id="previewSchool">-</td>
                        </tr>
                    </table>
                    
                    <h6 class="text-secondary mb-3">Payment Details</h6>
                    <div class="payment-summary">
                        <div class="payment-row">
                            <span>Amount</span>
                            <span id="previewAmount">₱0.00</span>
                        </div>
                        <div class="payment-row">
                            <span>Service Fee</span>
                            <span id="previewFee">₱20.00</span>
                        </div>
                        <div class="payment-row">
                            <span>Total Amount</span>
                            <span class="total-amount" id="previewTotal">₱0.00</span>
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
    <script>
        // Global variables
        let currentPaymentData = {};
        
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
                    previewModal.show();
                }
            });

            // Confirm payment button event listener
            document.getElementById('confirmPaymentBtn').addEventListener('click', function() {
                if (validateForm()) {
                    showQRPhCode();
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
                updateProgress();
            });

            // Payment card click handlers
            document.querySelectorAll('.payment-card').forEach(card => {
                const input = card.querySelector('input[type="radio"]');
                card.addEventListener('click', function(e) {
                    if (e.target !== input) {
                        input.checked = true;
                        updateCardStates();
                        updateProgress();
                        
                        // Clear error state
                        document.getElementById('paymentTypeError').classList.add('d-none');
                        document.querySelectorAll('.payment-card').forEach(c => c.classList.remove('border-danger'));
                    }
                });
                
                input.addEventListener('change', function() {
                    updateCardStates();
                    updateProgress();
                });
            });

            // Real-time validation on blur
            document.querySelectorAll('input, select').forEach(element => {
                element.addEventListener('blur', validateField);
                element.addEventListener('input', function() {
                    // Clear error when user starts typing
                    const errorId = this.id + 'Error';
                    const errorElement = document.getElementById(errorId);
                    if (errorElement) {
                        errorElement.classList.add('d-none');
                        this.classList.remove('is-invalid');
                    }
                    
                    // Update progress indicator
                    updateProgress();
                });
            });

            // Initialize progress indicator
            updateProgress();
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
            const paymentTypeSelected = document.querySelector('input[name="payment_type"]:checked');
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
                document.getElementById('amount').classList.add('is-invalid');
                isValid = false;
            }
            
            // Store payment data if valid
            if (isValid) {
                const paymentTypeElement = document.querySelector('input[name="payment_type"]:checked');
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
            
            switch(field.id) {
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
            
            updateProgress();
        }

        function updatePreview() {
            // Update preview with form values
            document.getElementById('previewName').textContent = document.getElementById('fullName').value;
            document.getElementById('previewMobile').textContent = document.getElementById('mobileNumber').value;
            document.getElementById('previewEmail').textContent = document.getElementById('email').value;
            
            // Payment type
            const paymentType = document.querySelector('input[name="payment_type"]:checked');
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

        function showQRPhCode() {
            // Show QR view and hide form view
            document.getElementById('formView').style.display = 'none';
            document.getElementById('qrView').style.display = 'block';
            document.getElementById('footer').style.display = 'none';
            
            // Update progress indicator
            document.getElementById('step1').classList.remove('active');
            document.getElementById('step1').classList.add('completed');
            document.getElementById('step2').classList.remove('active');
            document.getElementById('step2').classList.add('completed');
            document.getElementById('step3').classList.add('active');
            
            // Update QR Ph details
            document.getElementById('qrphAmount').textContent = '₱' + currentPaymentData.total.toFixed(2);
            document.getElementById('qrphTransactionIdText').textContent = currentPaymentData.transactionId;
            document.getElementById('qrphDateText').textContent = currentPaymentData.date;
        }

        function showFormView() {
            // Show form view and hide QR view
            document.getElementById('formView').style.display = 'block';
            document.getElementById('qrView').style.display = 'none';
            document.getElementById('footer').style.display = 'block';
            
            // Reset progress indicator
            document.getElementById('step1').classList.remove('completed');
            document.getElementById('step1').classList.add('active');
            document.getElementById('step2').classList.remove('completed');
            document.getElementById('step3').classList.remove('active');
        }

        function updateProgress() {
            const step2 = document.getElementById('step2');
            const step3 = document.getElementById('step3');
            
            const name = document.getElementById('fullName').value.trim();
            const mobile = document.getElementById('mobileNumber').value.trim();
            const email = document.getElementById('email').value.trim();
            const region = document.getElementById('region').value;
            const district = document.getElementById('district').value;
            const districtUnit = document.getElementById('districtUnit').value;
            const school = document.getElementById('school').value;
            const scoutType = document.getElementById('scoutType').value;
            const description = document.getElementById('description').value;
            const itemCategory = document.getElementById('itemCategory').value;
            const amount = document.getElementById('amount').value;
            const paymentType = document.querySelector('input[name="payment_type"]:checked');
            
            const step1Complete = name && mobile && email && region && district && 
                                 districtUnit && school && scoutType && description && 
                                 itemCategory && amount && paymentType;
            
            if (step1Complete) {
                step2.classList.add('active');
            } else {
                step2.classList.remove('active');
                step2.classList.remove('completed');
                step3.classList.remove('active');
                step3.classList.remove('completed');
            }
            
            // Update step 3 based on view
            if (document.getElementById('qrView').style.display === 'block') {
                step2.classList.add('completed');
                step3.classList.add('active');
            }
        }
    </script>
</body>
</html>