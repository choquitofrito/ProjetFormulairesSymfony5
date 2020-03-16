<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

// les entités de base
use App\Entity\Genre;
use App\Entity\Livre;
// les classes des Formulaires
use App\Form\LivreGenreType;

use Symfony\Component\HttpFoundation\Request;


class ExemplesFormulairesObjetsController extends AbstractController
{
    /**
     * @Route ("/exemples/formulaires/objets/traitement/livre/genre");
     */
    
    // dans la même action on réalise le rendu et la réception 
    public function exempleLivre (Request $req){
        // 1. Création d'une entité vide
        $livre = new Livre();
        // 2. Création du formulaire du type souhaité
        $formulaireLivre = $this->createForm (LivreGenreType::class);
        
        // 3. Analyse de l'objet Request
        $formulaireLivre->handleRequest($req);
        
        // 4. Vérification: on vient d'un submit ou pas?
        
        // si oui, on traite le formulaire et on remplit l'entité
        if ($formulaireLivre->isSubmitted() && $formulaireLivre->isValid()){
            // Remplissage de l'entité avec les données du formulaire
            $livre = $formulaireLivre->getData();
            // Rendu d'une vue où on affiche les données
            // Normalement on faire CRUD ici ou une autre opération...
            return $this->render ('/exemples_formulaires_objets/traitement_formulaire_livre.html.twig',
                                ['livre'=> $livre]);
        }
        // si non, on doit juste faire le rendu du formulaire
        else {
            return $this->render ('/exemples_formulaires_objets/affichage_formulaire_livre.html.twig',
                                ['formulaireLivre'=> $formulaireLivre->createView()]);
        }
    }
}
