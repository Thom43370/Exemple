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
class Question
{
    private $manager;
    private $view;

    public function __construct($db)
    {
        $this->manager = $db;
        $this->view = new Question_view();
    }

    public function index()
    {
        //printr($_SESSION);
        //printr($_POST);
        if(isset($_POST['reglementation'])){
            $_SESSION['quest']['categorie']=$_POST['reglementation'];
            $bdd['condition']=array('nomclass'=>'categorie', 'conditionitem'=>'id', 'conditionvalue'=>$_SESSION['quest']['categorie']);
            $bdd['bdd1']=array('nomclass'=>'categorie', 'bdd'=>'regle', 'item'=>'id', 'itemvalue'=>'id_regle');
            $res=$this->manager->RecupereDonneesComplexes($bdd);
            $_SESSION['quest']['regle']=$res[0]['id_regle'];
            $_SESSION['quest']['nomregle']=$res[0]['regle'];
            //printr($res);
        }
        return $this->view->AfficheNomQuestionnaire();
    }    

    public function AjouterQuestionnaire(){
        //printr($_POST);
        $donnees=array();
        $data=array();
        $lettre='A';
        foreach($_POST as $key=>$value){
            if($value!=null && $key!='nom'){
                $pan=explode('-', $key);
                //printr($pan);
                if($pan[0]=='titre'){
                    $lettre=$pan[1];
                }
                $data[$lettre][$key]=$value;        
            }elseif($key=='nom'){
                $donnees['nom']=htmlentities($_POST['nom']);
            }
        }
        $donnees['id_regle']=$_SESSION['quest']['regle'];
        $donnees['questions']=json_encode($data);
        //printr($donnees);
        $res['resultat']=$this->manager->Ajouter('questionnaire', $donnees);
        return $res;

    }
}