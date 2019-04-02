<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AjoutQuestion
 *
 * @author Thomas
 */
class Questionnaire
{
    private $manager;

    public function __construct($db)
    {
        $this->manager = $db;
    }

    public function AjouterTitre($titre){
        $titre=htmlentities($titre);
        $titre2= strtoupper($titre);
        $values['titre']=$titre2;
        $res=$this->manager-> Ajouter('titre', $values);
        if($res!=true){
            $ret['contenu']= $titre2.' n\'a Pas été enregistré';
        }else{
            $ret['contenu']= $titre2.' a bien été enregistré';
        }
        $ret['exception']=true;
        return $ret;
    }

    public function Recupere(){
        $Org=array();
        $Org['type']='ORDER BY';
        $Org['item']='titre ' ;
        $res['contenu'] = $this->manager->RecupereDonnees('titre', null, $Org);
        $res['exception']=true;
        //printr($res);
        return $res;
    }

    public function AjouterQuestion($param){
        if(isset($param[1]) && $param[1]!=null){
            $question=htmlentities( $param[1]);
            $question= strtolower($question);
            $question=ucfirst($question);
        }else{
            $res='une erreur est apparue lors de la tentative d\'enregistrement';
            return $res;
        }
        if(isset($param[2]) && $param[2]!=null){
            $values['id_titre']=$param[0];
            $values['question']= $question;
            $values[ 'verif']= $param[2];
            //printr($values);
            $res=$this->manager-> Ajouter('question', $values);
            if($res){
                $res['contenu']='Enregistré';
            }else{
                $res['contenu']='un probleme est survenu';
            }
        }else{
            $res['contenu']='une erreur est apparue lors de la tentative d\'enregistrement';
        }
        //printr($question. ' - '.$idtitre);
        $res['exception']=true;
        return $res;
    }

    public function RecupereQuestion($idtitre){
        //printr($idtitre);
        $Org=array(); 
        $Org['type']='ORDER BY' ;
        $Org['item']='question' ; 
        $item=array();
        $item['item']['id_titre']=$idtitre;
        $res['contenu'] = $this->manager->RecupereDonnees('question', $item, $Org);
        $res['exception']=true;
        //printr($res);
        return $res;
    }

}