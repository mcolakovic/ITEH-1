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
    } else {
        echo "<script>alert('Korisnicko ime je vec zauzeto');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <title>MILITARYSHOP - Register</title>

</head>

<body>
    <div class="register-form">
        <div class="main-div">
            <form method="POST" action="#">
                <h1>REGISTRUJ SE</h1>
                <div class="imgcontainer">
                    <img src="img/military.png" id="military">
                </div>
                <div class="container">
                    <input type="text" placeholder="Username" name="usernameR" class="form-control" required>
                    <br>
                    <input type="password" placeholder="Password" name="passwordR" class="form-control" required>
                    <br>
                    <input type="text" placeholder="Name" name="nameR" class="form-control" required>
                    <br>
                    <input type="text" placeholder="Surname" name="surnameR" class="form-control" required>
                    <br>
                    <input type="text" placeholder="Email" name="emailR" class="form-control" required>
                    <br>
                    <input type="text" placeholder="Phone" name="phoneR" class="form-control" required>
                    <br>
                    <button class="btn btn-success" name="submit" type="sumbit">Registruj se</button>
                </div>
            </form>
        </div>
</body>

</html>