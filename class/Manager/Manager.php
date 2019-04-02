<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Commun_manager
 *
 * @author Thomas
 */
class Manager {
    private $db;
    private $manager;
    
    public function __construct(){
        $this->db= new PDO('mysql:host=127.0.0.1:3307;dbname=demo;Charset=UTF8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->manager=new Manager_manager($this->db);
    }


##### RECUPERATION DES INFOS ########## RECUPERATION DES INFOS ########## RECUPERATION DES INFOS ########## RECUPERATION DES INFOS ########## RECUPERATION DES INFOS ########## RECUPERATION DES INFOS ########## RECUPERATION DES INFOS ########## RECUPERATION DES INFOS #####


    #Recuperer donnees
    #$bdd=base de donnees
    #$item=item ou tableau d'items:
    #$Org= ORDER BY ou autres
    #   $item['item']['id']=1
    #   $item['item']['nom']=les vgp faciles....
    #$Org['type']='ORDER BY';
    #$Org['item']=item;
    public function RecupereDonnees($bdd, $item=null, $org=null){
        //printr($item);
        if($item!=null){
            $res=$this->manager->RecupereDonneesWhere($bdd, $item, $org);
        }else{
            $res=$this->manager->RecupereDonneesSimple($bdd, $org);
        }
        return $res;
    }

    #$bdd['condition]=array('nomclass'=>nomdelatableprincipale, conditionitem1=>'lenomdel\'item1', 'conditionvalue1'=>'lavaleurdel\'item1',[...] 'conditiontype2'=>'OR ou AND');
    # OU $bdd['condition']=array('nomclass'=>'vgp','conditionitem'=>'relanceactive', 'conditionvalue'=>'ok');
    #$bdd['bdd1']=array('nomclass'=>'vgp', 'bdd'=>'matcli', 'item'=>'id', 'itemvalue'=>'id_matcli');
    
    public function RecupereDonneesComplexes($bdd){
        /*$bdd['condition']=array('nomclass'=>'vgp','conditionitem'=>'relanceactive', 'conditionvalue'=>'ok') ou alors attention les yeux: 
                $bdd['condition']=array('nomclass'=>'vgp','conditionitem1'=>'relanceactive', 'conditionvalue1'=>'ok','conditionitem2'=>'_d_formulaire, 'conditionvalue2'=>$_SESSION['formulaire'], 'conditiontype2'=>'OR' )
        $bdd['bdd1']=array('nomclass'=>'vgp', 'bdd'=>'matcli', 'item'=>'id', 'itemvalue'=>'id_matcli');
        $bdd['bdd2']=array('nomclass'=>'matcli', 'bdd'=>'modele', 'item'=>'id', 'itemvalue'=>'id_modele');
        $bdd['bdd3']=array('nomclass'=>'modele', 'bdd'=>'marque', 'item'=>'id', 'itemvalue'=>'id_marque');
        $bdd['bdd4']=array('nomclass'=>'matcli', 'bdd'=>'clients2', 'item'=>'id', 'itemvalue'=>'id_clients');
        $bdd['bdd5']=array('nomclass'=>'modele', 'bdd'=>'nrj', 'item'=>'id', 'itemvalue'=>'id_nrj');
        $bdd['bdd6']=array('nomclass'=>'modele', 'bdd'=>'reglementation2', 'item'=>'id', 'itemvalue'=>'id_reglementation');
        $bdd['bdd7']=array('nomclass'=>'reglementation2', 'bdd'=>'regle', 'item'=>'id', 'itemvalue'=>'id_regle');*/
        //printr($bdd);
        $requete1='';
        $inner='';
        $requete2='';
        $bindP=array();
        foreach($bdd as $numbdd=>$value2){
            if($numbdd=='condition'){
                if(!isset($value['conditionitem1'])){
                    $requete1.='SELECT * FROM '.$value2['nomclass'];
                    if(isset($value2['conditionitem'])){
                        $requete2.=' WHERE `'.$value2['nomclass'].'`.`'.$value2['conditionitem'].'`=:condition';
                        $bindP[':condition']=$value2['conditionvalue'];
                        //printr($requete2);
                    }
                }else{
                    $i=1;
                    $requete2.=' WHERE';
                    $requete1.='SELECT * FROM '.$value2['nomclass'];
                    foreach($bdd['condition'] as $key=>$value){
                        //printr($key.'='.$value);
                        if($key!='nomclass' && $key!='conditiontype'.$i && isset($bdd['condition']['conditionvalue'.$i])){
                            if($i>1 && isset($bdd['condition']['conditiontype'.$i])){
                                $requete2.=' '.$bdd['condition']['conditiontype'.$i];    
                            }
                            $requete2.=' `'.$bdd['condition']['conditionitem'.$i].'`=:condition'.$i;
                            
                            $bindP[':condition'.$i]=$bdd['condition']['conditionvalue'.$i];
                            $i++;
                        }
                    }
                }
            }else{
                $inner.=' INNER JOIN `'.$value2['bdd'].'` ON `'.$value2['bdd'].'`.`'.$value2['item'].'`=`'.$value2['nomclass'].'`.`'.$value2['itemvalue'].'`';
            }
        }
        //printr(/*$requete1.$inner.*/$requete2);//.$bindP);
        $res=$this->manager->RecupereDonneesComplexes($requete1, $inner, $requete2, $bindP);
        return $res;
    }


##### AJOUT DE DONNEES ########## AJOUT DE DONNEES ########## AJOUT DE DONNEES ########## AJOUT DE DONNEES ########## AJOUT DE DONNEES ########## AJOUT DE DONNEES ########## AJOUT DE DONNEES ########## AJOUT DE DONNEES ########## AJOUT DE DONNEES ########## AJOUT DE DONNEES #####
    private function isJSON($string){
        return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
     }

    #$bdd:nom de la bdd
    #foreach
    #$values['nom de l\'item']=la value
    public function Ajouter($bdd, $values){
        foreach($values as $key=>$value){
            if($this->isJSON($value)==false){
                $item['item'][$key]=$value;
            }
            
        }
        $verif=$this->manager->RecupereDonneesWhere($bdd, $item);
        if(!$verif){
            $requete1='(';
            $requete2='(';
            $bindP=array();
            $i=0;
            foreach($values as $item=>$value){
                if($i>0){
                    $requete1.=', `'.$item.'`';
                    $requete2.=', :'.$item;
                    if($this->isJSON($value)==false){
                        $bindP[':'.$item]=htmlentities($value);
                    }else{
                        $bindP[':'.$item]=$value;
                    }
                }else{
                    $requete1.='`'.$item.'`';
                    $requete2.=':'.$item;
                    if($this->isJSON($value)==false){
                        $bindP[':'.$item]=htmlentities($value);
                    }else{
                        $bindP[':'.$item]=$value;
                    }
                }
                $i++;
            }
            $requete1.=')';
            $requete2.=')';
            //printr($requete1.$requete2.'---<br />');
            //printr($bindP);
            $res=$this->manager->Ajouter($bdd, $requete1, $requete2, $bindP);
            if($res==false){
                $ret['resultat']=false;
                $ret['contenu']='<p>Un probleme est survenu lors de l\'enregistrement</p>';
            }else{
                $ret['resultat']=$res;
                $ret['contenu']='<p>Tout est OK</p>';
            }
        }else{
            $ret['resultat']=false;
            $ret['contenu']='<p>La nouvelle donnée existe déjà dans le système!!</p>';
        }
        return $ret;
    }


##### MODIFICATION DE DONNEES ######### MODIFICATION DE DONNEES ######### MODIFICATION DE DONNEES ######### MODIFICATION DE DONNEES ######### MODIFICATION DE DONNEES ######### MODIFICATION DE DONNEES ######### MODIFICATION DE DONNEES ######### MODIFICATION DE DONNEES ######### MODIFICATION DE DONNEES ######### MODIFICATION DE DONNEES ####
    # Obligé de boucler pour modifier differents champs
    # Modifier($bdd, $key, $values, $itemcondition ,$valeurcondition)
    # $req=$this->db->prepare('UPDATE `'.$bdd.'` SET `'.$key.'`='.$key2.' WHERE `'.$itemcondition.'`=:'.$itemcondition);
    public function Modifier($bdd, $key, $values, $itemcondition ,$valeurcondition){
        $this->manager->Modifier($bdd, $key, $values, $itemcondition ,$valeurcondition);
    }

##### SUPPRESSION DE DONNEES ######### SUPPRESSION DE DONNEES ######### SUPPRESSION DE DONNEES ######### SUPPRESSION DE DONNEES ######### SUPPRESSION DE DONNEES ######### SUPPRESSION DE DONNEES ######### SUPPRESSION DE DONNEES ######### SUPPRESSION DE DONNEES ######### SUPPRESSION DE DONNEES ######### SUPPRESSION DE DONNEES ####


}