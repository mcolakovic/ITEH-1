<?php

require "model/user.php";
require "dbBroker.php";

session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $userL = $_POST['username'];
    $passL = $_POST['password'];

    $odg = User::logInUser($userL, $passL, $conn);
    if ($odg->num_rows == 1) {
        $_SESSION['user'] = $userL;
        header('Location: shop.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>MILITARYSHOP - LogIn</title>

</head>

<body>
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
                <div class="container">
                    <label class="username">Korisnik</label>
                    <input type="text" name="username" class="form-control" required>
                    <br>
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit">Prijavi se</button>
                </div>

            </form>
        </div>


    </div>
</body>

</html>