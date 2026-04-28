<?php
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


?>
