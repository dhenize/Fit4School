<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Verify Your Account</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" href="images/Logo_Light.png" type="image/x-icon">
        
    <?php
        session_start();

        if (isset($_SESSION['status_message'])) {
            echo '<div class="alert alert-' . $_SESSION['status_type'] . '">' . $_SESSION['status_message'] . '</div>';
            unset($_SESSION['status_message']);
            unset($_SESSION['status_type']);
        }
    ?>

        <style>
            .verify-container {
                background: url(Images/bgg1.jfif);
                min-height: 100vh;
                display: flex;
                justify-content: center;
                flex-direction: column;
                background-size: cover;
            }

            .logo {
                width: 110px;
                height: 110px;
            }

            .verify-box {
                background: #fff;
                padding: 30px;
                box-shadow: 3px 14px 18px #16423C;
                border-radius: 15px;
                border: 1px solid #16423C;
            }

            h1 {
                font-size: 1.5em;
                margin-top: 0px;
                color: #16423C;
                font-weight: bold;
                font-family: Righteous;
            }

            h4 {
                font-size: 28px;
                font-weight: bold;
                color: #16423C;
                margin-top: 5px;
                margin-bottom: 10px;
                font-family: Roboto;
            }

            .form-control {
                height: 45px;
                color: #757575;
            }

            .btn-success {
                background-color: #6A9C89;
                border-color: #6A9C89;
                border-radius: 20px;
                font-size: 16.5px;
                font-family: Candara;
                font-weight: bold;
            }

            .btn-success:hover {
                background-color: #6A9C89;
                border-color: #6A9C89;
            }

            h5 {
                color: #16423C;
                font-family: Candara;
                font-size: 22px;
                font-weight: bold;
            }

            p {
                color: #16423C;
                font-family: Candara;
                font-size: 18px;
            }

            .modal-dialog-centered {
                text-decoration: none;
            }

            .modal-content {
                background: #fff;
                border-radius: 15px;
                border: 1px solid #16423C;
                padding: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                border: none;
            }

            .modal-header {
                border-bottom: none;
            }

            .modal-footer {
                border-top: none;
            }

            .modal-body {
                color: #757575;
                font-size: 14px;
            }

            .btn-secondary {
                background-color: #e9efec;
                border-color: #e9efec;
                color: #6A9C89;
                border-radius: 18px;
                font-size: 16.5px;
                font-weight: bold;
                font-family: Candara;
            }

            .btn-secondary:hover {
                background-color: #e9efec;
                color: #6A9C89;
                border-color: #e9efec;
            }

            .error {
                color: red;
                font-size: 0.9em;
                margin-top: 5px;
            }
            
            .is-invalid {
                border-color: #dc3545 !important;
            }
            
            .is-valid {
                border-color: #28a745 !important;
            }
            
            .show-pass-container {
                margin-top: 5px;
                font-size: 0.9em;
            }
            
            .show-pass {
                margin-right: 5px;
            }

            @media (max-width: 320px) {
                .verify-box {
                    padding: 20px;
                }
                
                h4 {
                    font-size: 22px;
                }
                
                .logo {
                    width: 80px;
                    height: 80px;
                }
                
                .btn-success {
                    font-size: 14px;
                    width: 90%;
                }
                
                .form-control {
                    height: 40px;
                    font-size: 14px;
                }
                
                .show-pass-container {
                    font-size: 0.8em;
                }
                
                h1 {
                    font-size: 1.3em;
                }
            }

            @media (min-width: 321px) and (max-width: 375px) {
                .verify-box {
                    padding: 25px;
                }
                
                h4 {
                    font-size: 24px;
                }
                
                .logo {
                    width: 90px;
                    height: 90px;
                }
                
                .btn-success {
                    font-size: 15px;
                }
            }

            @media (min-width: 376px) and (max-width: 425px) {
                .verify-box {
                    padding: 25px;
                }
                
                h4 {
                    font-size: 26px;
                }
                
                .logo {
                    width: 100px;
                    height: 100px;
                }
            }

            @media (min-width: 426px) and (max-width: 768px) {
                .verify-box {
                    padding: 35px;
                    max-width: 450px;
                    margin: 0 auto;
                }
                
                .logo {
                    width: 120px;
                    height: 120px;
                }
                
                h1 {
                    font-size: 1.8em;
                }
                
                h4 {
                    font-size: 30px;
                }
            }

            @media (min-width: 769px) and (max-width: 1024px) {
                .verify-box {
                    max-width: 500px;
                    margin: 0 auto;
                }
                
                .logo {
                    width: 130px;
                    height: 130px;
                }
                
                h1 {
                    font-size: 2em;
                }
            }

            @media (min-width: 1025px) and (max-width: 1440px) {
                .verify-box {
                    max-width: 450px;
                }
            }

            @media (min-width: 2560px) {
                .verify-container {
                    background-size: 100% 100%;
                }
                
                .verify-box {
                    max-width: 600px;
                    padding: 50px;
                }
                
                .logo {
                    width: 160px;
                    height: 160px;
                }
                
                h1 {
                    font-size: 2.5em;
                }
                
                h4 {
                    font-size: 36px;
                }
                
                .form-control {
                    height: 60px;
                    font-size: 20px;
                }
                
                .btn-success {
                    font-size: 22px;
                    height: 50px;
                }
                
                .error {
                    font-size: 1.1em;
                }
                
                .show-pass-container {
                    font-size: 1.1em;
                }
                
                label {
                    font-size: 1.2em;
                }
            }
        </style>
    </head>

    <body>
        <div class="container-fluid verify-container">
            <div class="row justify-content-center align-items-center vh-100">
                <div class="col-md-6 col-lg-4">
                    <div class="text-center mb-4">
                        <img src="images/logo.png" alt="Fit4School Logo" class="logo">
                        <h1 class="mt-2">Fit4School</h1>
                    </div>
                    <div class="card p-4 shadow verify-box mt-4">
                        <h4 class="text-center mb-3">VERIFY YOUR ACCOUNT</h4>
                        <br>
                        <form id="verifyForm" action="fit4verification2.php" method="POST">
                            <div class="mb-3">
                                <label for="otp" class="form-label">Enter the OTP sent to your email</label>
                                <input type="number" maxlength="4" min="0000" max="9999" class="form-control" id="otp" name="otp" placeholder="Enter OTP Here...">
                                <div id="otpError" class="error"></div>
                            </div>
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">Enter your New Password</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter Here...">
                                <div class="show-pass-container">
                                    <input type="checkbox" class="show-pass" onclick="togglePassword('newPassword')"> Show Password
                                </div>
                                <div id="newPasswordError" class="error"></div>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Re-Enter your New Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Enter Here...">
                                <div class="show-pass-container">
                                    <input type="checkbox" class="show-pass" onclick="togglePassword('confirmPassword')"> Show Password
                                </div>
                                <div id="confirmPasswordError" class="error"></div>
                            </div>
                            <br>
                            <div class="text-center"> 
                                <button type="submit" class="btn btn-success w-75 mx-auto d-block mb-3">RESET PASSWORD</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const otpInput = document.getElementById('otp');
                const newPasswordInput = document.getElementById('newPassword');
                const confirmPasswordInput = document.getElementById('confirmPassword');
                const verifyForm = document.getElementById('verifyForm');
                
                const passwordRegex = /^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.*\d{2}).{8,}$/;
                
                otpInput.addEventListener('input', function() {
                    validateOTP();
                });
                
                newPasswordInput.addEventListener('input', function() {
                    validateNewPassword();
                    validatePasswordMatch();
                });
        
                confirmPasswordInput.addEventListener('input', function() {
                    validatePasswordMatch();
                });
                
                function validateOTP() {
                    const otp = otpInput.value.trim();
                    
                    if (otp === '') {
                        otpInput.classList.remove('is-valid');
                        otpInput.classList.remove('is-invalid');
                        document.getElementById('otpError').textContent = '';
                    } else if (otp.length !== 4) {
                        otpInput.classList.add('is-invalid');
                        otpInput.classList.remove('is-valid');
                        document.getElementById('otpError').textContent = 'OTP must be 4 digits';
                    } else {
                        otpInput.classList.add('is-valid');
                        otpInput.classList.remove('is-invalid');
                        document.getElementById('otpError').textContent = '';
                    }
                }
                
                function validateNewPassword() {
                    const password = newPasswordInput.value.trim();
                    
                    if (password === '') {
                        newPasswordInput.classList.remove('is-valid');
                        newPasswordInput.classList.remove('is-invalid');
                        document.getElementById('newPasswordError').textContent = '';
                    } else if (!passwordRegex.test(password)) {
                        newPasswordInput.classList.add('is-invalid');
                        newPasswordInput.classList.remove('is-valid');
                        document.getElementById('newPasswordError').textContent = 'Password must have: 1 capital letter, 1 special character, 2 numbers, and at least 8 characters';
                    } else {
                        newPasswordInput.classList.add('is-valid');
                        newPasswordInput.classList.remove('is-invalid');
                        document.getElementById('newPasswordError').textContent = '';
                    }
                }
                
                function validatePasswordMatch() {
                    const password = newPasswordInput.value.trim();
                    const confirmPassword = confirmPasswordInput.value.trim();
                    
                    if (confirmPassword === '') {
                        confirmPasswordInput.classList.remove('is-valid');
                        confirmPasswordInput.classList.remove('is-invalid');
                        document.getElementById('confirmPasswordError').textContent = '';
                    } else if (password !== confirmPassword) {
                        confirmPasswordInput.classList.add('is-invalid');
                        confirmPasswordInput.classList.remove('is-valid');
                        document.getElementById('confirmPasswordError').textContent = 'Passwords do not match';
                    } else if (password === confirmPassword && password !== '') {
                        confirmPasswordInput.classList.add('is-valid');
                        confirmPasswordInput.classList.remove('is-invalid');
                        document.getElementById('confirmPasswordError').textContent = '';
                    }
                }
                
                verifyForm.addEventListener('submit', function(event) {
                    const otp = otpInput.value.trim();
                    const password = newPasswordInput.value.trim();
                    const confirmPassword = confirmPasswordInput.value.trim();
                    let isValid = true;
                    
                    otpInput.classList.remove('is-invalid');
                    newPasswordInput.classList.remove('is-invalid');
                    confirmPasswordInput.classList.remove('is-invalid');
                    document.getElementById('otpError').textContent = '';
                    document.getElementById('newPasswordError').textContent = '';
                    document.getElementById('confirmPasswordError').textContent = '';

                    if (otp === '') {
                        otpInput.classList.add('is-invalid');
                        document.getElementById('otpError').textContent = 'OTP is required';
                        isValid = false;
                    } else if (otp.length !== 4) {
                        otpInput.classList.add('is-invalid');
                        document.getElementById('otpError').textContent = 'OTP must be 4 digits';
                        isValid = false;
                    }
                    
                    if (password === '') {
                        newPasswordInput.classList.add('is-invalid');
                        document.getElementById('newPasswordError').textContent = 'New password is required';
                        isValid = false;
                    } else if (!passwordRegex.test(password)) {
                        newPasswordInput.classList.add('is-invalid');
                        document.getElementById('newPasswordError').textContent = 'Password must have: 1 capital letter, 1 special character, 2 numbers, and at least 8 characters';
                        isValid = false;
                    }

                    if (confirmPassword === '') {
                        confirmPasswordInput.classList.add('is-invalid');
                        document.getElementById('confirmPasswordError').textContent = 'Please confirm your password';
                        isValid = false;
                    } else if (password !== confirmPassword) {
                        confirmPasswordInput.classList.add('is-invalid');
                        document.getElementById('confirmPasswordError').textContent = 'Passwords do not match';
                        isValid = false;
                    }
                    
                    if (!isValid) {
                        event.preventDefault();
                    }
                });
            });
            
            function togglePassword(inputId) {
                const input = document.getElementById(inputId);
                if (input.type === 'password') {
                    input.type = 'text';
                } else {
                    input.type = 'password';
                }
            }
        </script>
    </body>
</html>