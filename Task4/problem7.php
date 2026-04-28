<?php
$films = array("avatar", "Prestige", "avatar", "Prestige");
$keyword = "avatar";
$count = 0;

foreach ($films as $film) {
    if (strtolower($film) === strtolower($keyword)) {
        $count++;
    }
}

echo "Film '$keyword' appears $count time(s)\n";


?>