<?php
$accounts = array(
    'admin' => '123123',
    'user' => '123456'
);

$loginStatus = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($accounts[$username]) && $accounts[$username] == $password) {
        $loginStatus = "Welcome, $username!";
    } else {
        $loginStatus = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 3_1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class=" mt-5">
    <div class="d-flex justify-content-center">
        <div class="login-wrapper">
            <h1 class="fs-4 pb-4 d-block">Login Form</h1>
            <div class="">
                <form method="post" action="">
                    <div class="pb-4 fw-bold">
                        <label class="pb-2" for="username">Username</label><br>
                        <input type="text" id="username" name="username" required>
                    </div>

                    <div class="pb-4 fw-bold">
                        <label class="pb-2" for="password">Password</label><br>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <button class="btn btn-primary" type="submit">Log in</button>
                </form>
            </div>
        </div>

    </div>


    <div class="text-center pt-3">
        <?php if ($loginStatus): ?>
            <p class="fs-3">
                <?php echo $loginStatus; ?>
            </p>
        <?php endif; ?>
    </div>
</body>

</html>