<?php

// Lier le fichier Character.php 
require_once __DIR__ . '/Character.php';

/**
 * Création d'une class ORc héritant de Character ayant pour attribut damage
 */
class Orc extends Character
{
    private int $damage;

    /**
     * Méthode retournant la valeur des dégâts à l'orc
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * Méthode affectant la valeur des dégâts à l'orc
     * @param int $damage
     * 
     */
    public function setDamage(int $damage)
    {
        $this->damage = $damage;
    }

    

    /**
     * Création de la méthode magique construct de la Orc
     * @param int $rage
     * @param int $health
     */
    public function __construct( int $rage, int $health)
    {
        parent::__construct($health, $rage);
    }

    public function attack()
    {
        $this->damage = rand(600, 800);
    }
}
