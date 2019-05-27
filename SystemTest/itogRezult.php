<?php include("blocks/db.php");
mysql_query('SET NAMES utf8');
  
if(isset($_POST['id_testTw']))
 {$id=$_POST['id_testTw'];}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <meta charset="utf-8">
    <title>Тестирование</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <link rel="stylesheet" href="style.css" media="screen">
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="jquery.js"></script>
    <script type="text/javascript" language='javascript' src="script.js"></script>
    <script src="script.responsive.js"></script>
        <script language='javascript' type="text/javascript">
        $(document).ready(function() {

            $('.tut').click(function(){
                $(this).fadeOut(200).next().fadeIn(200);
            });
        
        });
    </script>   
    <style>
.prav{background: rgba(127, 255, 0); }
.neprav{background: rgba(255, 0, 0, 0.9); }
a:visited{color:#000099;}
a{text-decoration:none;}
.z{display:none;}
.tut{cursor: pointer;}
.commen{display: none;}
.proz{background: rgba(235, 244, 250, 0.6);}
.oncolr{background: rgba(95, 158, 160, 0.6);;
    font-size: 13pt;}
.vtcolrtab{background: rgba(95, 158, 160, 0.6);}
.otvcolr{font-size: 11pt;}
.vnt{font-size: 11pt;}
    </style>            
</head>
<body>
<div id="art-main">
    <div class="art-sheet clearfix">

<div class="art-layout-wrapper dopl">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                       <div class='proz' align='center'>        
                        <h2 class="art-postheader ">Результаты теста</h2>
                                                
                <div class=" clearfix" >


        <?php
            $polzovatel=$_POST['polz'];
            $Vrtime=$_POST['Vtime'];

        $NazvanoPravOtvetov=0;

        $VsegoBall=0;

    $IdVopr=mysql_query("SELECT MAX(id) AS id FROM question ", $db);
    $MyIdVopr=mysql_fetch_array($IdVopr);
    $prokruchivaem=$MyIdVopr['id'];
// $prokruchivaem=$_GET['KolProgon'];
    echo "<table width='70%' height='40%' border='1' align='center'><tr class='oncolr'><td ><h4>Вопрос</h4></td>
    <td ><h4>Ответ пользователя</h4></td>
    <td ><h4>Правильный ответ</h4></td>
    </tr>";

for($qw=1; $qw<=$prokruchivaem; $qw++)
{

    $itog=mysql_query("SELECT * FROM final_res WHERE (id_vopros='$qw' AND polz='$polzovatel' AND time='$Vrtime')", $db);
    $MyItog=mysql_fetch_array($itog);
    
    if($MyItog!='')
    {
        $gotOtvet=$MyItog['id_otv'];
        $idVoprosa=$MyItog['id_vopros'];
          
            $SchPravilnOtvet=mysql_query("SELECT * FROM variant_otv WHERE id_questions='$idVoprosa' AND prav_ot='1'", $db);

    $schNaPravOtv=0;

        do
        {
            $schNaPravOtv++;
        }
        while($BudPravOtv=mysql_fetch_array($SchPravilnOtvet));
        // echo "$schNaPravOtv<br>"; 

        $SpisokVoprosov=mysql_query("SELECT * FROM question WHERE id='$idVoprosa'", $db);
        $MySpisokVoprosov=mysql_fetch_array($SpisokVoprosov);

        $FlagKol=$MySpisokVoprosov['flag2']; 
        // flag2 - более 2 правильных ответов


        $FlagNalichPravOtv=$MySpisokVoprosov['FlagPravOtvNet'];
        // флаг на нету правильного ответа


        // $vopros++;
        // $vopros=$prokruchivaem;

        if($FlagNalichPravOtv==0)
        {

            // первая ветка - когда есть правильные ответы. Далее идёт разделение:
            // - на несколько правильных ответов
            // - один правильный ответ
            // - ответ введёт с клавы 

            if($FlagKol==0)
                {

                    // один правильный ответ, использовано либо radio либо text

                    if($gotOtvet!='')
                    {
                            $SpisokOtvetov=mysql_query("SELECT * FROM variant_otv WHERE id='$gotOtvet' AND id_questions='$idVoprosa' ", $db);
                            $MySpisokOtvetov=mysql_fetch_array($SpisokOtvetov);
                            $flag=1;
                    }
                    else
                    {
                        $flag=0;
                    }


                    echo "<tr class='otvcolr'>
                    <td>$MySpisokVoprosov[text]</td>";

                    if($flag==1)
                    {      

                     $praviln=mysql_query("SELECT * FROM variant_otv WHERE id_questions='$idVoprosa' AND prav_ot='1'", $db);
                        $pravilnOtvet=mysql_fetch_array($praviln);
                        echo "  <td>$MySpisokOtvetov[variant]<br>";
                          
                            if($MySpisokOtvetov['prav_ot']==0)
                            {
                            echo "<i class='tut'>Посмотреть ответ...</i>
                                    <i class='z'>$pravilnOtvet[variant] <br> </i>";                                
                            }
                        echo "</td>";
                            // $PravOtv=$MySpisokOtvetov['prav_ot'];


                            if($MySpisokOtvetov['prav_ot']==0)
                            {
                                    echo "<td class='neprav'>";

                                echo "<i>Не правильный ответ</i>

                                    </td></tr>";
                            }
                            else
                            {
                                echo "<td class='prav'>";
                                echo "<i >Правильный ответ</i>";
                            $NazvanoPravOtvetov++;
                            }   



                    }

                    else
                    {
                                $gotOtvetReestrProverka=$MyItog['otvettext'];

                            
    // Это сделано для того, что бы все буквы были переведны в один реестр. Как бы ты не ввёл с клавы ответ, получится маленькими буквами
                                $gotOtvet=mb_convert_case($gotOtvetReestrProverka, MB_CASE_LOWER,'UTF-8');



                        $praviln=mysql_query("SELECT * FROM variant_otv WHERE id_questions='$idVoprosa' AND prav_ot='1'", $db);
                        $pravilnOtvet=mysql_fetch_array($praviln);
                                    
                                    $progonReestra=$pravilnOtvet['variant'];
                                    
                                    $pravilnOtvetReestrProverka=mb_convert_case($progonReestra, MB_CASE_LOWER,'UTF-8');

                            echo "  <td>$MyItog[otvettext]<br>";

                      if($pravilnOtvetReestrProverka!=$gotOtvet)
                      {
                       echo "<i class='tut'>Посмотреть ответ...</i>
                                        <i class='z'>$pravilnOtvet[variant] <br></i>
                             </i>";                      
                      }

                      echo "</td>";
                                if($pravilnOtvetReestrProverka!=$gotOtvet)
                                {
                                   echo "<td class='neprav'>";  
                                    echo "<i>Не правильный ответ</i>

                                        </td></tr>";
                                }
                                else
                                {
                                        echo "<td class='prav'>";  
                                    echo "<i>Правильный ответ</i>";
                                $NazvanoPravOtvetov++;
                                }   
                                
                    }

                        
                            $VsegoBall++;

                }

                else
                {

                    // возможно несколько правильных ответов - использованно checkbox
                    echo "<tr class='otvcolr'>
                    <td>$MySpisokVoprosov[text]</td>";

                    echo "<td>";

                        $res=array();

                    do
                    {
                        $gotOtvet=$MyItog['id_otv'];
                        $idVoprosa=$MyItog['id_vopros'];

                        $SpisokOtvetov=mysql_query("SELECT * FROM variant_otv WHERE id='$gotOtvet' AND flazhog='1' AND id_questions='$idVoprosa'", $db);
                        $MySpisokOtvetov=mysql_fetch_array($SpisokOtvetov);

                        $res[]=$MySpisokOtvetov['variant'];
                            echo "$MySpisokOtvetov[variant]<br>";
                    }
                    while($MyItog=mysql_fetch_array($itog));

          $KonOtvetov=mysql_query("SELECT * FROM variant_otv WHERE prav_ot='1' AND flazhog='1' AND id_questions='$idVoprosa'", $db);
          $Otvet=mysql_fetch_array($KonOtvetov); 


                        $qq=mysql_query("SELECT * FROM variant_otv WHERE flazhog='1' AND id_questions='$idVoprosa' AND prav_ot='1'", $db);
                        $wz=mysql_fetch_array($qq);
                        $m=0;
                        $kolvoPravOtvetov=0;
                        $kolvoProgonov=0;
                        $ch=0;


                        $dobavBal=0;
                        $KonechRezBal=0;
                    do
                    {
                        foreach($res as $key)
                            {
                                $m++;
                                // echo "Zzzzzz $key==$wz[variant]<br>
                                //  Пусть это m = $m<br>";

                                if(($key==$wz['variant'])&&($wz['prav_ot']==1))
                                {
                                    $ch++;
                                    $dobavBal=(3/$schNaPravOtv);
                                    $KonechRezBal=$KonechRezBal+$dobavBal;
                                    // echo "<br> $schNaPravOtv--$dobavBal - $KonechRezBal";
                                    // echo "<br> $MySpisokPravilOtvetov[id_ot] - Правильный ответ<br>";
                                }
                        
                            }   
                            // echo "$MySpisokPravilOtvetov[text]<br>";
                            $kolvoPravOtvetov++;
                    }
                    while($wz=mysql_fetch_array($qq));

                    $kolvoProgonov=$m/$kolvoPravOtvetov;
                    // echo "Колличество прав ответов $kolvoPravOtvetov<br> $m колличество прокруток <br> $kolvoProgonov колличество прогонов <br> $ch";
        //  echo "<br><br>КАК$m<br><br>$kolvoProgonov"; 
        // echo "<br>Mmmm$ch<br>";
        // echo "Nus$kolvoPravOtvetov <br> $kolvoProgonov <br> $ch";

                    if(($ch!=$kolvoPravOtvetov)&&(($kolvoProgonov!=$kolvoPravOtvetov)||($kolvoProgonov==$kolvoPravOtvetov)))
                    {


                       echo "  <i class='tut'>Посмотреть ответ...</i><i class='z'>";       
                                    do
                                    {
                                        echo "$Otvet[variant]<br>";         
                                    }
                                    while($Otvet=mysql_fetch_array($KonOtvetov));   
                                    echo "</i>";



                                echo "</td>";    
                    }

       



                    if(($ch==$kolvoPravOtvetov)&&($kolvoProgonov==$kolvoPravOtvetov))
                    {
                         echo "<td class='prav'>";
                        echo "<i>Правильный ответ</i>";
                        // $NazvanoPravOtvetov++;
                        $NazvanoPravOtvetov=$NazvanoPravOtvetov+3;
                    }
                    else
                    {
                         echo "<td class='neprav'>";

                        echo "<i>Не правильный ответ</i>";


                        $Vichest=$kolvoProgonov-$kolvoPravOtvetov;

                        $MinusBall=$Vichest*$dobavBal;

                        if($MinusBall>0)
                        {
                            $NazvanoPravOtvetov=$NazvanoPravOtvetov+$KonechRezBal-$MinusBall;
                        }



                    }

                        // echo "<br> $ch - вывод";


                    $VsegoBall=$VsegoBall+3;


                    echo "</td>";
                }           
        }
        
        else
        {

            // если нет правильного ответа 

                echo "<tr class='otvcolr'>
                <td>$MySpisokVoprosov[text]</td>";

                echo "<td>";

                    $res=array();

                do
                {
                    $gotOtvet=$MyItog[id_otv];
                    $idVoprosa=$MyItog[id_vopros];

                    $SpisokOtvetov=mysql_query("SELECT * FROM variant_otv WHERE id='$gotOtvet' AND flazhog='1' AND id_questions='$idVoprosa'", $db);
                    $MySpisokOtvetov=mysql_fetch_array($SpisokOtvetov);

                    $res[]=$MySpisokOtvetov['variant'];

                    if($MySpisokOtvetov['variant']=='')
                    {
                        echo "-";
                    }
                    else
                    {
                      echo "$MySpisokOtvetov[variant]<br>";
                    }
                }
                while($MyItog=mysql_fetch_array($itog));

                    if($MySpisokOtvetov['variant']!='')
                    {
                            echo "<br><i class='tut'>Посмотреть ответ...</i><i class='z'>Нет ответа<br></i>";                   
                    }
                echo "</td>
                <td>";

                    $qq=mysql_query("SELECT * FROM variant_otv WHERE flazhog='1' AND id_questions='$idVoprosa' AND prav_ot='1'", $db);
                    $wz=mysql_fetch_array($qq);
                    $m=0;
                    $kolvoPravOtvetov=0;
                    $kolvoProgonov=0;
                    $ch=0;

                    foreach($res as $key)
                    {
                        if($key=='')
                        {
                            $ch++;
                        }
                        $kolvoProgonov++;                       
                    }

                    if($ch==$kolvoProgonov)
                    {
                        echo "<i class='prav'>Правильный ответ</i>";
                        $NazvanoPravOtvetov=$NazvanoPravOtvetov+3;
                    }
                    else
                    {
                        
                        echo "<i class='neprav'>Не правильный ответ</i>";

                    }

                        // echo "<br> $ch - вывод";

                    $VsegoBall=$VsegoBall+3;

                    echo "</td>";           
        }
        
    }       
}




    echo"</table>";

        ?>

        <br><table width='70%' height='10%' border='1' align='center'>

            <tr class='vtcolrtab'>
                <td align='center'><h2> Ваши результаты:<h2></td>
            </tr>
                <tr class='vnt'>
                    <td> 
                        <?php 



                    $SpisokAssem=mysql_query("SELECT * FROM admin_test WHERE id='$id'", $db);
                    $MySpisokAssem=mysql_fetch_array($SpisokAssem);

                        $TrPorog=(($VsegoBall*$MySpisokAssem['YdPokazatel'])/100);
                        $Xorporog=(($VsegoBall*$MySpisokAssem['WellPokazatel'])/100);
                        $OtlPorog=(($VsegoBall*$MySpisokAssem['OtlPokazatel'])/100);

                        // echo " 3 - $TrPorog<br> 4 -$Xorporog <br> 5- $OtlPorog";
                    
                        if($NazvanoPravOtvetov>=$OtlPorog)
                        {
                            echo "Поздравляем, вы прошли тест отлично! Вы набрали $NazvanoPravOtvetov баллов из $VsegoBall";
                        }
                        else
                        {
                            if($NazvanoPravOtvetov>=$Xorporog)
                            {
                                echo "Поздравляем, вы прошли тест хорошо! Вы набрали $NazvanoPravOtvetov баллов из $VsegoBall";
                            }
                            if($NazvanoPravOtvetov>=$TrPorog)
                            {
                               echo "Вы прошли тест удовлетворительно! Вы набрали $NazvanoPravOtvetov баллов из $VsegoBall";   
                            }
                            else
                            {
                                echo "Тест был провален... Может стоит попробовать ещё раз?<br> Набранно $NazvanoPravOtvetov баллов из $VsegoBall";
                            }                           
                        }


                        ?>  
                    </td>   
                </tr>

        </table>
    <a href="index.php">Вернуться в личный кабинет</a><br>
</div>
                </div>


                        </div>


</article></div>
                    </div>
                </div>
            </div>
        </div>
      </div>  


</body></html>