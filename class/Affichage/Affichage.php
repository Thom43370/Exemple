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
class Affichage {
    private $deb;
    private $fin;
    private $exception;
    
    public function __construct($exception=null){
        $this->fin='</div></section>';
        $this->exception=$exception;
    }

    public function Affiche($res){
        if($this->exception==null){
            if(isset($res['Affichage'])){
                 $this->deb='<section   class="container-fluid"><div class="row">';
                $contenu=$res['contenu'];
            }elseif(isset($res['resultat'])){
                 $this->deb='<section class="container text-center"><div class="row">';
                $contenu=$this->Conclusion($res['resultat']);
            }else{
                  $this->deb='<section class="container"><div class="row">';
                $contenu=$res;
              }
            return $this->deb.$contenu. $this->fin ;    
        }else{
            return $res;
        }
        
    }

    private function Conclusion($res){
        //printr($res);
        return $res['contenu'];
    }
}