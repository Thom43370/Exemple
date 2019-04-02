<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Question_view
 *
 * @author Thomas
 */
class Question_view
{
    public function __construct()
    {
    }

    public function AfficheNomQuestionnaire(){
        $lettre=array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', );
        //printr($_SESSION);
        
         $resultat= '<section class="container" id="AffichTitres">
            <div class="row">
                <div class="col-12 text-center" style="display:none; z-index:2;" id="AfficheFormulaireAjoutTitre">
                    <div id="AfficheFormulaireAjoutTitre2">
                        
                    </div>
                    <p class="text-center"><a href="javascript:void(0);" class="mr-5" id="AnnuleAjoutTitre">Annuler</a> - <a href="#" class="ml-5" id="ConfirmeAjoutTitre">Ajouter</a></p>
                </div>
                <article class="col-12" id="ChoixTitre">
                    <h1 class="text-center mb-5">LE CHOIX DES TITRES DU QUESTIONNAIRE '.strtoupper($_SESSION['quest']['nomregle']).'</h1>
                    <form action="index.php?type=Question&action=AjouterQuestionnaire" method="post">
                    <p class="text-center"><strong>Le nom du questionnaire de regle : <input type="text" value="" id="nom" name="nom" size="50" /></strong></p>
                    <p>Un commentaire ? : <input type="text" value="" id="commentaire" name="commentaire" size="50" /></p>
                    ';
            foreach($lettre as $val=>$i){
                if ($val >= '6') {
                    $resultat .= '<p class="mt-5 mb-5 ml-5" style="display:none;" id="ligne'.$val. '"><strong>Le titre de ' . $i . ' : <span id="affichetitre'.$i. '" style="display:none;"><span id="affichetitre2' . $i . '" class="affichetititreContenu" alt="' . $i . '"></span> - <a href="javascript:void(0);" class="modif" id="'.$i.'" alt="">Modifier</a></span><select class="titreselect" name = "titre-' . $i . '" alt="' . $i . '" id="titre-' . $i . '" >';
                    
                } else {
                    $resultat .= '<p class="mt-5 mb-5 ml-5"><strong>Le titre de ' . $i . ' : <span id="affichetitre' . $i . '" style="display:none;"><span id="affichetitre2' . $i . '" class="affichetititreContenu" alt="'.$i.'"></span> - <a href="javascript:void(0);" class="modif" id="' . $i . '" alt="">Modifier</a></span><select class="titreselect" name = "titre-' . $i . '" alt="' . $i . '" id="titre-' . $i . '" >';
                }
                
                $resultat .= '</select></strong></p>';
                $resultat .= '<div id="lesquestions' . $i . '" class="aveugle">';
                for ($a = 1; $a <= 30; $a++) {
                    if($a>15){
                        $resultat .= '<p class="mt-3 mb-3 aveugle" id="lign'.$i.$a.'">La question ' . $i . '-' . $a . ' : <span class="aveugle" id="affichequestion' . $i . $a . '"><span id="affichequestion2' . $i . $a . '" alt="' . $i . $a . '" class="questionContenu'.$i.'" title="'.$i.'"></span></span><select class="questionsel questionselect' . $i . '" name="question-' . $i . $a . '" id="question-' . $i . $a . '" alt="' . $i . $a . '" title="' . $i . '"></select></p>';
                    }else{
                    $resultat .= '<p class="mt-3 mb-3">La question ' . $i . '-' . $a . ' : <span class="aveugle" id="affichequestion' . $i . $a . '"><span id="affichequestion2' . $i . $a . '" alt="' . $i . $a . '" class="questionContenu'.$i.'" title="'.$i.'"></span> - <a href="javascript:void(0);" class="modifquest" id="'.$i.$a.'" alt="">Modifier</a></span><select class="questionsel questionselect' . $i . '" name="question-' . $i . $a . '" id="question-' . $i . $a . '" alt="' . $i . $a . '" title="' . $i . '"></select></p>';
                    }
                }
                $resultat .= '<p class="mt-5 mb-5 text-center"><strong><a href="javascript:void(0)" id="Afficherquestions'.$i.'" class="affplusquest mr-5 pr-5" alt="'.$i.'">Afficher plus de questions ( '.$i. '-16 à ' . $i . '-30 )</a> - <a href="javascript:void(0)" id="Ajouterquestions'.$i.'" class="ml-5 pl-5 ajquest" alt="'.$i. '" title="">Ajouter une question à la liste</a></strong></p>
                            <div style="display:none;" class="aveugle AfficheFormquestion" id="AfficheFormquestion'.$i. '">
                                <p class="text-center"><strong>AJOUTER UNE QUESTION A '.$i.'</strong></p>
                                <div id="AfficheFormquestion2' . $i . '"></div>
                                <p class="mt-5 mb-5 text-center"><strong><a href="javascript:void(0)" id="AnnuleAfficherquestions'.$i.'" class="mr-5 pr-5 annuleform" alt="'.$i.'">Annuler</a> - <a href="javascript:void(0)" id="ValideAjouterquestions" alt="'.$i.'" class="ml-5 validationquest">Valider </a></strong></p>
                            </div>
                        </div>';
            }
            
        $resultat.= '    <p class="mt-5"><a href="javascript:void(0);" id="Afficheplusdetitres" alt="6">Afficher plus de titre</a>
                    <p class="mt-5 mb-5 text-right"><strong><a href="javascript:void(0);" id="Ajouteruntitre"> Ajouter un Titre </a></strong></p>
                    <p class="mt-5 mb-5 text-center"><strong><a href="#" id="ValidationFormulaire">Valider</a></strong></p>
                </article>
                <div class="col-12 aveugle" id="ConfirmationFormulaire">
                    <p>
                    <div id="ContenuForm"></div>
                    <p class="mt-5 mb-5 text-center"><a href="#" id="Correction" class="mr-5 pr-5">Corriger</a> - <input type="submit" class="ml-5" value=" Confirmer "  /></p>
                        </form>
                
                
            </div>
        </section>';
        return $resultat;
    }

    public function Conclusion($res){
        //printr($res);
        if($res==null){
            $res='Tout est ok';
        }
        $resultat= '<p class="text-center mt-5 mb-5">'.$res.'</p>';
        return $resultat;
    }
}