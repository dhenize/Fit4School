<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Verify Your Account</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" href="images/Logo_Light.png" type="image/x-icon">
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

            .btn-success {
                background-color: #6A9C89;
                border-color: #6A9C89;
                border-radius: 18px;
                font-size: 16.5px;
                font-weight: bold;
                font-family: Candara;
            }

            .btn-success:hover {
                background-color: #6A9C89;
                border-color: #6A9C89;
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
                        <form id="verifyForm" action="reset-password.php" method="POST">
                            <div class="mb-3">
                                <label for="otp" class="form-label">Enter the OTP sent to your email</label>
                                <input type="number" maxlength="4" min="0000" max="9999" class="form-control" id="otp" name="otp" placeholder="Enter OTP Here..." required>
                            </div>
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">Enter your New Password</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter Here..." required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Re-Enter your New Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Enter Here..." required>
                            </div>
                            <br>
                            <div class="text-center"> <button type="submit" class="btn btn-success w-75 mx-auto d-block mb-3">RESET PASSWORD</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>