<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controleur
 *
 * @author Thomas
 */
class controleur {
    //put your code here
    private $action;
    private $type;
    private $view;
    private $param;
    private $page;
    private $manager;
    
    public function __construct($type, $action, $param=null, $page=null){
        $this->type=$type;
        $this->manager=new Manager();
        $this->action=$action;
        $this->param=$param;
        $this->page=$page;
        $this->affichage=new Affichage(); 
    }

    public function exec(){
        if(isset($this->type)){
            $object=new $this->type($this->manager);
            $action=$this->action;
            $res=$object->$action($this->param, $this->page);
            if(isset($res['exception'])){
                return $res['contenu'];
            }else{
                $this->view=$this->affichage->Affiche($res);
                echo $this->view;
            }
        }
    }
}
