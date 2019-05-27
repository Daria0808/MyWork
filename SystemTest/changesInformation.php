<?php

include("../../../blocks/db.php");
mysql_query('SET NAMES utf8');

include("../../../blocks/lock.php");

include("../../../blocks/CleanerPole.php");


		$idTestCome=$_POST['IdTestChange'];
		$idTest=cleanerForm($idTestCome);

         $Danstranichka=mysql_query("SELECT * FROM admin_test WHERE id='$idTest' AND nickname='$loginCo'", $db);
            $Vvodim=mysql_fetch_array($Danstranichka);
            if($Vvodim=='')
            {
              $NoProverka=0;
            }
            else
            {
                $NoProverka=1;
            }
   if($NoProverka==1)
   {
		if((isset($_POST['IdTestChange']))&&(isset($_POST['NewNTest']))&&(isset($_POST['NewKom'])))
		{
			$newNameCome=$_POST['NewNTest'];
			$newName=cleanerForm($newNameCome);

			$newKommentCome=$_POST['NewKom'];
			$newKomment=cleanerForm($newKommentCome);


    			if($newName!='')
    			{
    			    $dobavitIzmTest=mysql_query("UPDATE admin_test SET nameTest='$NewNamTest', comment='$NewCom' WHERE id='$id'");
    			    if($dobavitIzmTest==1)
    			    {
    			        echo "OK";
    			    }
    			    else
    			    {
    			       echo "NO";
    			    }
			
    			}

		}   	
   }
   else
   {
   	echo "NO";
   }
		


?>