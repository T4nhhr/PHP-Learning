<?php

function calculateBirthdayCountdown($birthday)
{
    $today = new DateTime();
    $birthdayDate = new DateTime($birthday);

    $birthdayDate->setDate($today->format('Y'), $birthdayDate->format('m'), $birthdayDate->format('d'));

    if ($today > $birthdayDate) {
        $birthdayDate->modify('+1 year');
    }
    $interval = $today->diff($birthdayDate);
    return $interval;
}

if (isset($_POST['submit'])) {
    $userBirthday = $_POST['userBirthday'];

    $countdown = calculateBirthdayCountdown($userBirthday);

    echo "Your next birthday is in " . $countdown->days . " days, "
        . $countdown->h . " hours, "
        . $countdown->i . " minutes, and "
        . $countdown->s . " seconds.";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lab 5_2</title>
</head>

<body>
    <form method="post" action="">
        <label for="userBirthday">Enter your birthday:</label>
        <input type="date" name="userBirthday" id="userBirthday" required>
        <button type="submit" name="submit">Calculate Countdown</button>
    </form>
</body>

</html>