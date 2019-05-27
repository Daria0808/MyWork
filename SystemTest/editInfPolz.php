<?php

include("blocks/db.php");
include("blocks/lock.php");
  include("blocks/CleanerPole.php");

if(isset($_POST['oldpas']))
{
   $starpa= $_POST['oldpas'];

   $zaprosBD=mysql_query("SELECT pass FROM userlist WHERE user='$loginCo'");
   $rezZaprosBD=mysql_fetch_array($zaprosBD);

   $passCo=$rezZaprosBD['pass'];
   

    $NewPassProv=$_POST['newpas'];
    $NewPassProvTwo=$_POST['newpasTwo'];

    $NewPassProv = stripslashes($NewPassProv);
        	$NewPassProv=cleanerFormComment($NewPassProv);

    // $NewPassProv = htmlspecialchars($NewPassProv);
    // $NewPassProv = trim($NewPassProv);

    $NewPassProvTwo = stripslashes($NewPassProvTwo);
    // $NewPassProvTwo = htmlspecialchars($NewPassProvTwo);
    // $NewPassProvTwo = trim($NewPassProvTwo);

    	$NewPassProvTwo=cleanerFormComment($NewPassProvTwo);

    if($starpa==$passCo)
    {
        if($NewPassProv==$NewPassProvTwo)
        {
          $ispravl=mysql_query("UPDATE userlist SET pass='$NewPassProv' WHERE user='$loginCo'");
            if($ispravl==1)
            {
                $otvetServer="1";
            }

        }
        else
        {
             // Пароли не совпали
        	  $otvetServer="0";
        }
    }
    else
    {
        // Неверно введён пароль
         $otvetServer="Er";
    }
            echo $otvetServer;

}


?>