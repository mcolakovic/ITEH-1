<?php

require 'dbBroker.php';
require 'model/proizvodi.php';

session_start();
if (!isset($_SESSION['user_all'])) {
    header('Location: index.php');
    exit();
}
