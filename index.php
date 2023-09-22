<?php


require_once  __DIR__ . '/Hero.php';
require_once __DIR__ . '/Orc.php';

$hero = new Hero('MasterSword', 250, 'Bouclier Hylien', 600, 2000, 0);
$orc = new Orc(0, 500);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Qui régnera sur le royaume Champignon entre Mario et Bowser ?">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="public/assets/img/Champi.webp">
    <link rel="stylesheet" href="public/assets/css/style.css">
    <title>Mario VS Bowser</title>
</head>

<body>
    <h1 class="text-center text-white">Mario vs Bowser : Qui règnera sur le Royaume Champignon ?</h1>
    <div class="container-fluid text-center mt-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="card h-100 opacity-75">
                    <div class="card-body">
                        <p><strong>Mario</strong></p>
                        <p>PV: 2000, Point de Rage : 0</p>
                        <p>600 points d'armure, 250 points de dégâts pour l'arme</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 opacity-75">
                    <div class="card-body">
                        <p><strong>Bowser</strong></p>
                        <p>PV de Bowser : 500</p>
                        <p>Point de Rage : 0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-3">
        Cliquer sur ce bouton pour lancer la musique -> <button id="playButton" name="audio" type="button">Play !</button>
        <audio id="music" src="/public/assets/audio/Boss.mp3"></audio>
    </div>
    <div class="container mt-4">

        <div class="sidebar bg-dark">
            <?php
            while ($hero->getHealth() > 0 && $orc->getHealth() > 0) {
                $orc->attack();
                $damage = $orc->getDamage();
                $shield = $hero->getShieldValue();
                $attack = $hero->attacked($damage);
                $hurt = $damage - $shield;
                $health = $hero->getHealth();
                if ($hero->getHealth() < 0) {
                    $health = 0;
                }
            ?>
                <p class="text-center text-white"><?= '
        Bowser a attaqué Mario avec' . ' ' . $orc->getDamage() . ' ' . 'points de dégâts.' .  ' ' . 'Mario bloque son attaque grâce à son bouclier qui a pour valeur' . ' ' . $shield . ' ' . 'Mario a subi' . ' ' . $hurt . ' ' . 'de dégâts et il lui reste' . ' ' . $health . ' ' . 'points de vie.' . ' ' . 'et il a une rage de' . ' ' . $hero->getRage() . '<br>';
                                                    ?>
                </p>
                <?php
                if ($hero->getRage() > 100 && $hero->getHealth() > 0) {
                    $hero->setRage(0);
                    $orc->setHealth($orc->getHealth() - $hero->getWeaponDamage()); ?>
                    <p class="text-center text-white">
                        <?= 'Mario contre attaque et déchaine sa rage avec une valeur de' . ' ' .  $hero->getWeaponDamage() . ' ' . 'points de dégâts à Bowser.'  .  'Il lui reste' . ' ' . $orc->getHealth() . ' ' . 'points de vie.';
                        ?>
                    </p><?php
                    }
                } ?>
        </div>

        <div class="contents bg-dark">
            <p class="text-center text-white">Annonce du Vainqueur : </p>
            <?php
            if ($health <= 0) {
                $result = 'Bowser a gagné';
                $victory = 'public/assets/img/bowser.jpg';
                $victoryAlt = 'bowser';
            }
            if ($orc->getHealth() <= 0) {
                $result = 'Mario a gagné';
                $victory = 'public/assets/img/mario.png';
                $victoryAlt = 'mario';
            }
            ?>

            <h2 class="text-center text-white"> <?= $result; ?></h2>
        </div>
    </div>

    <div class="text-center mt-4">
        <img class="resultImg" src='<?= $victory ?>'>
    </div>
    <script src="/public/assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>