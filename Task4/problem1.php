// Problem 1
<?php



echo "--- Problem 1: Age Check ---\n";

$age = 20; 

if ($age >= 18) {
    echo " Welcome! You are allowed.\n";
} else {
    echo " Sorry, you are not allowed to log in. You must be 18 or older.\n";
}

echo "\n";




// ============================================================
// Problem 3: function with array - Sum of array elements
// ============================================================
echo "--- Problem 3: Array Sum Function ---\n";

function sumArray($numbers) {
    $total = 0;
    foreach ($numbers as $num) {
        $total += $num;
    }
    return $total;
}

$nums = [1, 2, 3, 4, 5];
echo "Array: [" . implode(", ", $nums) . "]\n";
echo "Sum: " . sumArray($nums) . "\n";

echo "\n";


// ============================================================
// Problem 4: Search in array of films
// ============================================================
echo "--- Problem 4: Film Search ---\n";

$films = array("Fast", "Predestination", "Persuit", "Prestige");
$keyword = "avatar"; // Try "Fast" to get YES

$found = "no";

foreach ($films as $film) {
    if (strtolower($film) === strtolower($keyword)) {
        $found = "yes";
        break; // Exit loop as soon as found
    }
}

echo "Searching for: '$keyword'\n";
echo "Result: " . strtoupper($found) . "\n";

echo "\n";


// ============================================================
// Problem 5: Bubble Sort function - RouteBubble
// ============================================================
echo "--- Problem 5: Bubble Sort ---\n";

function RouteBubble($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                // Swap
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}

$unsorted = [64, 34, 25, 12, 22, 11, 90];
echo "Before: [" . implode(", ", $unsorted) . "]\n";
$sorted = RouteBubble($unsorted);
echo "After:  [" . implode(", ", $sorted) . "]\n";

echo "\n";


// ============================================================
// Problem 6: Find max number in array
// ============================================================
echo "--- Problem 6: Maximum Number ---\n";

$tests = array(5, 4, 9, 3, 1, 7, 5, 8, 6);
$max = $tests[0];

foreach ($tests as $num) {
    if ($num > $max) {
        $max = $num;
    }
}

echo "Array: [" . implode(", ", $tests) . "]\n";
echo "Max: $max\n";

echo "\n";


// ============================================================
// Problem 7: Count occurrences of a film in array
// ============================================================
echo "--- Problem 7: Count Film Occurrences ---\n";

$films = array("avatar", "Prestige", "avatar", "Prestige");
$keyword = "avatar";
$count = 0;

foreach ($films as $film) {
    if (strtolower($film) === strtolower($keyword)) {
        $count++;
    }
}

echo "Film '$keyword' appears $count time(s)\n";

echo "\n";


// ============================================================
// Problem 8: RouteRandomPass - Generate random string of given length
// ============================================================
echo "--- Problem 8: Random Password Generator ---\n";

function RouteRandomPass($length) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charLen = strlen($characters);
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, $charLen - 1)];
    }

    return $password;
}

$len = 8;
echo "Random password of length $len: " . RouteRandomPass($len) . "\n";

echo "\n";


// ============================================================
// Problem 9: Display array - skip Booleans, show them as YES/NO
// ============================================================
echo "--- Problem 9: Boolean Handling ---\n";

$tests = array(1, "tariq", 1.5, true, 7, 's', false);

echo "-- Using FOR loop --\n";
for ($i = 0; $i < count($tests); $i++) {
    if (is_bool($tests[$i])) {
        echo ($tests[$i] ? "Yes" : "No") . "\n";
    } else {
        echo $tests[$i] . "\n";
    }
}

echo "\n-- Using WHILE loop --\n";
$i = 0;
while ($i < count($tests)) {
    if (is_bool($tests[$i])) {
        echo ($tests[$i] ? "Yes" : "No") . "\n";
    } else {
        echo $tests[$i] . "\n";
    }
    $i++;
}

echo "\n";


// ============================================================
// Problem 10: Sort array using PHP's built-in sort
// ============================================================
echo "--- Problem 10: Sort Array ---\n";

$tests = array(6, 4, 9, 3, 12, 8, 7);
echo "Before: [" . implode(", ", $tests) . "]\n";
sort($tests);
echo "After:  " . implode(" ", $tests) . "\n";

echo "\n";


// ============================================================
// Problem 11: Find common values between two arrays
// ============================================================
echo "--- Problem 11: Same Values in Two Arrays ---\n";

$arr1 = array('a', 'b', 'c', 'd');
$arr2 = array('c', 'd', 'e', 'f');

$common = array_intersect($arr1, $arr2);
echo "Common elements: " . implode(" - ", $common) . "\n";

echo "\n";
echo "========================================\n";
echo "   Problem 12: See form.php file\n";
echo "========================================\n";