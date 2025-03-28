<?php


    require_once "baza.php";

    $rezultat = $baza->query("SELECT * FROM proizvodi");

    $proizvodi = $rezultat->fetch_all(MYSQLI_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izlistavanje proizvoda</title>
</head>
<body>
    <form method="GET" action = "domaci_listProductsLogic.php">
            <h1>Izlistani proizvodi: </h1>
            <?php foreach($proizvodi as $proizvod):   ?>
                <div>
                    <h1><?= $proizvod['ime'] ?></h1>
                    <p><?= $proizvod['opis'] ?></p>
                    <p>Cena proizvoda:<?= $proizvod['cena'] ?></p>
                    <p>Na stanju:<?= $proizvod['kolicina'] ?></p>
                    <?php if ($proizvod['kolicina'] == 0): ?>
                        <p>Nema na stanju!</p>
                    <?php else:   ?>
                        <p>Ima na stanju</p>
                    <?php  endif;  ?>

                    <a href="domaci_productPage.php?id=<?=$proizvod['id'] ?>">Pogledaj proizvod</a>
                </div>
            <?php endforeach;  ?>
    </form>
    
</body>
</html>