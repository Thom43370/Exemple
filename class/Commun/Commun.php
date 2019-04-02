<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Commun
 *
 * @author Thomas
 */
class Commun {
    private $manager;
    private $view;
    
    public function __construct($db) {
        $this->manager=$db;
        $this->view=new Commun_view();
    }
    public function Laregle($param=null, $page=null){
        unset($_SESSION['prep']);
        if(isset($_SESSION['prep'])){
            session_destroy($_SESSION['prep']);
            unset($_SESSION['prep']);
        }
        $res=$this->manager->RecupereDonnees('regle');
        if($param=='AjouterCat'){
            printr($param);
            return $this->view->AfficherRegle($res);
        }else{
            return $this->view->AfficherRegle($res, $param, $page);
        }
    }
    public function LaReglementation($param, $page){
        //printr($_POST);
        if(isset($_POST['regle2']) && $_POST['regle2']!=null){
            $_SESSION['prep']['regle']=$_POST['regle2'];
        }
        /*$bdd['condition']=array('nomclass'=>'bcf43regle','conditionitem'=>'id', 'conditionvalue'=>$_SESSION['prep']['regle']);
        $bdd['bdd1']=array('nomclass'=> 'bcf43regle', 'bdd'=> 'bcf43categorie', 'item'=>'id', 'itemvalue'=>'id_regle');*/
        $item=array();
        $item['item']['id_regle']=$_SESSION['prep']['regle'];
        $res=$this->manager-> RecupereDonnees('categorie', $item);
        //printr($res);
        //$res=$this->manager->RecupererReglementation();
        //$_SESSION['prep']['categorie']=$res['regle'];
        
        //printr($res);
        return $this->view->AfficherReglementation($res, $param, $page);
    }
    

    public function AjouterRegle(){
        if(isset($_POST['regle']) && $_POST['regle']!=null){
            $values=array();
            $regle=htmlentities($_POST['regle']);
            $regle=strtoupper($regle);
            $values['regle']=$regle;
            
            if($_POST['commentaire']!= null){
                $values['commentaire']=htmlentities($_POST['commentaire']);
            }
            $res=$this->manager->Ajouter('regle', $values);
            $_SESSION['commun']['regle']=$res['resultat'];
            redir('index.php?type=Commun&action=AjouterCategorie');
            
        }else{
            return $this->view->AjouterRegle();
        }
    }

    public function AjouterCategorie(){
        if(isset($_POST['categorie']) && $_POST['categorie']!=null){
            $values=array();
            $regle=htmlentities($_POST['categorie']);
            $regle=strtoupper($regle);
            $values['categorie']=$regle;
            if($_POST['commentaire']!= null){
                $values['commentaire']=htmlentities($_POST['commentaire']);
            }
            $res=$this->manager->Ajouter('categorie', $values);
            return $this->view->AfficheApresCategorie($res);

        }else{
            $item['item']['id']=$_SESSION['prep']['regle'];
            $res=$this->manager->RecupereDonnees('regle', $item);
            return $this->view->AjouterCategorie($res);
        }
    }
}
