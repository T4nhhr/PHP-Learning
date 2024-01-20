<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST["a"];
    $b = $_POST["b"];
    if (!is_numeric($a) || !is_numeric($b)) {
        $error_message = "Please enter valid numeric values for a and b.";
    } else {
        $addition = $a + $b;
        $subtraction = $a - $b;
        $multiplication = $a * $b;

        if ($b != 0) {
            $division = $a / $b;
        } else {
            $division = "Undefined (division by zero)";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1_2</title>
</head>

<body>
    <header>
        <h1>Basic Calculator</h1>
    </header>
    <form method="post" action="">
        <label>a</label>
        <input type="text" name="a"><br><br>
        <label>b</label>
        <input type="text" name="b"><br><br>
        <button type="submit">Calculate</button>
    </form>

    <?php if (isset($error_message)): ?>
        <p style="color: red;">
            <?php echo $error_message; ?>
        </p>
    <?php endif; ?>

    <?php if (isset($addition)): ?>
        <br>
        <p>Addition:
            <?php echo $addition; ?>
        </p>
        <p>Subtraction:
            <?php echo $subtraction; ?>
        </p>
        <p>Multiplication:
            <?php echo $multiplication; ?>
        </p>
        <p>Division:
            <?php echo $division; ?>
        </p>
    <?php endif; ?>
</body>

</html>