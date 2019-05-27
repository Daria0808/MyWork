<?php

include("blocks/db.php");
  include("blocks/lock.php");

	if (isset($_GET["MyPerkl"])){

		$poluch=$_GET['MyPerkl'];
		$izm=$_GET['NumTestAdd'];
            $dobavliem=mysql_query("UPDATE admin_test SET activTest='$poluch' WHERE nickname='$loginCo' AND id='$izm'");
		}
?>
