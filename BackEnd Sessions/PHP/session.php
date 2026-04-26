<?php

/*for($i = 0; $i <= 50; $i++) {
    if($i % 5 == 0) {
        echo "boom<br>";
    } else {
        echo $i . "<br>";
    }
}*/





/*$persons=[
    "NAME"=>'ali',
    "AGE"=>'20',
    "GENDER"=>'male'
];

foreach($persons as $key=>$value){
    echo$key.":".$value. "<br>";
}*/





//swap

/*$numbers = [4, 3, 5, 7];
$n = count($numbers);

for ($i = 0; $i < $n - 1; $i++) {
    for ($j = 0; $j < $n - $i - 1; $j++) {
        
        if ($numbers[$j] > $numbers[$j + 1]) {
            // swap
            $temp = $numbers[$j];
            $numbers[$j] = $numbers[$j + 1];
            $numbers[$j + 1] = $temp;
        }
    }
}

echo "Sorted Numbers:<br>";
foreach ($numbers as $num) {
    echo $num . "<br>";
}



echo"<br>";



$students = [
    "marwa" => ["arabic" => 75, "english" => 90, "math" => 80],
    "ali" => ["arabic" => 70, "english" => 95, "math" => 63],
    "aly" => ["arabic" => 80, "english" => 89, "math" => 87]
];

foreach ($students as $name => $subjects) {
    
    $total = array_sum($subjects); 
    $avg = $total / count($subjects); 

    echo $name . " → Total: " . $total . " | Avg: " . $avg . "<br>";
}


echo"<br>";

$topStudent = "";
$topMarks = 0;

foreach ($students as $name => $subjects) {
    $total = array_sum($subjects);

    if ($total > $topMarks) {
        $topMarks = $total;
        $topStudent = $name;
    }
}

echo "Top Student: " . $topStudent . "<br>";
echo "Marks: " . $topMarks . "<br>";*/





//1
function sumArray($arr) {
    $sum = 0;
    foreach ($arr as $num) {
        $sum += $num;
    }
    return $sum;
}
$array = [2, 6, 5, 3, 9];
echo sumArray($array); 
echo"<br>";


//2

function maxNumber($arr) {
    $max = $arr[0];
    foreach ($arr as $num) {
        if ($num > $max) {
            $max = $num;
        }
    }
    return $max;
}
$array = [2, 6, 5, 3, 9];
echo maxNumber($array); 






?>