<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
    <title>BSP‑Manila · login + register</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="/assets/css/website/login.css" rel="stylesheet" />
</head>

<body>
    <div class="card">
        <div class="title">
            <span><img src="assets/images/boyscouts_logofinal.png" alt="BSP fleur de lis" style="height:52px;" /></span>
            BSP - Manila
        </div>


        <div class="login-fields">
            <div class="field">
                <label class="required"><i class="bi bi-person"></i> username</label>
                <input type="text" id="loginIdentifier" placeholder="Enter your username" />
                <div class="error-msg" id="errIdentifier"></div>
            </div>
            <div class="field">
                <label class="required"><i class="bi bi-lock"></i> password</label>
                <div class="password-wrapper">
                    <input type="password" id="loginPass" placeholder="········" />
                    <button type="button" class="toggle-password" data-target="loginPass"><i
                            class="bi bi-eye"></i></button>
                </div>
                <div class="error-msg" id="errPass"></div>
            </div>
        </div>

        <button class="btn-login" id="loginBtn"><i class="bi bi-box-arrow-in-right"></i> log in</button>

        <hr />

        <div class="register-block">
            <span>New to BSP‑Manila?</span>
            <a href="/register" class="btn-register" id="registerBtn"><i class="bi bi-pencil-square"></i> register</a>
        </div>
    </div>

    <script>
        (function () {
            // elements
            const identifierInput = document.getElementById('loginIdentifier');
            const passInput = document.getElementById('loginPass');
            const errIdentifier = document.getElementById('errIdentifier');
            const errPass = document.getElementById('errPass');
            const loginBtn = document.getElementById('loginBtn');
            const registerBtn = document.getElementById('registerBtn');

            // password visibility toggle
            document.querySelectorAll('.toggle-password').forEach(btn => {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('data-target');
                    const input = document.getElementById(targetId);
                    if (!input) return;
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);
                    const icon = this.querySelector('i');
                    if (icon) icon.className = type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash';
                });
            });



            passInput.addEventListener('input', function () {
                passInput.classList.remove('invalid');
                errPass.innerText = '';
            });

            function handleLogin(e) {
                e.preventDefault();

                const identifier = identifierInput.value.trim();
                const password = passInput.value;

                let hasError = false;

                if (!identifier) {
                    identifierInput.classList.add('invalid');
                    errIdentifier.innerText = 'Username required';
                    hasError = true;
                } else {
                    identifierInput.classList.remove('invalid');
                    errIdentifier.innerText = '';
                }

                if (!password) {
                    passInput.classList.add('invalid');
                    errPass.innerText = 'Password required';
                    hasError = true;
                } else {
                    passInput.classList.remove('invalid');
                    errPass.innerText = '';
                }

                if (hasError) return;

                window.location.href = '/dashboard';
            }

            loginBtn.addEventListener('click', handleLogin);

            document.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    loginBtn.click();
                }
            });


        })();
    </script>

</body>

</html>