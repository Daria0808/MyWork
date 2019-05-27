<?php
include("../../../blocks/db.php");
mysql_query('SET NAMES utf8');

include("../../../blocks/lock.php");


if((isset($_POST['OtlOtvet']))&&(isset($_POST['WellOtvet']))&&(isset($_POST['YdOtvet']))&&(isset($_POST['idTestNext'])))
{
	$id=$_POST['idTestNext'];

     $zaprosCheck=mysql_query("SELECT * FROM admin_test WHERE id='$id' AND nickname='$loginCo'", $db);
     $rezZaprosCheck=mysql_fetch_array($zaprosCheck);
            if($rezZaprosCheck!='')
            {
            	$OtlPokaz=$_POST['OtlOtvet'];
            	$WellPokaz=$_POST['WellOtvet'];
            	$YdPokaz=$_POST['YdOtvet'];

                $dobavliem=mysql_query("UPDATE admin_test SET OtlPokazatel='$OtlPokaz', WellPokazatel='$WellPokaz', YdPokazatel='$YdPokaz' WHERE id='$id'");
            	if($dobavliem==1)
            	{
            		$otvet='OK';
            	}
            	else
            	{
            		$otvet='ERROR';
            	}
            }
            else
            {
                $otvet='ERROR';
            }

}

echo $otvet;
?>