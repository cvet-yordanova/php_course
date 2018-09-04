<?php

$times = array(
    '10:30',
    '13:30',
    '15:00',
    '16:30',
    '18:00'
);

$timesCount = count($times);
$size = mt_rand(1, $timesCount);

for($i = 0; $i < $timesCount - $size; $i++) {
    $remove = mt_rand(0, count($times) - 1);
    unset($times[$remove]);
    $times = array_values($times);
}

header('Content-type: application/json');
echo json_encode($times);