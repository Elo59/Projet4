<?php
// src/ETO/ReservationBundle/Entity/Commande.php

namespace ETO\ReservationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Commande{
    /**
     * @ORM\Column(name="id_commande", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="date_commande", type="datetime")
     */
    protected $dateCommande;

    /**
     * @ORM\Column(name="jour_Visite", type="datetime")
     */
    protected $jourVisite;

    /**
     * @ORM\Column(name="type_Billet", type="integer")
     */
    protected $typeBillet;

    /**
     * @ORM\Column(name="nb_Billet", type="integer")
     */
    protected $nbBillet;

    /**
     * @ORM\ManyToOne(targetEntity="ETO\ReservationBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $User;

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
    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    /**
     * @return mixed
     */
    public function getJourVisite()
    {
        return $this->jourVisite;
    }

    /**
     * @return mixed
     */
    public function getTypeBillet()
    {
        return $this->typeBillet;
    }

    /**
     * @return mixed
     */
    public function getNbBillet()
    {
        return $this->nbBillet;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->User;
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
     * @param mixed $dateCommande
     */
    public function setDateCommande($dateCommande)
    {
        $this->dateCommande = $dateCommande;
    }

    /**
     * @param mixed $jourVisite
     */
    public function setJourVisite($jourVisite)
    {
        $this->jourVisite = $jourVisite;
    }

    /**
     * @param mixed $typeBillet
     */
    public function setTypeBillet($typeBillet)
    {
        $this->typeBillet = $typeBillet;
    }

    /**
     * @param mixed $nbBillet
     */
    public function setNbBillet($nbBillet)
    {
        $this->nbBillet = $nbBillet;
    }

    /**
     * @param mixed $idUser
     */
    public function setUser(Utilisateur $User)
    {
        $this->User = $User;

        return $this;
    }
}