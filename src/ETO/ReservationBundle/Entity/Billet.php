<?php
// src/ETO/ReservationBundle/Entity/Billet.php

namespace ETO\ReservationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Billet{
    /**
     * @ORM\Column(name="id_billets", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="ETO\ReservationBundle\Entity\Commande")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $Commande;

    /**
     * @ORM\ManyToOne(targetEntity="ETO\ReservationBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $User;

    /**
     * @ORM\Column(name="tarif_reduit", type="boolean")
     */
    protected $tarifReduit;

    // Les getters

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCommande()
    {
        return $this->Commande;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->User;
    }

    /**
     * @return mixed
     */
    public function getTarifReduit()
    {
        return $this->tarifReduit;
    }

    // Les setters

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $idCommandes
     */
    public function setCommande(Commande $Commande)
    {
        $this->Commande = $Commande;
        return $this;
    }

    /**
     * @param mixed $idUser
     */
    public function setUser(Utilisateur $User)
    {
        $this->User = $User;
        return $this;
    }

    /**
     * @param mixed $tarifReduit
     */
    public function setTarifReduit($tarifReduit)
    {
        $this->tarifReduit = $tarifReduit;
    }
}