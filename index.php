<!DOCTYPE html>
<?php
session_start();
include 'fonction/fonction.php';
    if (isset($_GET['type']) && isset($_GET['action'])) {
        if (isset($_GET['param']) && isset($_GET['page'])) {
            $controleur = new controleur($_GET['type'], $_GET['action'], $_GET['param'], $_GET['page']);
        } elseif (isset($_GET['param'])) {
            $controleur = new controleur($_GET['type'], $_GET['action'], $_GET['param']);
        } else {
            $controleur = new controleur($_GET['type'], $_GET['action']);
        }
    }else{
        $controleur = new controleur('Commun', 'Laregle', 'Question', 'index');
    }
    //echo $contenu['contenu'];
    ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="pragma" content="no-cache" /> 
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <title>
        <?php echo $contenu['titre']; 
        header("Cache-Control:no-cache"); ?>
    </title>
    
    <link href="https://fonts.googleapis.com/css?family=Lato|Questrial|Raleway" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/custom2.css" rel="stylesheet" type="text/css" />
    
    
</head>

<body>
    <header class="container_fluid">
        <div class="row">
            <div class="col-4 col-sm-2 text-center logo">
                <a href="index.php"><img src="img/logo2.png" alt="" width="100" /></a>
            </div>
            <div class="col-8 col-sm-8 container">
                <ul class="row">
                    <li class="col-4">le menu1</li>
                    <li class="col-4">le menu2</li>
                </ul>
            </div>
        </div>
    </header><br /><br /><br /><br />
    <?php
            //printr($_SESSION);
    $controleur->exec('Commun', 'index');
?>
<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="js/question.js" type="text/javascript"></script>
<script src="js/nvellequestion.js" type="text/javascript"></script>
<script src="js/upload.js" type="text/javascript"></script>
<script>
    $( function() {$( ".datepicker" ).datepicker();} );
    $(function() {

$.datepicker.setDefaults($.datepicker.regional['fr']);
});
</script>
</body>


</html> 