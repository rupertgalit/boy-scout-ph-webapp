<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BSP QR Ph | Boy Scouts of the Philippines</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <link href="/assets/css/form.css" rel="stylesheet" />
</head>

<body>
    <div class="main-container">

        <div class="qrph-container animate__animated animate__fadeIn">
            <div class="header-container animate__animated animate__fadeInDown">
                <div class="header-row row align-items-center">
                    <div class="col-lg-2 col-md-3 text-center text-md-start">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Flag_of_the_Philippines.svg"
                            alt="Philippine Flag" class="header-flag float-animation">
                    </div>

                    <div class="col-lg-8 col-md-6 header-center">
                        <h3>BOY SCOUTS OF THE PHILIPPINES</h3>
                        <p class="subtitle">National Headquarters</p>
                        <p class="tagline">"Be Prepared"</p>
                        <div class="badge-container">
                            <i class="fas fa-shield-alt me-2"></i>
                            <span>Official Payment Portal</span>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 text-center text-md-end">
                        <img src="assets\images\boyscouts_logofinal.png" alt="BSP Logo"
                            class="header-logo float-animation">
                    </div>
                </div>
            </div>


            <div class="qrph-code-container" id="qrCodeContainer">
                <!-- <div class="qrph-overlay">
                    <img src="assets\images\boyscouts_logofinal.png"
                        alt="BSP Logo" class="qrph-logo-small">
                </div>
                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQwIiBoZWlnaHQ9IjI0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZmZmZmZmIi8+PHBhdGggZD0iTTAgMGgyNDB2MjQwSDB6IiBmaWxsPSIjMWQ0ZWQ4Ii8+PHBhdGggZD0iTTQwIDQwaDE2MHYxNjBINDB6TTgwIDgwaDgwdjgwSDgweiIgZmlsbD0iI2ZmZmZmZiIvPjxjaXJjbGUgY3g9IjEyMCIgY3k9IjEyMCIgcj0iMjAiIGZpbGw9IiNmNTllMGIiLz48L3N2Zz4="
                    alt="QR Code" style="width: 200px; height: 200px;"> -->
            </div>
            <div class="navigation-buttons">

                <button class="nav-btn nav-btn-success" id="downloadQrBtn">
                    <i class="fas fa-download me-1"></i>
                    Download QR Code
                </button>

            </div>

            <div class="qrph-instructions">
                <h6><i class="fas fa-info-circle me-2"></i>How to Pay using QR Ph:</h6>
                <ul class="qrph-instruction-list">
                    <li class="qrph-instruction-item">
                        <div class="qrph-instruction-number">1</div>
                        <div>Open your bank or e-wallet app (GCash, Maya, BPI, etc.)</div>
                    </li>
                    <li class="qrph-instruction-item">
                        <div class="qrph-instruction-number">2</div>
                        <div>Look for a "Scan to Pay" option.</div>
                    </li>
                    <li class="qrph-instruction-item">
                        <div class="qrph-instruction-number">3</div>
                        <div>Scan QR code show above using you E-wallet or Bank app.</div>
                    </li>
                    <li class="qrph-instruction-item">
                        <div class="qrph-instruction-number">4</div>
                        <div>Confirm that the payment details(amount, recipient) are correct.</div>
                    </li>
                    <li class="qrph-instruction-item">
                        <div class="qrph-instruction-number">5</div>
                        <div>Complete the transaction are wait for confirmation from your Bank.</div>
                    </li>
                </ul>
            </div>


        </div>
    </div>




    <script src="/assets/js/qrcode-lib/easy.qrcode.min.js"></script>

    <script>
        function downloadQRCode() {
            const qrContainer = document.getElementById('qrCodeContainer');


            html2canvas(qrContainer, {
                backgroundColor: null,
                scale: 2,
                useCORS: true
            }).then(canvas => {

                const imageData = canvas.toDataURL('image/png');


                const link = document.createElement('a');
                link.href = imageData;
                link.download = 'BSP_QR_Ph_Code.png';

                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);

                showToast('QR Code downloaded successfully!');
            }).catch(error => {
                console.error('Error capturing QR code:', error);
                showToast('Failed to download QR code. Please try again.', 'error');
            });
        }

        function showToast(message, type = 'success') {
            const toast = document.getElementById('toastNotification');
            const toastIcon = toast.querySelector('.toast-icon');
            const toastText = toast.querySelector('span');

            toastText.textContent = message;

            if (type === 'error') {
                toast.style.background = 'var(--danger)';
                toastIcon.className = 'fas fa-exclamation-circle toast-icon';
            } else {
                toast.style.background = 'var(--success)';
                toastIcon.className = 'fas fa-check-circle toast-icon';
            }

            toast.classList.add('show');


            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }


        document.getElementById('downloadQrBtn').addEventListener('click', downloadQRCode);


        function generateQRCodeData() {

            const paymentData = {
                merchant: "Boy Scouts of the Philippines",
                amount: "500.00",
                currency: "PHP",
                reference: "BSP-" + Date.now(),
                account: "BSP_OFFICIAL_ACCOUNT"
            };
            return JSON.stringify(paymentData);
        }

        document.addEventListener('DOMContentLoaded', function() {
            console.log('QR Ph page loaded successfully');
            console.log('QR Data:', generateQRCodeData());
        });
    </script>


    <!-- for qr code -->
    <script>
        var qrcode = new QRCode(document.getElementById("qrCodeContainer"), {

            text: "<?= $qr ?>",
            // text: "00020101021228760011ph.ppmi.p2m0111OPDVPHM1XXX0315777148000000084041652948137257075730503001520460165303608540570.005802PH5909Netglobal6015City Of Mandalu62370010ph.allbank05194020262201-DST1Aq1288310012ph.ppmi.qrph0111OPDVPHM1XXX6304DD4E",
            logo: "/assets/images/qr-logo.png",
            logoWidth: 40,
            logoHeight: 40,
            logoBackgroundColor: 'black',
            logoBackgroundTransparent: true,
        });
    </script>

<!-- check reference -->
    <script>
        function callEndpoint() {
            const formdata = new FormData();
            formdata.append("refnum", "<?= htmlspecialchars($reference_number, ENT_QUOTES, 'UTF-8') ?>");

            fetch("<?= base_url('check-reference') ?>", {
                    method: "POST",
                    body: formdata
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then(result => {
                    if (result.payment_status === "PENDING") {
                        console.log("CREATED");
                    } else if (result.payment_status === "SUCCESS") {
                        console.log("Redirecting to:", result.redirect_url);
                        window.location.href = result.redirect_url;
                    } else {
                        console.warn("Unexpected payment status:", result.payment_status);
                    }
                })
                .catch(error => {
                    console.error("Error calling endpoint:", error);
                });
        }

        // Run immediately once
        callEndpoint();

        // Repeat every 5 seconds
        setInterval(callEndpoint, 5000);
    </script>



</body>

</html>