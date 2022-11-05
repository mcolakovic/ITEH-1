<?php

require 'dbBroker.php';
require 'model/proizvodi.php';

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

$rezultat = Proizvodi::getAll($conn);

if (!$rezultat) {
    echo "Nastala je greska prilikom preuzimanja podataka!";
    die();
}
if ($rezultat->num_rows == 0) {
    echo "Nema proizvoda!";
    die();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/shop.css">
    <title>MILITARYSHOP - Military Shop Stock</title>

</head>

<body>


    <div class="jumbotron" style="color: black;">
        <h1>Military Shop Stock</h1>
    </div>

    <div class="row">
        <nav class="navbar navbar-light bg-light" style="float:right ;">
            <form class="form-inline">
                <input class="form-control mr-sm-2" id="pronadji" name="pronadji" type="search" placeholder="Pronadji *" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" id="btn-pronadji" type="submit">Pronadji</button>
            </form>
        </nav>
    </div>

    <div id="pregled" class="panel panel-success" style="margin-top: 1%;">

        <div class="panel-body">
            <table id="myTable" class="table sortable table-hover table-striped" style="color: black; background-color: grey; margin-bottom: 0px;">
                <thead class="thead">
                    <tr>
                        <th scope="col">Proizvod</th>
                        <th scope="col">Proizvodjac</th>
                        <th scope="col">Velicina</th>
                        <th scope="col">Materijal</th>
                        <th scope="col">Boja</th>

                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php
                    while ($red = $rezultat->fetch_array()) {
                    ?>
                        <tr id="tr-<?php echo $red["id"] ?>">
                            <td><?php echo $red["proizvod"] ?></td>
                            <td><?php echo $red["proizvodjac"] ?></td>
                            <td><?php echo $red["velicina"] ?></td>
                            <td><?php echo $red["materijal"] ?></td>
                            <td><?php echo $red["boja"] ?></td>
                            <td>
                                <label class="custom-radio-btn">
                                    <input type="radio" name="cekiran" value=<?php echo $red["id"] ?>>
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-3" style="text-align: right;">
            <button id="btn-dodaj" class="btn btn-primary btn-block" data-toggle="modal" data-target="#dodajModal ">Dodaj</button>
        </div>

        <div class=" col-md-3" style="text-align: right">
            <button id="btn-izmeni" class="btn btn-primary btn-block" onclick="postaviPodatke()" data-toggle="modal" data-target="#izmijeniModal">Izmijeni</button>
        </div>

        <div class="col-md-3" style="text-align: right">
            <button id="btn-obrisi" class="btn btn-primary btn-block">Obrisi</button>
        </div>

        <div class=" col-md-3" style="text-align: right;">
            <button id="btn-sortiraj" class="btn btn-primary btn-block" onclick="sortTable()">Sortiraj</button>
        </div>

    </div>

    <!-- Dodaj -->
    <div class="modal fade" id="dodajModal" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container prijava-form">
                        <form action="#" method="post" id="dodajForm">
                            <h3 style="color: black; text-align: center">Dodaj proizvod</h3>
                            <div class="row">
                                <div class="col-md-11 ">
                                    <div class="form-group">
                                        <label for="">Proizvod</label>
                                        <input type="text" style="border: 1px solid black" name="proizvod" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Proizvodjac</label>
                                        <input type="text" style="border: 1px solid black" name="proizvodjac" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Velicina</label>
                                        <input type="text" style="border: 1px solid black" name="velicina" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Materijal</label>
                                        <input type="text" style="border: 1px solid black" name="materijal" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Boja</label>
                                        <input type="text" style="border: 1px solid black" name="boja" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <button id="btnDodaj" type="submit" class="btn btn-success btn-block" style="background-color: orange; border: 1px solid black;">Dodaj</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Izmijeni -->
    <div class="modal fade" id="izmijeniModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container prijava-form">
                        <form action="#" method="post" id="izmijeniForm">
                            <h3 style="color: black">Izmijeni proizvod</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="id" type="text" name="id" class="form-control" placeholder="Id *" value="" readonly />
                                    </div>
                                    <div class="form-group">
                                        <input id="proizvod" type="text" name="proizvod" class="form-control" placeholder="Proizvod *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input id="proizvodjac" type="text" name="proizvodjac" class="form-control" placeholder="Proizvodjac *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input id="velicina" type="text" name="velicina" class="form-control" placeholder="Velicina *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input id="materijal" type="text" name="materijal" class="form-control" placeholder="Materijal *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input id="boja" type="text" name="boja" class="form-control" placeholder="Boja *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <button id="btnIzmeni" type="submit" class="btn btn-success btn-block" style="color: white; background-color: orange; border: 1px solid white"> Izmijeni</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>