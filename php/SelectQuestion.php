<?php
session_start();
include('../fonction/fonction.php');
include_once('../class/controleur.php');
include_once('../class/Questionnaire/Questionnaire.php');
include_once('../class/Affichage/Affichage.php');
include_once('../class/Manager/Manager.php');
include_once('../class/Manager/Manager_manager.php');

//printr($_GET);
$quest = new Controleur('Questionnaire', 'RecupereQuestion', $_GET['id']);
$data = $quest->exec();
echo '{"select":' . json_encode($data) . '}';