<?php

require "../dbBroker.php";
require "../model/proizvodi.php";

$rezultat = Proizvodi::getAll($conn);


if ($rezultat) {
    while ($red = $rezultat->fetch_array()) {
        echo json_encode($red);
    }
} else {
    echo "Failed";
}
