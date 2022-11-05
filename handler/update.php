<?php

require "../dbBroker.php";
require "../model/proizvodi.php";

if (isset($_POST['id']) && isset($_POST['proizvod']) && isset($_POST['proizvodjac']) && isset($_POST['velicina']) && isset($_POST['materijal']) && isset($_POST['boja'])) {
    $status = Proizvodi::update($_POST['id'], $_POST['proizvod'], $_POST['proizvodjac'], $_POST['velicina'], $_POST['materijal'], $_POST['boja'], $conn);
    if ($status) {
        echo "Success";
    } else {
        echo $status;
        echo "Failed";
    }
}
