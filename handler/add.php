<?php

require "../dbBroker.php";
require "../model/proizvodi.php";

if (isset($_POST['proizvod']) && isset($_POST['proizvodjac']) && isset($_POST['velicina']) && isset($_POST['materijal']) && isset($_POST['boja'])) {
    $proizvod = new Proizvodi(null, $_POST['proizvod'], $_POST['proizvodjac'], $_POST['velicina'], $_POST['materijal'], $_POST['boja']);
    $status = Proizvodi::add($proizvod, $conn);
}
