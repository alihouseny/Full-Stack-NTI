// Problem 4
<?php

$films = array("Fast", "Predestination", "Persuit", "Prestige");
$keyword = "avatar";

$found = "no";

foreach ($films as $film) {
    if (strtolower($film) === strtolower($keyword)) {
        $found = "yes";
        break; 
    }
}

echo "Searching for: '$keyword'<break>";
echo "Result:" . strtoupper($found) . "<br>";



?>