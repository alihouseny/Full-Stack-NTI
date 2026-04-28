// Problem 3
<?php

function sumArray($numbers) {
    $total = 0;
    foreach ($numbers as $num) {
        $total += $num;
    }
    return $total;
}
$nums = [1,2,3,4,5];
echo"Array:[" . implode(", ", $nums)."]<br>";
echo"Sum:".sumArray($nums) ."<br>";


?>