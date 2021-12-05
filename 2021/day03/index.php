<?php
$initial_data = explode("\n", trim(file_get_contents('data.txt')));

/* ----------------------------------------------------------
  Challenge 1
---------------------------------------------------------- */

$bits = strlen($initial_data[0]);
$total_bits = array();

/* Extract bit frequency */
foreach ($initial_data as $item) {
    $item_parts = str_split($item);
    foreach ($item_parts as $i => $bit_value) {
        if (!isset($total_bits[$i])) {
            $total_bits[$i] = array();
        }
        if (!isset($total_bits[$i][$bit_value])) {
            $total_bits[$i][$bit_value] = 0;
        }
        $total_bits[$i][$bit_value]++;
    }
}

/* Extract gamma & epsilon values */
$gamma = '';
$espilon = '';

foreach ($total_bits as $value) {
    if ($value[0] > $value[1]) {
        $gamma .= '0';
        $espilon .= '1';
    } else {
        $gamma .= '1';
        $espilon .= '0';
    }
}

/* Convert from binary to decimal */
echo "Challenge 1 : " . (bindec($gamma) * bindec($espilon)) . "<br />";
