<?php
session_start();
include('../fonction/fonction.php');
include_once('../class/controleur.php');
include_once('../class/Questionnaire/Questionnaire.php');
include_once('../class/Affichage/Affichage.php');
include_once('../class/Manager/Manager.php');
include_once('../class/Manager/Manager_manager.php');


    //header('Content-Type: application/json');
    //print_r($_POST);
if ($_POST != null) {
    $quest = new Controleur('Questionnaire', 'AjouterTitre', $_POST['titre']);
    $data = $quest->exec();
    echo '{"select":' . json_encode($data) . '}';
} else {
    echo '<p>Un ou plusieurs parametre(s) non renseigné(s)</p>';
}