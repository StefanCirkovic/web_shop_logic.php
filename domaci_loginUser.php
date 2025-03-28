<?php


    if (!isset($_POST['email']) || empty($_POST['email']))
    {
        die("Niste uneli email!");
    }

    if (!isset($_POST['sifra']) || empty($_POST['sifra']))
    {
        die("Niste uneli sifru!");
    }


    $email = $_POST['email'];
    $sifra = $_POST['sifra'];

    require_once "baza.php";

    $q = $baza->query("SELECT * FROM korisnici WHERE email = '$email'");

    if ($q->num_rows == 1)
    {
        echo "korisnik vec postoji!";
    }
    else
    {
        $rezultat = $baza->query("INSERT INTO korisnici (email, sifra) VALUES ('$email', '$sifra')");
        echo "Uspesno ste se registrovali!";


        header("Location: domaci_dashboard.php");
        exit();
    }


