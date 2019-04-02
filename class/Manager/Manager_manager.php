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
class Manager_manager {
    private $db;
    
    public function __construct(PDO $db){
        $this->db=$db;
    }

    public function RecupereDonneesSimple($bdd, $org=null){
        if($org!=null){
            $req=$this->db->prepare('SELECT * FROM `'.$bdd.'` '.$org['type'].' '.$org['item']);
        }else{
            $req=$this->db->prepare('SELECT * FROM `'.$bdd.'`');
        }
        
        $req->execute();
        $res=$req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function RecupereDonneesWhere($bdd, $item, $org=null){
        $req2='';
        $i=0;
        foreach($item['item'] as $key=>$value){
            if($i>0){
                $req2.=' AND ';
            }
            $req2.=$key.'=:'.$key;
            $i++;
        }
        //printr($req2);
        if($org!=null){
            $req=$this->db->prepare('SELECT * FROM `'.$bdd.'` WHERE '.$req2.' '.$org['type'].' '.$org['item']);
        }else{
            $req=$this->db->prepare('SELECT * FROM `'.$bdd.'` WHERE '.$req2);
        }
        
        foreach($item['item'] as $key=>$value){
            $req->bindValue(':'.$key, $value);
        }
        //printr($req);
        $req->execute();
        $res=$req->fetchAll(PDO::FETCH_ASSOC);
        //printr($res);
        return $res;
    }

     #Recupere les données sur plusieurs tables
     public function RecupereDonneesComplexes($requete1, $inner, $requete2, $bindP){
        //printr( $requete2);
        $req=$this->db->prepare($requete1. ' '.$inner.$requete2);
        foreach($bindP as $key=>$value){
            $req->bindValue($key, $value);
        }
        $req->execute();
        $res=$req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function Ajouter($bdd, $requete1, $requete2, $values){
        $i=1;
        $req=$this->db->prepare('INSERT INTO `'.$bdd.'`'.$requete1.' VALUES'.$requete2);
        $res2=$req->execute($values);
        if($res2){
            return $this->db->lastInsertId();
        }else{
            return false;
        }
    }

    public function Modifier($bdd, $key, $values, $itemcondition ,$valeurcondition){
        if($key!=$itemcondition){
            $key2=':'.$key;
            $req=$this->db->prepare('UPDATE `'.$bdd.'` SET `'.$key.'`='.$key2.' WHERE `'.$itemcondition.'`=:'.$itemcondition);
           // printr($key2.' - '.$values );
            $req->bindParam($key2, $values);
            $req->bindValue(':'.$itemcondition, $valeurcondition);
            $req->execute();
        }
    }
}