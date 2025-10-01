<?php

function cariBilanganTerbesar($angka1, $angka2) {
    if ($angka1 > $angka2) {
        return $angka1;
    } else {    
        return $angka2;
    }
}

$bilanganA = 100;
$bilanganB = 150;

$terbesar = cariBilanganTerbesar($bilanganA, $bilanganB);

echo "Antara bilangan $bilanganA dan $bilanganB, yang terbesar adalah: <b>$terbesar</b>";

?>