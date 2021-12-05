<?php
$initial_data = explode("\n", trim(file_get_contents('data.txt')));

/* ----------------------------------------------------------
  Challenge 1
---------------------------------------------------------- */

$depth = 0;
$horizontal = 0;

foreach ($initial_data as $instruction) {
    $instruction_parts = explode(" ", $instruction);
    /* Removing invalid lines */
    if (!is_array($instruction_parts) || !isset($instruction_parts[1]) || !is_numeric($instruction_parts[1])) {
        continue;
    }
    $movement = intval($instruction_parts[1], 10);

    switch ($instruction_parts[0]) {
    case 'up':
        $depth -= $movement;
        break;
    case 'down':
        $depth += $movement;
        break;
    case 'forward':
        $horizontal += $movement;
        break;
    }

}

echo "Challenge 1 : " . ($depth * $horizontal) . "<br />";

/* ----------------------------------------------------------
  Challenge 2
---------------------------------------------------------- */

$depth = 0;
$horizontal = 0;
$aim = 0;

foreach ($initial_data as $instruction) {
    $instruction_parts = explode(" ", $instruction);
    /* Removing invalid lines */
    if (!is_array($instruction_parts) || !isset($instruction_parts[1]) || !is_numeric($instruction_parts[1])) {
        continue;
    }
    $movement = intval($instruction_parts[1], 10);

    switch ($instruction_parts[0]) {
    case 'up':
        $aim -= $movement;
        break;
    case 'down':
        $aim += $movement;

        break;
    case 'forward':
        $horizontal += $movement;
        $depth += $aim * $movement;
        break;
    }
}

echo "Challenge 2 : " . ($depth * $horizontal) . "<br />";
