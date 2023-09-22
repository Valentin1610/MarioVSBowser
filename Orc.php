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
     * Création de la méthode magique construct de la Orc
     * @param int $rage
     * @param int $health
     */
    public function __construct( int $rage, int $health)
    {
        parent::__construct($health, $rage);
    }

    public function __toString() : string
    {
        return 'L\'orc a une santé de ' . $this->getHealth() ;
    }
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
     */
    public function setDamage(int $damage)
    {
        $this->damage = $damage;
    }

    public function attack()
    {
        $this->setDamage(rand(600, 800)) ;
    }
}
