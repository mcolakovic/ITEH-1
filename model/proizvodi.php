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

    public static function getByProizvod($proizvodQ, mysqli $conn)
    {
        $query = "SELECT * FROM proizvodi WHERE proizvod=$proizvodQ";
        $proizvodi = array();
        if ($upit = $conn->query($query)) {
            while ($red = $upit->fetch_array(1)) {
                $proizvodi[] = $red;
            }
        }
        return $proizvodi;
    }

    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM proizvodi WHERE id=$this->id";
        return $conn->query($query);
    }

    public static function updateById($proizvodQ, mysqli $conn)
    {
        $query = "UPDATE proizvodi SET proizvod='$proizvodQ->proizvod', prozivodjac='$proizvodQ->prozivodjac', velicina='$proizvodQ->velicina',materijal='$proizvodQ->materijal',boja='$proizvodQ->boja' WHERE id='$proizvodQ->id'";
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
