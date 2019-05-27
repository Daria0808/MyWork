<?php
  include("../blocks/db.php");
    include("../blocks/lock.php");

header("Content-Type:" . "text/html; charset=utf8");


    // Отвечат за удаление одного вопроса - не уходя со страницы  test_id.php
                if(isset($_POST["NumberDeleQuestion"]))
                    {
                    	$IdVop=$_POST['NumberDeleQuestion'];

              $zaprosCheakPolz=mysql_query("SELECT numberTest FROM question WHERE id='$IdVop'");
              $rezZaprosCheakPolz=mysql_fetch_array($zaprosCheakPolz);

              $numberTest=$rezZaprosCheakPolz['numberTest'];



		            $zaprosPolz=mysql_query("SELECT * FROM admin_test WHERE nickname='$loginCo' AND id='$numberTest'", $db);
		            $rezZaprosPolz=mysql_fetch_array($zaprosPolz);
		           	 if($rezZaprosPolz!='')
		           	 {
		                $ydVopr=mysql_query("DELETE FROM question WHERE id='$IdVop'");
		                $ydVarOtv=mysql_query("DELETE FROM variant_otv WHERE id_questions='$IdVop'");
		                echo "OK";
		           	 }
		           	 else
		           	 {
		           	 	echo "ERROR";
		           	 }


             }
             
		
?>