<?php

    if (!isset($_GET['ime']) || empty($_GET['ime']))
    {
        die("Niste uneli ime!");
    }

    if (!isset($_GET['opis']) || empty($_GET['opis']))
    {
        die("Niste uneli opis!");
    }

    if (!isset($_GET['cena']) || empty($_GET['cena']))
    {
        die("Niste uneli cenu!");
    }

    if (!isset($_GET['slika']) || empty($_GET['slika']))
    {
        die("Niste uneli sliku!");
    }

    if (!isset($_GET['kolicina']) || empty($_GET['kolicina']))
    {
        die("Niste uneli kolicinu!");
    }
    
    require_once "baza.php";

    $ime = $_GET['ime'];
    $opis = $_GET['opis'];
    $cena = $_GET['cena'];
    $slika = $_GET['slika'];
    $kolicina = $_GET['kolicina'];

    $q = $baza->query("SELECT * FROM proizvodi WHERE ime = '$ime'");

    if ($q->num_rows == 1)
    {
        echo "ovaj proizvod vec postoji!";
    }
    else
    {
        $rezultat = $baza->query("INSERT INTO proizvodi (ime, opis, cena, slika, kolicina) VALUES ('$ime', '$opis', '$cena', '$slika', '$kolicina')");
        echo "Uspesno ste dodali $ime";
    }