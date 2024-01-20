<?php
$sum = '';

if (isset($_POST["n"])) {
    $n = $_POST["n"];

    if (!is_numeric($n) || $n <= 0 || floor($n) != $n) {
        $error_message = "Please enter a valid positive integer for n.";
    } else {
        $sum = ($n * ($n + 1)) / 2;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2_2</title>
</head>

<body>
    <header>
        <h1>Sum 1 -> n</h1>
        <form method="post" action="">
            <label>Enter n</label>
            <input type="text" name="n" id="">
            <button type="submit">Calculate</button>
        </form>

        <?php if (isset($error_message)): ?>
            <br><br>
            <p style="color: red;">
                <?php echo $error_message; ?>
            </p>
        <?php endif; ?>

        <?php if ($sum !== ''): ?>
            <br><br>
            <p>Sum =
                <?php echo $sum; ?>
            </p>
        <?php endif; ?>
    </header>
</body>

</html>