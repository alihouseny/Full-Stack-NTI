<?php
$tests = array(1, "tariq", 1.5, true, 7, 's', false);

for ($i = 0; $i < count($tests); $i++) {
    if (is_bool($tests[$i])) {
        echo ($tests[$i] ? "Yes" : "No") . "\n";
    } else {
        echo $tests[$i] . "\n";
    }
}


$i = 0;
while ($i < count($tests)) {
    if (is_bool($tests[$i])) {
        echo ($tests[$i] ? "Yes" : "No") . "\n";
    } else {
        echo $tests[$i] . "\n";
    }
    $i++;
}
?>
