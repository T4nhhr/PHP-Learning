<?php

$error_message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST["a"];
    $b = $_POST["b"];

    if (!is_numeric($a) || !is_numeric($b)) {
        $error_message = "Please enter valid numeric values for a and b.";
    } else {
        if ($a == 0) {
            if ($b == 0) {
                $solution = "Phương trình có vô số nghiệm";
            } else {
                $solution = "Phương trình vô nghiệm";
            }
        } else {
            $solution = "Phương trình có nghiệm x = " . (-$b / $a);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2_1</title>
</head>

<body>
    <header>
        <h1>Phương Trình Bậc Nhất ax + b = 0</h1>
    </header>
    <form method="post" action="">
        <input type="text" name="a"><span> x + </span>
        <input type="text" name="b"><span> = 0</span>
        <br><br>
        <button type="submit">Calculate</button>
    </form>

    <?php if ($error_message): ?>
        <br>
        <p style="color: red;">
            <?php echo $error_message; ?>
        </p>
    <?php endif; ?>

    <?php if (isset($solution)): ?>
        <br>
        <p>
            <?php echo $solution; ?>
        </p>
    <?php endif; ?>
</body>

</html>