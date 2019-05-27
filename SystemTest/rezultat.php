<?php include("blocks/db.php");
mysql_query('SET NAMES utf8');
  
if(isset($_GET['id']))
 {$id=$_GET['id'];}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <meta charset="utf-8">
    <title>Тестирование</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="jquery.js"></script>
    <script type="text/javascript" language='javascript' src="script.js"></script>
    <script src="script.responsive.js"></script>

</head>
<body>
<div id="art-main">
    <div class="art-sheet clearfix">

<div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content dopl"><article class="art-post art-article">
<!--                                 <h2 class="art-postheader">Тестирование</h2>
 -->                                                
                <div class="art-postcontent art-postcontent-0 clearfix">

        <?php
        $id_tests=$_POST['id_test'];


$flag=$_POST['VtFlag'];
            $polzovatel=$_POST['polz'];

            $PrDate=$_POST['PrDate'];

            $Vrtime=$_POST['Vtime'];
            $TimeProx=$_POST['PrTime'];


            if(isset($_POST['cheak']))
            {
                $cheakb=$_POST['cheak'];               
            }

$KolvoProgon=$_POST['KolvoVoprs'];
// echo "Zzz$KolvoProgon<br>";

     $vopros=$_POST['id_vopros'];
     $otv=$_POST['idOtvet'];
    if(isset($_POST['otvettext']))
    {
      $OtText=$_POST['otvettext'];
    }

    if(isset($_POST['KolvoOtvetovOtChbox']))
    {
          $KolvoOtvetovOtChbox=$_POST['KolvoOtvetovOtChbox'];
    }

$vtr=0;
$mn=0;
// foreach($KolvoOtvetovOtChbox as $key)
// {
    // echo "   <br>$key-П<br>";
// }
for($m=0; $m<$KolvoProgon; $m++)
{

    $GotVopr=$vopros[$m];
    $GotOtv=@$otv[$m];

    if($flag[$m]==0)
    {
        if(isset($OtText[$m]))
        {
           $GotOtText=$OtText[$m];            
        }
        else
        {
            $GotOtText='';
        }
 

            $dobavlen=mysql_query("INSERT INTO final_res (id_test, polz, id_vopros, id_otv, otvettext, time, VrProx, date) VALUES ('$id_tests','$polzovatel', '$GotVopr', '$GotOtv', '$GotOtText', '$Vrtime', '$TimeProx', '$PrDate' )", $db);
    }
    else
    {

            $GotOtText='';

            $KOtvIsChe=$KolvoOtvetovOtChbox[$vtr];

             // echo "<br>Vvv $KOtvIsChe<br>";

            if($KOtvIsChe==0)
            {
                $Otvet='';
                // echo "<br>Значение равно нулю<br>";
                $dobavlen=mysql_query("INSERT INTO final_res (id_test, polz, id_vopros, id_otv, otvettext, time, VrProx, date) VALUES ('$id_tests','$polzovatel', '$GotVopr', '$Otvet', '$GotOtText', '$Vrtime', '$TimeProx', '$PrDate' )", $db);

            }
            else
            {
                for($i=0; $i<$KOtvIsChe; $i++)
                {
                    $VarOtv=mysql_query("SELECT * FROM variant_otv WHERE id_questions='$GotVopr' AND flazhog='1' ", $db);

                    $Otvet=$cheakb[$mn];
                    // echo "<br>Это значение и $Otvet<br>";
                    while($rezultat=mysql_fetch_array($VarOtv))
                    {
                        if($Otvet==$rezultat['id'])
                            {
                                // echo "Все правильно!!!  <br>$Otvet=$rezultat[id]<br>";
                        $dobavlen=mysql_query("INSERT INTO final_res (id_test, polz, id_vopros, id_otv, otvettext, time, VrProx, date) VALUES ('$id_tests', '$polzovatel', '$GotVopr', '$Otvet', '$GotOtText', '$Vrtime', '$TimeProx', '$PrDate' )", $db);

                            }    
                    }                    
                    
                    $mn++;
                    // echo "$mn";
                }
            }
    $vtr++;

    }



}

echo "Операция успешно выполнена";

        ?>

<form action='itogRezult.php' method='POST'>
    <?php

 $polzo=$_POST['polz'];
    $Vetime=$_POST['Vtime'];


 echo "<input type='hidden' name='polz' value='$polzo'>";
  echo "<input type='hidden' name='Vtime' value='$Vetime'>";
  echo "<input type='hidden' name='KolProgon' value='$KolvoProgon'>";
                echo "<input type='hidden' name='id_testTw' value='$id_tests'>";



?>

<p>Вы закончили тест, можете посмотреть результаты <input type='submit' name='submit' value='Посмотреть...'></p>      


                </div>


                        </div>


</article></div>
                    </div>
                </div>
            </div>
        </div>
      </div>  


</body></html>