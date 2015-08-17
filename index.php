<?php

require 'vendor/autoload.php';

$number = 200;

$goldbachsNumber = new GoldbachsConjecture();
$result = $goldbachsNumber->returnPairs($number);

echo "The Golbach partitions of {$number} are:<br>";

foreach ($result as $pair) {
    echo $pair[0], " + ", $pair[1], "<br>";
}
