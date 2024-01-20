<?php
$result = '';

if (isset($_POST["n"])) {
    $n = $_POST["n"];

    if (!is_numeric($n) || $n < 0 || floor($n) != $n) {
        $error_message = "Please enter a valid non-negative integer for n.";
    } else {
        $result = 1;
        for ($i = 2; $i <= $n; $i++) {
            $result *= $i;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2_3</title>
</head>

<body>
    <header>
        <h1>Factorial</h1>
    </header>
    <form method="post" action="">
        <label for="">Enter n = </label>
        <input type="text" name="n" id="">
        <button type="submit">Calculate</button>
    </form>

    <?php if (isset($error_message)): ?>
        <br><br>
        <p style="color: red;">
            <?php echo $error_message; ?>
        </p>
    <?php endif; ?>

    <?php if ($result !== ''): ?>
        <br><br>
        <p>Giai thừa 1 ->
            <?php echo $n; ?> là:
            <?php echo $result; ?>
        </p>
    <?php endif; ?>
</body>

</html>