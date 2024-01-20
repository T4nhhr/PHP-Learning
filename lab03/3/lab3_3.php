<?php
$accounts = [
    'admin' => '123123',
    'user' => '123456'
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['loginSubmit'])) {
        $username = $_POST['username'];
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $rememberMe = isset($_POST['rememberMe']);

        if (isset($accounts[$username]) && $accounts[$username] == $password) {
            $escapedUsername = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
            if ($rememberMe) {
                setcookie('username', $escapedUsername, time() + 3600 * 24 * 30, '/');
            }
            echo "<script>alert('Welcome, $escapedUsername!');</script>";
        } else {
            echo "<script>alert('Invalid username or password.');</script>";
        }
    }

    if (isset($_COOKIE['username'])) {
        $savedUsername = htmlspecialchars($_COOKIE['username'], ENT_QUOTES, 'UTF-8');
        echo "<script>alert('Welcome back, $savedUsername!');</script>";
    }

    if (isset($_POST['registerSubmit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $title = $_POST['title'];
        $fullname = $_POST['fullname'];
        $companyname = $_POST['companyname'];
        $agreeCheckbox = isset($_POST['agreeCheckbox']);

        if (empty($username) || empty($email) || empty($title) || empty($fullname) || empty($companyname)) {
            echo "<script>alert('Please fill in all required fields.');</script>";
        } elseif (!$agreeCheckbox) {
            echo "<script>alert('Please agree to the registration.');</script>";
        } else {
            echo "<script>alert('Register successfully');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 3_3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class=" mt-5">
    <div class="d-flex justify-content-center">
        <div class="login-wrapper w-25" style="margin-right: 50px;">
            <h1 class="fs-4 pb-4 d-block">Login</h1>
            <div class="">
                <form method="post" action="">
                    <div class="pb-4">
                        <label class="pb-2 d-block fw-bold" for="username">Username</label>
                        <input type="text" id="username" name="username" class="w-100" required>
                    </div>

                    <div class="pb-4 ">
                        <label class="pb-2 d-block fw-bold" for="password">Password</label>
                        <input type="password" id="password" name="password" class="w-100" required>
                    </div>
                    <input type="checkbox" name="rememberMe"><span class="fw-bold"> Remember Me</span>

                    <div class="text-center mt-4">
                        <button class="btn btn-primary " type="submit" name="loginSubmit">Log
                            in</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="register-wrapper w-25" style="margin-left: 50px;">
            <h1 class="fs-4 pb-4 d-block">Signup for New Account?</h1>
            <form id="registrationForm" method="post" action="" onsubmit="return validateForm()">
                <div class="pb-4">
                    <label class="pb-2 d-block fw-bold" for="username">User Name</label>
                    <input type="text" id="username" name="username" class="w-100" required>
                </div>

                <div class="pb-4">
                    <label class="pb-2 d-block fw-bold" for="email">User Email *</label>
                    <input type="email" id="email" name="email" class="w-100" required>
                </div>

                <div class="pb-4 d-flex justify-content-between">
                    <div class="">
                        <label class="pb-2 d-block fw-bold" for="title">Select Title</label>
                        <select class="w-100" name="title" id="title" required>
                            <option value="mr">Mr.</option>
                            <option value="ms">Ms.</option>
                            <option value="mrs">Mrs.</option>
                        </select>
                    </div>
                    <div class="">
                        <label class="pb-2 d-block fw-bold" for="fullname">Full name *</label>
                        <input type="text" id="fullname" name="fullname" required>
                    </div>
                </div>

                <div class="pb-4">
                    <h1 class="fs-4 pb-3 pt-2 d-block">Company detail</h1>
                    <p class="mb-1">Provide detail about your company</p>
                    <div class="">
                        <label for="companyname" class="pb-2 d-block fw-bold">Company name</label>
                        <input type="text" id="companyname" name="companyname" class="w-100" required>
                    </div>
                </div>
                <input type="checkbox" name="agreeCheckbox"><span> I am agree with
                    registration</span>
                <div class="text-center mt-4">
                    <button class="btn btn-primary" type="submit" name="registerSubmit">Register</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var email = document.getElementById("email").value;
            var title = document.getElementById("title").value;
            var fullname = document.getElementById("fullname").value;
            var companyname = document.getElementById("companyname").value;

            if (username.trim() === '' || email.trim() === '' || title.trim() === '' ||
                fullname.trim() === '' || companyname.trim() === '') {
                alert('Please fill in all required fields.');
                return false;
            }



            return true;
        }