<?php

class Proizvodi
{
    public $id;
    public $proizvod;
    public $proizvodjac;
    public $velicina;
    public $materijal;
    public $boja;

    public function __construct($id = null, $proizvod = null, $proizvodjac = null, $velicina = null, $materijal = null, $boja = null)
    {
        $this->id = $id;
        $this->proizvod = $proizvod;
        $this->proizvodjac = $proizvodjac;
        $this->velicina = $velicina;
        $this->materijal = $materijal;
        $this->boja = $boja;
    }

    public static function getAll($conn)
    {
        $query = "SELECT * FROM proizvodi";
        return $conn->query($query);
    }

    public static function getById($id, mysqli $conn)
    {
        $query = "SELECT * FROM proizvodi WHERE id=$id";
        $array = array();
        if ($result = $conn->query($query)) {

            while ($row = $result->fetch_array(1)) {
                $array[] = $row;
            }
        }
        return $array;
    }

    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM proizvodi WHERE id=$this->id";
        return $conn->query($query);
    }

    public static function update($idU, $proizvodU, $proizvodjacU, $velicinaU, $materijalU, $bojaU,  mysqli $conn)
    {
        $query = "UPDATE proizvodi SET proizvod='$proizvodU', proizvodjac='$proizvodjacU', velicina='$velicinaU',materijal='$materijalU',boja='$bojaU' WHERE id='$idU'";
        return $conn->query($query);
    }

    public static function add(Proizvodi $proizvodQ, mysqli $conn)
    {
        $query = "INSERT INTO proizvodi (proizvod, proizvodjac, velicina, materijal, boja) VALUES ('$proizvodQ->proizvod', '$proizvodQ->proizvodjac', '$proizvodQ->velicina', '$proizvodQ->materijal', '$proizvodQ->boja')";
        return $conn->query($query);
    }

    public static function sort(mysqli $conn)
    {
        $query = "SELECT * FROM proizvodi ORDER BY proizvod ASC, proizvodjac ASC";
        return $conn->query($query);
    }
}
