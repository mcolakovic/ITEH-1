<?php

require "../dbBroker.php";
require "../model/proizvodi.php";

$rezultat = Proizvodi::sort($conn);

if (!$rezultat->num_rows == 0) {
    while ($red = $rezultat->fetch_array()) {
        echo json_encode($red);
    }
} else {
    echo "Failed";
}
