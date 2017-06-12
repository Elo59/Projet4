<?php

// src/ETO/ReservationBundle/Controller/AdvertController.php

namespace ETO\ReservationBundle\Controller;

use ETO\ReservationBundle\Entity\Commande;
use ETO\ReservationBundle\Entity\Billet;
use ETO\ReservationBundle\Entity\Utilisateur;
use OC\PlatformBundle\Entity\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReservationController extends Controller
{
    public function indexAction()
    {
        return $this->render('ETOReservationBundle:Reservation:index.html.twig');
    }

    public function billeterieAction(Request $request)
    {
        //on sauvegarde le nom et prénom saisie par l'utilisateur
        $nom = "toto";
        $prenom = "titi";

        $utilisateur = $this->getDoctrine()
            ->getRepository('ETOReservationBundle:Utilisateur')
            ->findOneBy(array('nom' => $nom, 'prenom' => $prenom));

        // on test si l'utilisateur existe
        if (null === $utilisateur) {
            // on enregistre le nouvel utilisateur
            // Création des entités
            $utilisateur_new = new Utilisateur();

            // On récupère l'EntityManager
            $em = $this->getDoctrine()->getManager();

            // Étape 1 : On « persiste » les entités
            $em->persist($utilisateur_new);

            //  Étape 2 : On « flush » tout ce qui a été persisté avant
            $em->flush();

            //on récupére l'ID créé
            $utilisateur = $this->getDoctrine()
                ->getRepository('ETOReservationBundle:Utilisateur')
                ->findOneBy(array('id_user' => 'ascq'));

            $id=$utilisateur->getId();

        }else{
            $id=$utilisateur->getId();
        }

        // Reste de la méthode qu'on avait déjà écrit
        if ($request->isMethod('POST')) {
            $request->getSession()->getFlashBag()->add('notice', 'Commande bien enregistrée.');
        }

        // Si on n'est pas en POST, alors on affiche le formulaire
        return $this->render('ETOReservationBundle:Reservation:billeterie.html.twig');
    }

    public function billetsAction(Request $request)
    {
        // Création de l'entité
        $billet = new Billet();

        $em = $this->getDoctrine()->getManager();
        $em->persist($billet);
        $em->flush();

        if ($request->isMethod('POST')) {
            $request->getSession()->getFlashBag()->add('notice', 'Billet bien enregistrée.');
        }

        // Si on n'est pas en POST, alors on affiche le formulaire
        return $this->render('ETOReservationBundle:Reservation:billets.html.twig');
    }

    public function paiementAction()
    {
        return $this->render('ETOReservationBundle:Reservation:paiement.html.twig');
    }

    public function validationAction()
    {
        return $this->render('ETOReservationBundle:Reservation:validation.html.twig');
    }
}