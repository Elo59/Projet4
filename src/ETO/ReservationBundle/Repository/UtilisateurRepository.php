<?php
// src/ETO/ReservationBundle/Entity/UtilisateurRepository.php

namespace ETO\ReservationBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class UtilisateurRepository extends EntityRepository
{


    public function getIDLast()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('ETOReservationBundle:Utilisateur')
        ;

        // on recherche le dernier id
        $utilisateur = $repository->findOneBy(array('id_user' => 'ascq'));

        // Enfin, on retourne le résultat
        return $utilisateur;
    }
}