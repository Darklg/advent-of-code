<?php
$initial_data = explode("\n", trim(file_get_contents('data.txt')));

/* ----------------------------------------------------------
  Advent 1
---------------------------------------------------------- */

$prev_value = false;
$nb_bigger = 0;
foreach ($initial_data as $depth) {
    $depth = intval($depth, 10);
    if ($prev_value !== false && $depth > $prev_value) {
        $nb_bigger++;
    }
    $prev_value = $depth;
}

echo "Advent 1 : " . $nb_bigger . "<br />";

/* ----------------------------------------------------------
  Advent 2
---------------------------------------------------------- */

$sums = array();
foreach ($initial_data as $i => $depth) {
    if (!isset($initial_data[$i + 2]) || !is_numeric($initial_data[$i + 2])) {
        continue;
    }
    $sum = $depth;
    for ($y = 1; $y <= 2; $y++) {
        $sum += $initial_data[$i + $y];
    }
    $sums[] = $sum;
}

$prev_value = false;
$nb_bigger = 0;
foreach ($sums as $depth) {
    $depth = intval($depth, 10);
    if ($prev_value !== false && $depth > $prev_value) {
        $nb_bigger++;
    }
    $prev_value = $depth;
}

echo "Advent 2 : " . $nb_bigger . "<br />";
