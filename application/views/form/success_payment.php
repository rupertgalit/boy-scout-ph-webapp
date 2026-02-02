<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BSP QR Ph | Payment Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary: #1B5E20;
            --primary-dark: #0D3B14;
            --primary-light: #2E7D32;
            --secondary: #F9A825;
            --secondary-light: #FFB300;
            --accent: #1565C0;
            --light: #F8F9FA;
            --light-green: #E8F5E9;
            --dark: #212121;
            --gray: #757575;
            --light-gray: #E0E0E0;
            --success: #4CAF50;
            --warning: #FF9800;
            --danger: #F44336;
            --qr-blue: #1D4ED8;
            --qr-yellow: #F59E0B;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 4px 20px rgba(0, 0, 0, 0.12);
            --shadow-lg: 0 8px 40px rgba(0, 0, 0, 0.15);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 20px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e8f5e9 100%);
            min-height: 100vh;
            color: var(--dark);
            line-height: 1.6;
            padding-bottom: 20px;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 20% 80%, rgba(27, 94, 32, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(249, 168, 37, 0.05) 0%, transparent 50%);
            z-index: -1;
        }

        .main-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .header-container {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            border-radius: var(--radius-lg);
            padding: 20px 30px;
            margin-bottom: 30px;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .header-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(to right, var(--secondary), var(--secondary-light));
        }

        .header-row {
            position: relative;
            z-index: 2;
        }

        .header-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
            transition: var(--transition);
        }

        .header-center {
            text-align: center;
        }

        .header-center h1 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            font-size: 1.8rem;
            margin-bottom: 5px;
            background: linear-gradient(to right, white, var(--light-gray));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .confirmation-container {
            background: white;
            border-radius: var(--radius-lg);
            padding: 10px 20px;
            text-align: center;
            box-shadow: var(--shadow-lg);
            border: 2px solid #e5e7eb;
            margin: 0 auto 30px;
        }

        .success-header {
            margin-bottom: 30px;
        }

        .success-icon {
            font-size: 5rem;
            color: var(--success);
            animation: bounce 1s;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-20px);}
            60% {transform: translateY(-10px);}
        }

        .success-header h2 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .reference-section {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border-radius: var(--radius-md);
            padding: 30px;
            margin: 30px 0;
            border: 2px solid #0ea5e9;
        }

        .reference-label {
            font-size: 1.1rem;
            color: var(--gray);
            margin-bottom: 10px;
        }

        .reference-number {
            font-family: monospace;
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: 2px;
            margin: 15px 0;
            padding: 15px;
            background: white;
            border-radius: var(--radius-sm);
            border: 2px dashed var(--primary-light);
            display: inline-block;
        }

        .reference-note {
            color: var(--gray);
            font-size: 0.95rem;
            margin-top: 10px;
        }

      

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .action-btn {
            padding: 14px 32px;
            border-radius: var(--radius-md);
            border: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
            cursor: pointer;
            min-width: 180px;
            justify-content: center;
            font-size: 1.05rem;
            position: relative;
            overflow: hidden;
        }

        .action-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }

        .action-btn:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }

        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            100% {
                transform: scale(40, 40);
                opacity: 0;
            }
        }

   
        @media (max-width: 768px) {
            .main-container {
                padding: 15px;
            }

            .header-container {
                padding: 20px;
            }

            .header-center h1 {
                font-size: 1.5rem;
            }

            .confirmation-container {
                padding: 25px 20px;
            }

            .reference-number {
                font-size: 1.8rem;
                padding: 12px;
            }

           
        }

        @media (max-width: 576px) {
            .header-container {
                text-align: center;
            }

            .header-logo {
                margin: 0 auto 15px;
                display: block;
            }

            .reference-number {
                font-size: 1.5rem;
                letter-spacing: 1px;
                padding: 10px;
            }

           
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Header -->
        <div class="header-container animate__animated animate__fadeInDown">
            <div class="header-row">
                <div class="text-center">
                    <img src="assets\images\boyscouts_logofinal.png" 
                         alt="BSP Logo" 
                         class="header-logo">
                    <div class="header-center">
                        <h1>BOY SCOUTS OF THE PHILIPPINES</h1>
                        <p>Payment Confirmation</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Confirmation -->
        <div class="confirmation-container animate__animated animate__fadeIn">
            <!-- Success Header -->
            <div class="success-header">
                <div class="success-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h2 class="text-success">Payment Successful!</h2>
                <p class="text-muted">Your payment has been processed and confirmed successfully.</p>
            </div>

            <!-- Reference Number -->
            <div class="reference-section">
                <div class="reference-label">Your Payment Reference Number:</div>
                <div class="reference-number" id="referenceNumber">BSP-2024-789456</div>
                <div class="reference-note">
                    <i class="fas fa-info-circle me-2"></i>
                    Save this reference number for your records and future inquiries.
                </div>
            </div>
             <div class="action-buttons">
                <button class="action-btn btn-secondary" onclick="goToHomepage()">
                    <i class="fas fa-home me-1"></i>
                    Back to BSP Home
                </button>
            </div>
            
    </div>

</body>
</html>