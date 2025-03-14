<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Account</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="Logo_Light.png" type="image/x-icon">
    <style>
        .verify-container {
            background: url(bgg1.jfif);
            height: 100vh;
            background-size: cover;
            margin: 0;
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

        .btn-secondary {
            background-color: #e9efec;
            border-color: #e9efec;
            color: #6A9C89;
            border-radius: 18px;
            font-size: 16px;
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
            font-size: 16px;
            font-weight: bold;
            font-family: Candara;
        }

        .btn-success:hover {
            background-color: #6A9C89;
            border-color: #6A9C89;
        }

        .otp-input {
            width: 50px;
            height: 50px;
            font-size: 24px;
            text-align: center;
            margin-right: 10px;
            border: 1px solid #6A9C89;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid verify-container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6 col-lg-4">
                <div class="text-center mb-4">
                    <img src="logo.png" alt="Fit4School Logo" class="logo">
                    <h1 class="mt-2">Fit4School</h1>
                </div>

                <div class="card p-4 shadow verify-box">
                    <h4 class="text-center mb-3">VERIFY YOUR ACCOUNT</h4>
                    <form action="process.php" method="POST">
                        <div class="mb-3">
                            <label for="studentNumber" class="form-label">Enter your Student Number/Username</label>
                            <input type="text" class="form-control" id="studentNumber" name="studentNumber" placeholder="Enter Here..." required>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="fit4login.php" class="btn btn-secondary"> CANCEL </a>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#sendOtpModal"> CONFIRM </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Send OTP Modal -->
    <div class="modal fade" id="sendOtpModal" tabindex="-1" aria-labelledby="sendOtpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style=" transform: translateY(96%);">
                <div class="modal-header" style=" border: none;">
                    <h5 class="modal-title" id="sendOtpModalLabel" style=" color: #16423C; font-size: 25px;">Send OTP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style=" border-top: white; color: #757575;">
                    Are you sure you want to send an OTP to your registered number?
                </div>
                <div class="modal-footer" style=" border: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verifyOtpModal" data-bs-dismiss="modal">YES</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Verify OTP Modal -->
    <div class="modal fade" id="verifyOtpModal" tabindex="-1" aria-labelledby="verifyOtpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style=" transform: translateY(85%); border-radius: 20px;">
                <div class="modal-header" style=" border: none;">
                    <h5 class="modal-title" id="verifyOtpModalLabel" style=" color: #16423C; font-size: 25px;">Verification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p style=" color: #757575;">Enter OTP code sent to your number:</p>
                    <div class="d-flex justify-content-center">
                        <input type="text" maxlength="1" class="otp-input" required style=" color: #757575;">
                        <input type="text" maxlength="1" class="otp-input" required style=" color: #757575;">
                        <input type="text" maxlength="1" class="otp-input" required style=" color: #757575;">
                        <input type="text" maxlength="1" class="otp-input" required style=" color: #757575;">
                    </div>
                </div>
                <div class="modal-footer" style=" border: none;">
                    <a href="fit4veryfication2.php" class="btn btn-success">Continue</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
