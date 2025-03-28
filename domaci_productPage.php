<?php
    require_once "baza.php";

    
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        die("Proizvod nije pronađen!");
    }

    
    $id = $_GET['id'];

    
    $rezultat = $baza->query("SELECT * FROM proizvodi WHERE id = $id");

    if ($rezultat->num_rows > 0) {
        $proizvod = $rezultat->fetch_assoc();
    } else {
        die("Proizvod nije pronađen!");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>

    <h1><?php echo $proizvod['ime']; ?></h1>
    <p><?php echo $proizvod['opis']; ?></p>
    <p>Cena: <?php echo $proizvod['cena']; ?> din</p>
    <p>Količina na stanju: <?php echo $proizvod['kolicina']; ?></p>
    
    <?php if ($proizvod['kolicina'] == 0): ?>
        <p>Nema na stanju!</p>
    <?php else: ?>
        <p>Na stanju</p>
    <?php endif; ?>

</body>
</html>
