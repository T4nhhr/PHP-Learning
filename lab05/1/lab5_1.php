<?php
function removeNonNumeric($inputString)
{
    $cleanedString = preg_replace('/[^0-9.,]/', '', $inputString);
    return $cleanedString;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = isset($_POST['userInput']) ? $_POST['userInput'] : '';
    $cleanedString = removeNonNumeric($userInput);
} else {
    $cleanedString = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 5_1</title>
</head>

<body>
    <form action="" method="post">
        <label for="userInput">Enter a string:</label>
        <input type="text" name="userInput" id="userInput">
        <input type="submit" value="Clean String">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<p>Original String: $userInput</p>";
        echo "<p>Cleaned String: $cleanedString</p>";
    }
    ?>
</body>

</html>