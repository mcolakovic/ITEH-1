<?php

require "../dbBroker.php";
require "../model/proizvodi.php";

$rezultat = Proizvodi::getAll($conn);

if (!$rezultat->num_rows == 0) {
    $status = Proizvodi::sort($conn);
}
