<?php

$html = '<ul>
            <li>Coffee</li>
            <li>Tea</li>
            <li>Milk</li>
        </ul>';

preg_match_all('/<li>(.*?)<\/li>/', $html, $matches);

foreach ($matches[1] as $text) {
    echo $text . PHP_EOL;
}

?>