<?php

require "../dbBroker.php";
require "../model/proizvodi.php";

if (isset($_POST['id'])) {
    $obj = new Proizvodi($_POST['id']);
    $status = $obj->deleteById($conn);
}
