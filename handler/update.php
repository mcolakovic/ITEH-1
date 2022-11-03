<?php

require "../dbBroker.php";
require "../model/proizvodi.php";

if (isset($_POST['idIzmijeni'])) {
    $proizvod = new Proizvodi($_POST['idIzmijeni'], $_POST['proizvodI'], $_POST['proizvodjacI'], $_POST['velicinaI'], $_POST['materijalI'], $_POST['bojaI']);
    $status = Proizvodi::updateById($proizvod, $conn);
}
