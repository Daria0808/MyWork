<?php
include("../../../blocks/db.php");
include("../../../blocks/lock.php");

header("Content-Type:" . "text/html; charset=utf8");


	if (isset($_POST["MyPerkl"]))
	{
	    $id=$_POST['NumTestAdd'];
            $Danstranichka=mysql_query("SELECT * FROM admin_test WHERE id='$id' AND nickname='$loginCo'", $db);
            $Vvodim=mysql_fetch_array($Danstranichka);
            if($Vvodim!='')
            {
				$poluch=$_POST['MyPerkl'];
				$izm=$_POST['NumTestAdd'];
		         $dobavliem=mysql_query("UPDATE admin_test SET activTest='$poluch' WHERE nickname='$loginCo' AND id='$izm'");  
		         if($dobavliem==1)
		         {
		             $otvet='OK';
		         }
		         else
		         {
		              $otvet='ERROR12';
		         }
            }

        
	}
	else
	{
	     $otvet='ERROR';

	}
	echo "$otvet";
?>