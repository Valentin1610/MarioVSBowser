<?php

/**
 * Définir une classe Character
 */
class Character
{
    protected int $health;
    protected int $rage;

    /**
     * Méthode Magique qui hydrate l'objet(affecte des valeurs)
     * @param mixed $health
     * @param mixed $rage
     */
    public function __construct(int $health, int $rage)
    {
        $this->setHealth($health);
        $this->setRage($rage);
    }
    /**
     * Méthode retournant la valeur de la santé d'un personnage
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }
    /**
     * Méthode affectant la valeur de la santé à un personnage
     * @param int 
     */
    public function setHealth(int $health)
    {
        $this->health = $health;
    }
    /**
     * Méthode retournant la valeur de la rage à un personnage
     * @return int
     */
    public function getRage(): int
    {
        return $this->rage;
    }
    /**
     * Méthode affectant la valeur de la rage à un personnage
     * @param int 
     */
    public function setRage(int $rage)
    {
        $this->rage = $rage;
    }
}
