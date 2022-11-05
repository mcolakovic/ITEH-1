<?php

require "../dbBroker.php";
require "../model/proizvodi.php";

if (isset($_POST['pronadji'])) {
    $proizvodi = Proizvodi::getById($_POST['pronadji'], $conn);
}
