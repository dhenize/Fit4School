<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_fit4school";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fit4School Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" href="images/Logo_Light.png" type="image/x-icon">
        <style>
            body {
                background: url(Images/bgg1.jfif);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0;
                flex-direction: column;
                background-size: cover;
            }

            .logo-container {
                text-align: center;
                margin-bottom: 20px;
            }

            .logo-container img {
                width: 85px;
            }

            .logo-container h1 {
                font-size: 1.5em;
                margin-top: 0px;
                color: #16423C;
                font-weight: bold;
                font-family: Righteous;
            }

            .login-container {
                background: #fff;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 3px 14px 18px #16423C;
                width: 100%;
                height: 500px;
                max-width: 400px;
                border-radius: 15px;
                border: 1px solid #16423C;
            }

            .login-container h2 {
                font-size: 32px;
                font-weight: bold;
                color: #16423C;
                font-family: Roboto;
                margin-top: 5px;
                margin-bottom: 10px;
            }

            .form-control {
                height: 45px;
                color: #757575;
            }

            .btn-primary {
                background-color: #6A9C89;
                border-color: #6A9C89;
                border-radius: 20px;
                font-size: 18px;
                font-family: Candara;
                font-weight: bold;
            }

            .btn-primary:hover {
                background-color: #6A9C89;
                border-color: #6A9C89;
            }

            .btn-secondary {
                background-color: #e9efec;
                border-color: #e9efec;
                color: #6A9C89;
                border-radius: 20px;
                font-size: 18px;
                font-family: Candara;
                font-weight: bold;
            }

            .btn-secondary:hover {
                background-color: #e9efec;
                color: #6A9C89;
                border-color: #e9efec;
            }

            .form-label {
                font-weight: bold;
                font-family: Candara;
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

            /* Mobile Small - 320px */
            @media (max-width: 320px) {
                .login-container {
                    padding: 20px;
                    height: auto;
                    max-width: 280px;
                }
                
                .login-container h2 {
                    font-size: 26px;
                }
                
                .btn-primary, .btn-secondary {
                    font-size: 16px;
                    width: 90% !important;
                }
                
                .logo-container img {
                    width: 70px;
                }
            }

            /* Mobile Medium - 375px */
            @media (min-width: 321px) and (max-width: 375px) {
                .login-container {
                    padding: 25px;
                    height: auto;
                    max-width: 320px;
                }
                
                .login-container h2 {
                    font-size: 28px;
                }
                
                .btn-primary, .btn-secondary {
                    font-size: 16px;
                }
            }

            /* Mobile Large - 425px */
            @media (min-width: 376px) and (max-width: 425px) {
                .login-container {
                    padding: 25px;
                    height: auto;
                    max-width: 350px;
                }
                
                .login-container h2 {
                    font-size: 30px;
                }
            }

            /* Tablet - 768px */
            @media (min-width: 426px) and (max-width: 768px) {
                .login-container {
                    max-width: 450px;
                    padding: 35px;
                }
                
                .logo-container img {
                    width: 100px;
                }
                
                .logo-container h1 {
                    font-size: 1.8em;
                }
            }

            /* Laptop - 1024px */
            @media (min-width: 769px) and (max-width: 1024px) {
                .login-container {
                    max-width: 500px;
                    padding: 40px;
                }
                
                .logo-container img {
                    width: 110px;
                }
                
                .logo-container h1 {
                    font-size: 2em;
                }
            }

            /* Laptop Large - 1440px */
            @media (min-width: 1025px) and (max-width: 1440px) {
                .login-container {
                    max-width: 450px;
                }
            }

            /* 4K - 2560px */
            @media (min-width: 2560px) {
                body {
                    background-size: 100% 100%;
                }
                
                .login-container {
                    max-width: 600px;
                    padding: 50px;
                    height: 600px;
                }
                
                .logo-container img {
                    width: 150px;
                }
                
                .logo-container h1 {
                    font-size: 2.5em;
                }
                
                .login-container h2 {
                    font-size: 40px;
                }
                
                .form-control {
                    height: 60px;
                    font-size: 20px;
                }
                
                .btn-primary, .btn-secondary {
                    font-size: 22px;
                    height: 50px;
                }
                
                .form-label {
                    font-size: 20px;
                }
            }
        </style>
    </head>

    <body>
        <div class="logo-container">
            <img src="images/logo.png" alt="Fit4School Logo">
            <h1>Fit4School</h1>
        </div>

        <div class="login-container">
            <form id="loginForm" method="post" action="login_process.php">
                <h2 class="mb-4 text-center">LOG IN</h2>
                <div class="mb-3">
                    <label for="username" class="form-label">Student ID</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Enter Here...">
                    <div id="usernameError" class="error"></div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter Here...">
                    <input type="checkbox" class="show-pass" onclick="passFunction()"> Show Password
                    <div id="passwordError" class="error"></div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary w-75 mx-auto d-block mb-3">LOG IN</button>
                <a href="fit4veryfication1.php" class="btn btn-secondary w-75 mx-auto d-block">FORGOT PASSWORD?</a>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const usernameInput = document.getElementById('username');
                const passwordInput = document.getElementById('password');
                const usernameError = document.getElementById('usernameError');
                const passwordError = document.getElementById('passwordError');
                const passwordRegex = /^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.*\d{2}).{8,}$/;
                
                // Real-time validation for username
                usernameInput.addEventListener('input', function() {
                    if (this.value.trim() === '') {
                        this.classList.remove('is-valid');
                        this.classList.remove('is-invalid');
                        usernameError.textContent = '';
                    } else {
                        this.classList.add('is-valid');
                        this.classList.remove('is-invalid');
                        usernameError.textContent = '';
                    }
                });
                
                // Real-time validation for password
                passwordInput.addEventListener('input', function() {
                    if (this.value.trim() === '') {
                        this.classList.remove('is-valid');
                        this.classList.remove('is-invalid');
                        passwordError.textContent = '';
                    } else if (!passwordRegex.test(this.value)) {
                        this.classList.remove('is-valid');
                        this.classList.add('is-invalid');
                        passwordError.textContent = "Password must have 1 capital letter, 1 special character, 2 numbers, and at least 8 characters.";
                    } else {
                        this.classList.add('is-valid');
                        this.classList.remove('is-invalid');
                        passwordError.textContent = '';
                    }
                });
                
                // Form submission validation
                document.getElementById('loginForm').addEventListener('submit', function(event) {
                    let isValid = true;
                    
                    // Reset previous error states
                    usernameInput.classList.remove('is-invalid');
                    passwordInput.classList.remove('is-invalid');
                    usernameError.textContent = '';
                    passwordError.textContent = '';
                    
                    // Validate username
                    if (usernameInput.value.trim() === '') {
                        usernameInput.classList.add('is-invalid');
                        usernameError.textContent = 'Student ID is required.';
                        isValid = false;
                    }
                    
                    // Validate password
                    if (passwordInput.value.trim() === '') {
                        passwordInput.classList.add('is-invalid');
                        passwordError.textContent = 'Password is required.';
                        isValid = false;
                    } else if (!passwordRegex.test(passwordInput.value)) {
                        passwordInput.classList.add('is-invalid');
                        passwordError.textContent = "Password must have 1 capital letter, 1 special character, 2 numbers, and at least 8 characters.";
                        isValid = false;
                    }
                    
                    if (!isValid) {
                        event.preventDefault();
                    }
                });
            });

            function passFunction() {
                var a = document.getElementById("password");
                if (a.type === "password") {
                    a.type = "text";
                } else {
                    a.type = "password";
                }
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

</html>
