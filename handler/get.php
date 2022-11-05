<?php

require "../dbBroker.php";
require "../model/proizvodi.php";

if (isset($_POST['id'])) {
    $status = Proizvodi::getById($_POST['id'], $conn);
    if ($status) {
        echo json_encode($status);
    } else {
        echo "Failed";
    }
}
