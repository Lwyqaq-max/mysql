<?php
$y = "text";
if(file_exists($y)){
    $last = file_get_contents($y);
    echo "访问量：".$snow = $last + 1;
    file_put_contents($y,$snow);
}
