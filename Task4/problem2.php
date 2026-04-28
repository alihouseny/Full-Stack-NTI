// Problem 2
<?php

function mathOperations($num1, $num2) {
    echo "Numbers: $num1 and $num2 <br>";
    echo "Product:".($num1 * $num2)."<br>";
    echo "Difference:".($num1 - $num2)."<br>";

    if ($num2 != 0) {
        echo "Division: ".($num1 / $num2)."\n";
    } else {
        echo "Division: Cannot divide by zero! <br>";
    }
}

mathOperations(10, 2);
?>