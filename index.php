<?php

require('BinarySearch.php');

use Algorithms\BinarySearch;

$list = [
    1,
    3,
    5,
    18,
    20,
    24,
    27,
    38,
    39,
    80,
];

if (count($argv) < 2 || !is_numeric($argv[1])) {
    die("Please supply a number to search for.\n");
}

$searchTerm = $argv[1];

$key = (new BinarySearch($list))->search($searchTerm);

if ($key !== null) {
    die("The number {$searchTerm} occurs at key {$key} in the list\n");
}

die("The list does not contain {$searchTerm}.\n");
