<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
    <title>BSP-Manila Registration</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet" />
     <link href="/assets/css/website/registration.css" rel="stylesheet" />
</head>

<body>
    <div class="card">
        <div class="title"><span><img src="assets/images/boyscouts_logofinal.png" alt="BSP fleur de lis" /></span> BSP - Manila Register </div>
        <div class="role-badge" id="roleDisplay"><i class="bi bi-compass me-1"></i> Scout / Scout Leader Registration
            Form</div>

        <!-- Scout Form -->
        <div id="scoutForm" class="form-section active-form">
            <div class="form-grid">
                <div class="field full-width"><label class="required"><i class="bi bi-person"></i> full
                        name</label><input type="text" id="scoutName" placeholder="Juan dela Cruz" />
                    <div class="error-text" id="errScoutName"></div>
                </div>
                <div class="field"><label class="required"><i class="bi bi-envelope"></i> email</label><input
                        type="email" id="scoutEmail" placeholder="scout@example.com" />
                    <div class="error-text" id="errScoutEmail"></div>
                </div>
                <div class="field"><label class="required"><i class="bi bi-telephone"></i> contact</label><input
                        type="tel" id="scoutPhone" placeholder="09XXXXXXXXX" />
                    <div class="error-text" id="errScoutPhone"></div>
                </div>
                <div class="field"><label class="required"><i class="bi bi-star"></i> member type</label><select
                        id="scoutMemberType">
                        <option value="">-- select --</option>
                        <option>Scout leader</option>
                        <option>Scout</option>
                    </select>
                    <div class="error-text" id="errScoutMemberType"></div>
                </div>
                <div class="field"><label class="required"><i class="bi bi-gear"></i> scout type</label><select
                        id="scoutType">
                        <option value="">-- select scout type --</option>
                        <option>Sea Scout</option>
                        <option>Rover Scout</option>
                        <option>Venture Scout</option>
                        <option>Cub Scout</option>
                    </select>
                    <div class="error-text" id="errScoutType"></div>
                </div>
                <div class="field"><label class="required"><i class="bi bi-building"></i> council</label><select
                        id="scoutCouncil">
                        <option value="">-- select council --</option>
                        <option>Silver Oak Council</option>
                        <option>Riverside Council</option>
                        <option>Golden Gate Council</option>
                        <option>Great Lakes Council</option>
                    </select>
                    <div class="error-text" id="errScoutCouncil"></div>
                </div>
                <div class="field"><label class="required"><i class="bi bi-pin-map"></i> district</label><select
                        id="scoutDistrict">
                        <option value="">-- select district --</option>
                        <option>Riverside</option>
                        <option>Highland</option>
                        <option>Mountain View</option>
                        <option>Lakeside</option>
                    </select>
                    <div class="error-text" id="errScoutDistrict"></div>
                </div>
                <div class="field"><label class="required"><i class="bi bi-layers"></i> district unit</label><select
                        id="scoutUnit">
                        <option value="">-- select unit --</option>
                        <option>12th unit</option>
                        <option>5th unit</option>
                        <option>8th unit</option>
                        <option>3rd unit</option>
                    </select>
                    <div class="error-text" id="errScoutUnit"></div>
                </div>
                <div class="field"><label class="required"><i class="bi bi-book"></i> school</label><select
                        id="scoutSchool">
                        <option value="">-- select school --</option>
                        <option>Springfield High</option>
                        <option>Riverside Academy</option>
                        <option>Valley Middle School</option>
                        <option>Homeschool</option>
                    </select>
                    <div class="error-text" id="errScoutSchool"></div>
                </div>
                <div class="field"><label class="required"><i class="bi bi-card-text"></i> member ID</label><input
                        type="text" id="scoutMemberId" placeholder="BSA-12345" />
                    <div class="error-text" id="errScoutMemberId"></div>
                </div>
                <div class="field full-width"><label class="required"><i class="bi bi-upc-scan"></i> AUR
                        number</label><input type="text" id="scoutAur" placeholder="AUR-xxxx" />
                    <div class="error-text" id="errScoutAur"></div>
                </div>
                <div class="field"><label class="required"><i class="bi bi-person-badge"></i> username</label><input
                        type="text" id="scoutUsername" placeholder="choose username" />
                    <div class="error-text" id="errScoutUsername"></div>
                </div>

                <div class="field">
                    <label class="required"><i class="bi bi-lock"></i> password</label>
                    <div class="password-wrapper">
                        <input type="password" id="scoutPass" placeholder="······" />
                        <button type="button" class="toggle-password" data-target="scoutPass"><i
                                class="bi bi-eye"></i></button>
                    </div>
                    <div class="error-text" id="errScoutPass"></div>
                </div>

                <div class="field full-width">
                    <label class="required"><i class="bi bi-lock"></i> confirm password</label>
                    <div class="password-wrapper">
                        <input type="password" id="scoutConfirm" placeholder="······" />
                        <button type="button" class="toggle-password" data-target="scoutConfirm"><i
                                class="bi bi-eye"></i></button>
                    </div>
                    <div class="error-text" id="errScoutConfirm"></div>
                </div>
            </div>
        </div>
        <!-- Council Form -->
        <div id="councilForm" class="form-section">
            <div class="form-grid">
                <div class="field full-width"><label class="required"><i class="bi bi-building"></i> Council
                        Name</label><input type="text" id="councilName" placeholder="Silver Oak Council" />
                    <div class="error-text" id="errCouncilName"></div>
                </div>
                <div class="field"><label class="required"><i class="bi bi-person"></i> Full Name</label><input
                        type="text" id="councilRepName" placeholder="Juan dela Cruz" />
                    <div class="error-text" id="errCouncilRepName"></div>
                </div>
                <div class="field"><label class="required"><i class="bi bi-envelope"></i> Email</label><input
                        type="email" id="councilEmail" placeholder="council@example.org" />
                    <div class="error-text" id="errCouncilEmail"></div>
                </div>
                <div class="field"><label class="required"><i class="bi bi-telephone"></i> Contact #</label><input
                        type="tel" id="councilPhone" placeholder="09XXXXXXXXX" />
                    <div class="error-text" id="errCouncilPhone"></div>
                </div>
                <div class="field"><label class="required"><i class="bi bi-card-text"></i> Member ID</label><input
                        type="text" id="councilMemberId" placeholder="C-9876" />
                    <div class="error-text" id="errCouncilMemberId"></div>
                </div>
                <div class="field"><label class="required"><i class="bi bi-person-badge"></i> Username</label><input
                        type="text" id="councilUsername" placeholder="choose username" />
                    <div class="error-text" id="errCouncilUsername"></div>
                </div>


                <div class="field">
                    <label class="required"><i class="bi bi-lock"></i> password</label>
                    <div class="password-wrapper">
                        <input type="password" id="councilPass" placeholder="······" />
                        <button type="button" class="toggle-password" data-target="councilPass"><i
                                class="bi bi-eye"></i></button>
                    </div>
                    <div class="error-text" id="errCouncilPass"></div>
                </div>

                <div class="field full-width">
                    <label class="required"><i class="bi bi-lock"></i> confirm password</label>
                    <div class="password-wrapper">
                        <input type="password" id="councilConfirm" placeholder="······" />
                        <button type="button" class="toggle-password" data-target="councilConfirm"><i
                                class="bi bi-eye"></i></button>
                    </div>
                    <div class="error-text" id="errCouncilConfirm"></div>
                </div>
            </div>
        </div>


        <button class="btn-primary" id="previewBtn" disabled><i class="bi bi-eye"></i> preview & review →</button>
    </div>

    <!-- preview modal -->
    <div class="modal-overlay" id="previewModal">
        <div class="modal-card preview-modal">
            <div class="preview-header">
                <h2>
                    <i class="bi bi-file-text"></i>
                    Review Your Information
                </h2>
                <button class="preview-close-btn" id="closePreviewBtn">
                    <i class="bi bi-x"></i>
                </button>
            </div>
            
            <div class="preview-content">
                <div class="preview-section">
                    <div class="preview-section-title">
                        <i class="bi bi-person-circle"></i>
                        Personal Information
                    </div>
                    <div id="previewContent" class="preview-grid"></div>
                </div>
            </div>

            <div class="preview-footer">
                <button class="preview-btn preview-btn-secondary" id="editInfoBtn">
                    <i class="bi bi-pencil"></i>
                    Edit Information
                </button>
                <button class="preview-btn preview-btn-primary" id="SubmitBtn">
                    <i class="bi bi-check-circle"></i>
                    Confirm 
                </button>
            </div>
        </div>
    </div>

    <!-- role selection modal -->
    <div class="modal-overlay active" id="roleModal">
        <div class="modal-card">
            <button class="modal-close" id="closeModalBtn"><i class="bi bi-x"></i></button>
            <div class="modal-header"><i class="bi bi-person-circle"></i> I’m registering as</div>
            <label class="role-tile selected" id="modalOptScout">
                <input type="radio" name="modalRole" value="scout" checked />
                <span><i class="bi bi-compass"></i> Scout / Leader</span>
            </label>
            <label class="role-tile" id="modalOptCouncil">
                <input type="radio" name="modalRole" value="council" />
                <span><i class="bi bi-building"></i> Council representative</span>
            </label>
            <button class="save-modern" id="saveRoleBtn"><i class="bi bi-check-lg"></i> Confirm</button>
        </div>
    </div>

    <script>
        (function () {
            // role switching
            const roleModal = document.getElementById('roleModal');
            const closeRoleBtn = document.getElementById('closeModalBtn');
            const saveRoleBtn = document.getElementById('saveRoleBtn');
            const scoutRadio = document.querySelector('#modalOptScout input');
            const councilRadio = document.querySelector('#modalOptCouncil input');
            const optScout = document.getElementById('modalOptScout');
            const optCouncil = document.getElementById('modalOptCouncil');
            const scoutForm = document.getElementById('scoutForm');
            const councilForm = document.getElementById('councilForm');
            const roleDisplay = document.getElementById('roleDisplay');
            const previewBtn = document.getElementById('previewBtn');

            function updateTiles() {
                if (scoutRadio.checked) { optScout.classList.add('selected'); optCouncil.classList.remove('selected'); }
                else { optCouncil.classList.add('selected'); optScout.classList.remove('selected'); }
            }
            function applyRoleAndChip() {
                if (scoutRadio.checked) {
                    scoutForm.classList.add('active-form'); councilForm.classList.remove('active-form');
                    roleDisplay.innerHTML = '<i class="bi bi-compass me-1"></i> Scout / Scout Leader Registration Form';
                } else {
                    councilForm.classList.add('active-form'); scoutForm.classList.remove('active-form');
                    roleDisplay.innerHTML = '<i class="bi bi-building me-1"></i> Council Registration Form';
                }
                clearAllErrors();
                setTimeout(() => { validateAll({ silent: true }); }, 0);
            }

            function clearAllErrors() {
                document.querySelectorAll('input, select, textarea').forEach(el => el.classList.remove('invalid'));
                document.querySelectorAll('.error-text').forEach(span => span.innerText = '');
            }

            saveRoleBtn.addEventListener('click', () => { applyRoleAndChip(); roleModal.classList.remove('active'); });
            closeRoleBtn.addEventListener('click', (e) => { e.preventDefault(); roleModal.classList.remove('active'); });
            scoutRadio.addEventListener('change', updateTiles);
            councilRadio.addEventListener('change', updateTiles);
            optScout.addEventListener('click', (e) => { if (e.target.tagName !== 'INPUT') { scoutRadio.checked = true; updateTiles(); } });
            optCouncil.addEventListener('click', (e) => { if (e.target.tagName !== 'INPUT') { councilRadio.checked = true; updateTiles(); } });
            roleModal.addEventListener('click', (e) => { if (e.target === roleModal) roleModal.classList.remove('active'); });
            window.addEventListener('load', function () {
                scoutRadio.checked = true; updateTiles(); applyRoleAndChip();
                clearAllErrors();
                validateAll({ silent: true });
            });

            // PASSWORD TOGGLE
            document.querySelectorAll('.toggle-password').forEach(btn => {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('data-target');
                    const input = document.getElementById(targetId);
                    if (!input) return;
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);

                    const icon = this.querySelector('i');
                    if (icon) {
                        icon.className = type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash';
                    }
                });
            });

            // Validation helpers
            function markValid(element, errorEl, msg = '') {
                element.classList.remove('invalid');
                errorEl.innerText = msg;
            }
            function markInvalid(element, errorEl, msg) {
                element.classList.add('invalid');
                errorEl.innerText = msg;
            }

            // Scout validation
            function validateScout(silent = false) {
                let valid = true;
                let name = document.getElementById('scoutName'); let errName = document.getElementById('errScoutName');
                if (!name.value.trim()) { if (!silent) markInvalid(name, errName, 'Full name required'); valid = false; } else { if (!silent) markValid(name, errName); }

                let email = document.getElementById('scoutEmail'); let errEmail = document.getElementById('errScoutEmail');
                const emailOk = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim());
                if (!email.value.trim() || !emailOk) { if (!silent) markInvalid(email, errEmail, 'Valid email required'); valid = false; } else { if (!silent) markValid(email, errEmail); }

                let phone = document.getElementById('scoutPhone'); let errPhone = document.getElementById('errScoutPhone');
                if (!phone.value.trim()) { if (!silent) markInvalid(phone, errPhone, 'Contact required'); valid = false; } else { if (!silent) markValid(phone, errPhone); }

                let memberType = document.getElementById('scoutMemberType'); let errMT = document.getElementById('errScoutMemberType');
                if (!memberType.value) { if (!silent) markInvalid(memberType, errMT, 'Select member type'); valid = false; } else { if (!silent) markValid(memberType, errMT); }

                let scoutType = document.getElementById('scoutType'); let errST = document.getElementById('errScoutType');
                if (!scoutType.value) { if (!silent) markInvalid(scoutType, errST, 'Select scout type'); valid = false; } else { if (!silent) markValid(scoutType, errST); }

                let council = document.getElementById('scoutCouncil'); let errCouncil = document.getElementById('errScoutCouncil');
                if (!council.value) { if (!silent) markInvalid(council, errCouncil, 'Select council'); valid = false; } else { if (!silent) markValid(council, errCouncil); }

                let district = document.getElementById('scoutDistrict'); let errDistrict = document.getElementById('errScoutDistrict');
                if (!district.value) { if (!silent) markInvalid(district, errDistrict, 'Select district'); valid = false; } else { if (!silent) markValid(district, errDistrict); }

                let unit = document.getElementById('scoutUnit'); let errUnit = document.getElementById('errScoutUnit');
                if (!unit.value) { if (!silent) markInvalid(unit, errUnit, 'Select unit'); valid = false; } else { if (!silent) markValid(unit, errUnit); }

                let school = document.getElementById('scoutSchool'); let errSchool = document.getElementById('errScoutSchool');
                if (!school.value) { if (!silent) markInvalid(school, errSchool, 'Select school'); valid = false; } else { if (!silent) markValid(school, errSchool); }

                let memberId = document.getElementById('scoutMemberId'); let errMemberId = document.getElementById('errScoutMemberId');
                if (!memberId.value.trim()) { if (!silent) markInvalid(memberId, errMemberId, 'Member ID required'); valid = false; } else { if (!silent) markValid(memberId, errMemberId); }

                let aur = document.getElementById('scoutAur'); let errAur = document.getElementById('errScoutAur');
                if (!aur.value.trim()) { if (!silent) markInvalid(aur, errAur, 'AUR number required'); valid = false; } else { if (!silent) markValid(aur, errAur); }

                let username = document.getElementById('scoutUsername'); let errUname = document.getElementById('errScoutUsername');
                if (!username.value.trim()) { if (!silent) markInvalid(username, errUname, 'Username required'); valid = false; } else { if (!silent) markValid(username, errUname); }

                let pass = document.getElementById('scoutPass'); let errPass = document.getElementById('errScoutPass');
                let confirm = document.getElementById('scoutConfirm'); let errConfirm = document.getElementById('errScoutConfirm');
                
                // Password validation - only minimum 8 characters
                if (!pass.value) { 
                    if (!silent) markInvalid(pass, errPass, 'Password required'); 
                    valid = false; 
                } else if (pass.value.length < 8) { 
                    if (!silent) markInvalid(pass, errPass, 'Password must be at least 8 characters'); 
                    valid = false; 
                } else { 
                    if (!silent) markValid(pass, errPass); 
                }
                
                if (pass.value !== confirm.value) { 
                    if (!silent) markInvalid(confirm, errConfirm, 'Passwords must match'); 
                    valid = false; 
                } else if (pass.value && pass.value.length >= 8 && !silent) { 
                    markValid(confirm, errConfirm); 
                }
                return valid;
            }

            // Council validation
            function validateCouncil(silent = false) {
                let valid = true;
                let cName = document.getElementById('councilName'); let errCName = document.getElementById('errCouncilName');
                if (!cName.value.trim()) { if (!silent) markInvalid(cName, errCName, 'Council name required'); valid = false; } else { if (!silent) markValid(cName, errCName); }
                let rep = document.getElementById('councilRepName'); let errRep = document.getElementById('errCouncilRepName');
                if (!rep.value.trim()) { if (!silent) markInvalid(rep, errRep, 'Rep name required'); valid = false; } else { if (!silent) markValid(rep, errRep); }
                let email = document.getElementById('councilEmail'); let errEmail = document.getElementById('errCouncilEmail');
                const emailOk = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim());
                if (!email.value.trim() || !emailOk) { if (!silent) markInvalid(email, errEmail, 'Valid email required'); valid = false; } else { if (!silent) markValid(email, errEmail); }
                let phone = document.getElementById('councilPhone'); let errPhone = document.getElementById('errCouncilPhone');
                if (!phone.value.trim()) { if (!silent) markInvalid(phone, errPhone, 'Contact required'); valid = false; } else { if (!silent) markValid(phone, errPhone); }
                let memberId = document.getElementById('councilMemberId'); let errMid = document.getElementById('errCouncilMemberId');
                if (!memberId.value.trim()) { if (!silent) markInvalid(memberId, errMid, 'Member ID required'); valid = false; } else { if (!silent) markValid(memberId, errMid); }
                let username = document.getElementById('councilUsername'); let errUname = document.getElementById('errCouncilUsername');
                if (!username.value.trim()) { if (!silent) markInvalid(username, errUname, 'Username required'); valid = false; } else { if (!silent) markValid(username, errUname); }
                let pass = document.getElementById('councilPass'); let errPass = document.getElementById('errCouncilPass');
                let confirm = document.getElementById('councilConfirm'); let errConfirm = document.getElementById('errCouncilConfirm');
                
                // Password validation - only minimum 8 characters
                if (!pass.value) { 
                    if (!silent) markInvalid(pass, errPass, 'Password required'); 
                    valid = false; 
                } else if (pass.value.length < 8) { 
                    if (!silent) markInvalid(pass, errPass, 'Password must be at least 8 characters'); 
                    valid = false; 
                } else { 
                    if (!silent) markValid(pass, errPass); 
                }
                
                if (pass.value !== confirm.value) { 
                    if (!silent) markInvalid(confirm, errConfirm, 'Passwords must match'); 
                    valid = false; 
                } else if (pass.value && pass.value.length >= 8 && !silent) { 
                    markValid(confirm, errConfirm); 
                }
                return valid;
            }

            function validateAll(options = { silent: false }) {
                const isScout = scoutRadio.checked;
                const overallValid = isScout ? validateScout(options.silent) : validateCouncil(options.silent);
                previewBtn.disabled = !overallValid;
                return overallValid;
            }

            // Attach listeners
            const scoutIds = ['scoutName', 'scoutEmail', 'scoutPhone', 'scoutMemberType', 'scoutType', 'scoutCouncil', 'scoutDistrict', 'scoutUnit', 'scoutSchool', 'scoutMemberId', 'scoutAur', 'scoutUsername', 'scoutPass', 'scoutConfirm'];
            const councilIds = ['councilName', 'councilRepName', 'councilEmail', 'councilPhone', 'councilMemberId', 'councilUsername', 'councilPass', 'councilConfirm'];
            [...scoutIds, ...councilIds].forEach(id => {
                let el = document.getElementById(id);
                if (el) {
                    el.addEventListener('input', () => validateAll({ silent: false }));
                    if (el.tagName === 'SELECT') el.addEventListener('change', () => validateAll({ silent: false }));
                }
            });

            // preview modal
            const previewModal = document.getElementById('previewModal');
            const closePreviewBtn = document.getElementById('closePreviewBtn');
            const editInfoBtn = document.getElementById('editInfoBtn');
            const previewContent = document.getElementById('previewContent');
           

            function buildPreview() {
                const isScout = scoutRadio.checked;
                let html = '';
                if (isScout) {
                    const fields = [
                        { label: 'Full Name', id: 'scoutName' },
                        { label: 'Email Address', id: 'scoutEmail' },
                        { label: 'Contact Number', id: 'scoutPhone' },
                        { label: 'Member Type', id: 'scoutMemberType' },
                        { label: 'Scout Type', id: 'scoutType' },
                        { label: 'Council', id: 'scoutCouncil' },
                        { label: 'District', id: 'scoutDistrict' },
                        { label: 'District Unit', id: 'scoutUnit' },
                        { label: 'School', id: 'scoutSchool' },
                        { label: 'Member ID', id: 'scoutMemberId' },
                        { label: 'AUR Number', id: 'scoutAur' },
                        { label: 'Username', id: 'scoutUsername' },
                        { label: 'Password', id: 'scoutPass', isPassword: true },
                        { label: 'Confirm Password', id: 'scoutConfirm', isPassword: true }
                    ];

                    fields.forEach(field => {
                        let el = document.getElementById(field.id);
                        let val = el ? (el.tagName === 'SELECT' ? (el.options[el.selectedIndex]?.text || '') : el.value) : '';
                        
                        // Show actual password, not dots
                        if (!val || val === '') val = '(not provided)';
                        
                        const fullWidthClass = field.id === 'scoutAur' || field.id === 'scoutName' ? 'full-width' : '';
                        const passwordClass = field.isPassword ? 'password-value' : '';
                        html += `<div class="preview-item ${fullWidthClass}">
                            <span class="preview-label">${field.label}</span>
                            <span class="preview-value ${!val || val === '(not provided)' ? 'empty' : ''} ${passwordClass}">${val}</span>
                        </div>`;
                    });
                } else {
                    const fields = [
                        { label: 'Council Name', id: 'councilName' },
                        { label: 'Representative Name', id: 'councilRepName' },
                        { label: 'Email Address', id: 'councilEmail' },
                        { label: 'Contact Number', id: 'councilPhone' },
                        { label: 'Member ID', id: 'councilMemberId' },
                        { label: 'Username', id: 'councilUsername' },
                        { label: 'Password', id: 'councilPass', isPassword: true },
                        { label: 'Confirm Password', id: 'councilConfirm', isPassword: true }
                    ];

                    fields.forEach(field => {
                        let el = document.getElementById(field.id);
                        let val = el ? el.value : '';
                        
                        // Show actual password, not dots
                        if (!val || val === '') val = '(not provided)';
                        
                        const fullWidthClass = field.id === 'councilName' ? 'full-width' : '';
                        const passwordClass = field.isPassword ? 'password-value' : '';
                        html += `<div class="preview-item ${fullWidthClass}">
                            <span class="preview-label">${field.label}</span>
                            <span class="preview-value ${!val || val === '(not provided)' ? 'empty' : ''} ${passwordClass}">${val}</span>
                        </div>`;
                    });
                }
                return html;
            }

            previewBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (!validateAll({ silent: false })) return;
                previewContent.innerHTML = buildPreview();
                previewModal.classList.add('active');
            });

            function closePreview() {
                previewModal.classList.remove('active');
            }

            closePreviewBtn.addEventListener('click', closePreview);
            editInfoBtn.addEventListener('click', closePreview);
            
            previewModal.addEventListener('click', (e) => { 
                if (e.target === previewModal) closePreview(); 
            });


            validateAll({ silent: true });
        })();
    </script>
</body>

</html>