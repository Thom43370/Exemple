<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Commun_view
 *
 * @author Thomas
 */
class Commun_view {
    
    public function __construct(){
        
    }
        #Affiche toutes les regles
    public function AfficherRegle($res, $param=null, $page=null){
        $resultat='<article class="col-6 offset-3"><h1>Choisis la reglementation</h1>';
        $resultat.='<form action="index.php?type=Commun&action=LaReglementation&param='.$param.'&page='.$page.'" method="post">';
            
        $resultat.='<select name="regle2"><option value="">Choisis la reglementation</option>';
        foreach($res as $key=>$value){
            $resultat.='<option value="'.$value['id'].'">'.$value['regle'].' - ' . $value['commentaire'] . '</option>';
        }            
        $resultat.='</select><input type="submit"></form></article>';
        return $resultat;
    }
    #affiche toutes les cat
    public function AfficherReglementation($res, $param=null, $page=null){
        //printr($_SESSION);
        $resultat='<section class="container"><div class="row"><article class="col-6 offset-3"><h1>Choisis la categorie</h1>'
                . '<form action="index.php?type='.$param.'&action='.$page.'" method="post">'
                . '<select name="reglementation"><option value="">Choisis la categorie</option>';
        foreach($res as $key=>$value){
            $resultat.='<option value="'.$value['id'].'">categorie '.$value['categorie'].'</option>';
        }            
        $resultat.='</select><input type="hidden" value="'.$_POST['regle2'].'" name="regle2" /><input type="submit"></form><p class="mt-5 mb-5 text-center"><a href="index.php?type=Commun&action=AjouterCategorie">Ajouter une categorie</a></p></article></div></section>';
        return $resultat;
    }

    public function AjouterRegle(){
        $resultat='<article class="col-6 offset-3" id="Ajoutregle">
        <h1>Choisis la reglementation à AJOUTER</h1>
        <form action="index.php?type=Commun&action=AjouterRegle" method="post">
            <div id="FormajoutRegle">
                <p class="chapeau mt-5 mb-5">La regle à ajouter : <input type="text" size="50" name="regle" id="reglejout" /></p>
                <p class="chapeau mt-5 mb-5">Un commentaire ? <input type="text" size="50" name="commentaire" /></p>
                <p class="text-center"><a href="#" id="ValideajoutRegle">Valider</a></p>
            </div>
            <div id="ConfirmeajoutRgle" style="display:none;"><div id="ConfirmeajoutRgle2"></div><p><a href="#" id="AnnuleajoutRegle" class="mr-5">Annuler</a> - <input type="submit" value="confirmer">
        </form></article>';
        return $resultat;
    }

    public function AjouterCategorie($res){
        $resultat='<article class="col-6 offset-3" id="Ajoutcat">
        <h1>Ajouter une catégorie à '.$res[0]['regle'].'</h1>
        <form action="index.php?type=Commun&action=AjouterCategorie" method="post">
            <div id="Formajoutcat">
                <input type="hidden" name="id_regle" value="'.$_SESSION['commun']['regle'].'" />
                <p class="chapeau mt-5 mb-5">La categorie à ajouter : <input type="text" size="50" name="categorie" id="catjout" /></p>
                <p class="chapeau mt-5 mb-5">Un commentaire ? <input type="text" size="50" name="commentaire" /></p>
                <p class="text-center"><a href="#" id="Valideajoutcat">Valider</a></p>
            </div>
            <div id="ConfirmeajoutCat" style="display:none;"><div id="ConfirmeajoutCat2"></div><p><a href="#" id="AnnuleajoutCat" class="mr-5">Annuler</a> - <input type="submit" value="confirmer">
        </form></article>';
        return $resultat;
    }

    public function AfficheApresCategorie($res){
        $resultat='<article class="col-12">
            <p class="text-center">'.$res['contenu'].'</p>
            <p class="chapeau">Je te conseille FORTEMENT de Préparer au Moins un Formulaire ET un Questionnaire!!!!</p>
            <p> Apres ce que j\'en dis c\'est poutr toi!!!</p>';
        return $resultat;
    }

    public function afficheConc($res){
        $resultat='<section class="container"><div class="row"><article class="col-6 offset-3"><h1>'.$res.'</h1>'
                . '<p class="mt-5 text-center"><a href="index.php?type=Commun&action=LaReglementation">Retour</a></p>'
                . '</article></div></section>';
        return $resultat;
    }
}
