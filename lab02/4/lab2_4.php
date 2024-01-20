<?php
$my_array = array('EHC', 'HackYourLimits', 'Training');
$minLength = PHP_INT_MAX;
$maxLength = 0;


foreach ($my_array as $str) {
    $length = strlen($str);

    $minLength = min($minLength, $length);
    $maxLength = max($maxLength, $length);
}

echo "minLength = $minLength; maxLength = $maxLength;";
?>