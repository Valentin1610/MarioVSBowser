<?php

require_once __DIR__  . '/Character.php';

/**
 * Création d'un class Hero héritant de Character
 */

class Hero extends Character
{
    private string $weapon;
    private int $weaponDamage;
    private string $shield;
    private int $shieldValue;



    /**
     * Méthode retournant la chaine de caractére qui définit le nom de l'arme équipée
     * @return string
     */
    public function getWeapon(): string
    {
        return $this->weapon;
    }

    /**
     * Méthode affectant la chaine de caractére qui définit le nom de l'arme équipée
     * @param string $weapon
     */
    public function setWeapon(string $weapon)
    {
        $this->weapon = $weapon;
    }

    /**
     *Méthode retournant la valeur des dégâts basiques de l'arme
     * @return int
     */
    public function getWeaponDamage(): int
    {
        return $this->weaponDamage;
    }



    /**
     *  *Méthode affectant la valeur des dégâts basiques de l'arm
     * @param int $weaponDamage
     *
     */
    public function setWeaponDamage(int $weaponDamage)
    {
        $this->weaponDamage = $weaponDamage;
    }



    /**
     * Méthode retournant la chaine de caractére qui définit le nom de l'armure équipée
     * @return string
     */
    public function getShield(): string
    {
        return $this->shield;
    }


    /**
     * Méthode affectant la chaine de caractére qui définit le nom de l'armure équipée
     * @param string $Shield
     */
    public function setShield(string $Shield)
    {
        $this->shield = $Shield;
    }



    /**
     * Méthode retournant la valeur du nombre de dégâts que l'armure encaisse à la place du héros
     * @return int
     */
    public function getShieldValue(): int
    {
        return $this->shieldValue;
    }



    /**
     * @param int $shieldValue
     * Méthode affectant la valeur du nombre de dégâts que l'armure encaisse à la place du héros
     */
    public function setShieldValue(int $shieldValue)
    {
        $this->shieldValue = $shieldValue;
    }



    /**
     * Méthode Magique construct permet de déclencher la méthoder de la classe mère (Character) 
     * Et permet de définir des valeurs de weapon, weaponDamage, shield, shieldValue.
     * @param string $weapon
     * @param int $weaponDamage
     * @param string $shield
     * @param int $shieldValue
     * @param int $health
     * @param int $rage
     */
    public function __construct(string $weapon, int $weaponDamage, string $shield, int $shieldValue, int $health, int $rage)
    {
        $this->setWeapon($weapon);
        $this->setWeaponDamage($weaponDamage);
        $this->setShield($shield);
        $this->setShieldValue($shieldValue);
        parent::__construct($health, $rage);
    }

    /**
     * Méthode permet au héros de prendre des dégâts en considérant la valeur de l'armure 
     * Pour chaque coup, la rage sera augmenté de 30 au héros.
     * @param int $shieldValue
     * @param int $damage
     */
    // 2000pv 600pdef 700attk
    public function attacked(int $damage)
    {
        $damageTaken = $damage - $this -> getShieldValue();
        if($damageTaken > 0){
            $this->setHealth($this->getHealth() - $damageTaken);
        }
        $newValue = round($this -> getShieldValue() - ($damage / 15));
        $newValue = ($newValue > 0) ? $newValue : 0 ;
        $this -> setShieldValue($newValue);

        $this->rage += 30;
    }
}
