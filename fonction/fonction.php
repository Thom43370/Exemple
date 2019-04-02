<?php
/*function __autoload($classname){
    $filename='class/'.$classname.'.php';
    include_once $filename;
    echo $filename;
}
*/function __autoload($nomclass){
    if($nomclass=='controleur'){
        $file='class/'.$nomclass.'.php';
    }else{
        $boum=explode('_', $nomclass);
        if(isset($boum[1])){
            $classe=$boum[0].'/'.$nomclass;
        }else{
            $classe=$nomclass.'/'.$nomclass;
        }   
        $file='class/'.$classe.'.php';
    }
    include_once $file;
   // echo $file;
}
function printr($tablo){
    echo'<br/><br /><br /><pre>';
    print_r($tablo);
    echo'</pre>';
}

function redir($url)
	{
  	echo '<script language="javascript">';
  	echo 'window.location="',$url,'";';
  	echo '</script>';
	}