<?php

require "model/user.php";
require "dbBroker.php";

session_start();
if (isset($_POST['usernameR']) && isset($_POST['passwordR']) && isset($_POST['nameR']) && isset($_POST['surnameR']) && isset($_POST['emailR']) && isset($_POST['phoneR'])) {
    $userR = $_POST['usernameR'];
    $passR = $_POST['passwordR'];
    $nameR = $_POST['nameR'];
    $surnameR = $_POST['surnameR'];
    $emailR = $_POST['emailR'];
    $phoneR = $_POST['phoneR'];

    $odg = User::registerUser($userR, $passR, $nameR, $surnameR, $emailR, $phoneR, $conn);

    if ($odg) {
        header('Location: login.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>MILITARYSHOP - Register</title>

</head>

<body>
    <div class="register-form">
        <div class="main-div">
            <form method="POST" action="#">
                <div class="container">
                    <label class="username">Korisnik</label>
                    <input type="text" name="usernameR" class="form-control" required>
                    <br>
                    <label for="password">Lozinka</label>
                    <input type="password" name="passwordR" class="form-control" required>
                    <br>
                    <label class="name">Ime</label>
                    <input type="text" name="nameR" class="form-control" required>
                    <br>
                    <label class="surname">Prezime</label>
                    <input type="text" name="surnameR" class="form-control" required>
                    <br>
                    <label class="email">Email</label>
                    <input type="text" name="emailR" class="form-control" required>
                    <br>
                    <label class="phone">Telefon</label>
                    <input type="text" name="phoneR" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit">Registruj se</button>
                </div>

            </form>
        </div>


    </div>
</body>

</html>