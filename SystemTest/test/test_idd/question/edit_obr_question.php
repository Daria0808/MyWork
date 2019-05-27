<?php include("../../../blocks/db.php");
mysql_query('SET NAMES utf8');
  include("../../../blocks/lock.php");


$id=$_REQUEST['TestNomerId'];
   
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <meta charset="utf-8">
    <title>Редактирование</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <link rel="stylesheet" href="../../../style.css" media="screen">
    <link rel="stylesheet" href="../../../style.responsive.css" media="all">


    <script src="../../../jquery.js"></script>
    <script src="../../../script.js"></script>
    <script src="../../../script.responsive.js"></script>
      <script language='javascript' type="text/javascript">
        $(document).ready(function() {

            $('#proverc').on('click', '#predvarprosmotr', function(){
            var snl=$('#Perecluchatel').val();
            // alert(snl);

            if(snl==0)
            {
              $('#Perecluchatel').val('1');
                $(this).next().fadeIn(100);
            }
            else
            {
                $(this).next().fadeOut(100);
                $('#Perecluchatel').val('0');
            }

            });

        });
    </script>  
    <style>
#SpesMenu
{
    position: fixed;
/*    background:#8AC2E0;
*/
    height: 280px;
    width: 40px;
    bottom:90px;
    right:15px;
    background: rgba(100, 120, 250, 0.6);
}
#scrivaem{display:none;}
#predvarprosmotr{cursor: pointer;}

    </style>

</head>
<body>
<div id="art-main">
    <div class="art-sheet clearfix">
<header class="art-header">

    <div class="art-shapes">
        
            </div>

<h1 class="art-headline">
    <a href="../../../index.php">Личный кабинет</a>
</h1>

          
                    
</header>
<nav class="art-nav">
    <ul class="art-hmenu">
        <li><a href="../../../index.php" class="">Главная</a></li>
        <li><a href="../../../test.php" class="active">Мои проекты</a>
            <ul class="active">
                <li><a href="../../../test/new_test.php" class="">Создать новый тест</a></li>
 <?php
           
            $VvodMenu=mysql_query("SELECT * FROM admin_test WHERE nickname='$loginCo'", $db);
            $masMenu=mysql_fetch_array($VvodMenu);

        do
        {
            echo "
                <li><a href='../../../test/test_id.php?id=$masMenu[id]' class='active'>$masMenu[nameTest]</a></li>";
        }
        while($masMenu=mysql_fetch_array($VvodMenu));

    ?>
            </ul>
        </li>
        <li><a href="../../../testgo.php">Пройти тест</a></li>
        <li><a href="../../../tuning.php">Настройки</a></li>
    </ul> 
    </nav>
<div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content dopl"><article class="art-post art-article">
                                <h2 class="art-postheader">Редактирование</h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">

         <div id='SpesMenu'>
                <a href='../../../test.php' title='Тесты'><img src=../../../images/test.png width='25' height='25'></a>
  <?php echo "<a href='../../test_id.php?id=$id' title='Вопросы'><img src=../../../images/wh.png width='25' height='25' ></a>"; ?>


    <?php echo "<a href='add_question.php?id=$id' title='Добавить вопрос'><img src=../../../images/add.png width='25' height='25' </a>"; ?>
    
    <?php echo " <a href='remove_question.php?id=$id' title='Удалить вопросы'><img src=../../../images/trash_bin_icon.png width='25' height='25'></a><br>"; ?>
            
    <?php echo "<a href='edit_test.php?id=$id' title='Редактивароть тест'><img src=../../../images/edit_icon.png width='25' height='25'></a>"; ?>
    <?php echo " <a href='../../testirivanie.php?id=$id' target='_blank' title='Предворительный просмотр'><img src=../../../images/eye.png width='25' height='25' ></a><br>"; ?>
               

            </div>



<p>
<?php 

$ProizshYdalVoprosa='';
$DobavlOtvetProvVvoda=''; 


                $IdVoprosa=$_POST['idVopr'];
                $VoprosText=$_POST['IzmenVopros'];


                $FlagNaPravOtv=$_POST['PoslFlag'];

$ch=0;
                if(isset($FlagNaPravOtv))
                {
                    foreach ($FlagNaPravOtv as $key)
                    {
                        if($key==1)
                        {
                            $ch++;
                        }
                    }
                }
                else
                {
                    if($FlagNaPravOtv==1)
                    {
                        $ch++;
                    }
                }
// echo "<h1>Счетчик-$ch</h1>";
        if($ch==0)
        {
            // Если нету ни одого правильного ответа, значит это ответ без ответа - меняем вид
            $Perecluchatel=1;
        }
        else
        {
            // Есть хотя бы один правильный ответ, значит пойдёт в бд со значением 0
            $Perecluchatel=0;
        }

        $IsmenpOtevt=$_POST['IzmenOtv'];

        $idOtvet=$_POST['idOtveta'];

        $prognali=$_POST['SkolkoProgonov'];

        $ydalenie=$_POST['YdalOtvId'];

        $rabProisv=0;

        $podschet=0;


if($VoprosText!='')
{
    $VnesIzmen=0;
       $progonYdalVvod=0;
            for($i=0; $i<$prognali; $i++)
            {
                $FlPravOtv=$FlagNaPravOtv[$i];
                $Otvet=$IsmenpOtevt[$i];
                $idOtv=$idOtvet[$i];

                if($Otvet!='')
                {
                    $rabProisv++;
                    $dobavliem=mysql_query("UPDATE variant_otv SET variant='$Otvet', prav_ot='$FlPravOtv' WHERE id='$idOtv'");
                    $VnesIzmen=1;
                }
                else
                {
                    $udal=mysql_query("DELETE FROM variant_otv WHERE id='$idOtv'");
                    $progonYdalVvod++;
                    $rabProisv++;
                    // echo "Это else";
                    if($udal==1)
                    {
                        $ProizshYdalVoprosa=1;
                    }
                    else
                    {
                        $ProizshYdalVoprosa=0;                        
                    }
                }
            }

                if($progonYdalVvod==1)
                {
                  echo "Ответ успешно удалён<br>";
                }
                else
                {
                    if($progonYdalVvod>1)
                    {
                       echo "Ответы успешно удалёны<br>";   
                    }
                }

                    $DobVopros=mysql_query("UPDATE question SET text='$VoprosText', FlagPravOtvNet='$Perecluchatel' WHERE id='$IdVoprosa'");

}
else
{
    echo "В обще не то";
}

    if(isset($_POST['Otvet']))
    {
                $NovOtvet=$_POST['Otvet'];
        $FlNovOtv=$_POST['PoslFlagNov'];

        $DanPrishl=0;

                if(is_array($NovOtvet))
                {
                    foreach($NovOtvet as $newOtv)
                    {
                        if($newOtv!='')
                        {
                           $DanPrishl++; 
                        }
                        else
                        {       
                            $DanPrishl=0; 
                        }
                    }

                }

            if($DanPrishl>=1)
            {

                $Kolvoprocrut=0;
                $DobavlOtvetProvVvoda=0;

                if(is_array($FlNovOtv))
                {
                    foreach ($FlNovOtv as $koli)
                    {
                        $Kolvoprocrut++;
                    }
                }
                else
                {
                    $Kolvoprocrut=1;
                }

                for($j=0; $j<$Kolvoprocrut; $j++)
                {
                    $NOtvet=$NovOtvet[$j];
                    $FlNov=$FlNovOtv[$j];

                    $flazhog=$_POST['flazhog'];

                    $DobNovOtvet=mysql_query("INSERT INTO variant_otv (id_questions, variant, prav_ot, flazhog) VALUES ('$IdVoprosa','$NOtvet', '$FlNov', '$flazhog')");                        
                    
                    if($DobNovOtvet==1)
                    {
                        $DobavlOtvetProvVvoda=1;
                    }
                    else
                    {
                        $DobavlOtvetProvVvoda=0;   
                    }

                    $rabProisv++;
                }
                  


            }        
    }

    if($rabProisv==0)
    {
        echo "<p>Изменения не сохранены</p>";
    }


    if($rabProisv>0)
         {
            if(($ProizshYdalVoprosa!=1)&&(($DobavlOtvetProvVvoda==1)||($VnesIzmen==1)))
            {
                echo "<p>Изменения успешно внесены</p>";
            }
            if(($ProizshYdalVoprosa==1)&&(($DobavlOtvetProvVvoda==1)||($VnesIzmen==1)))
            {
                echo "Все изменения успешно внесены";
            }

echo " <div id='proverc'> ";
            $VoprosNov=mysql_query("SELECT * FROM question WHERE id='$IdVoprosa'", $db);
                $MyVopr=mysql_fetch_array($VoprosNov);
                echo "<p>$MyVopr[text]

        <a href='edit_question.php?id=$id&IzVop=$MyVopr[id]'><img src=../../../images/edit_icon.png width='25' height='25'></a>
        <a href='../../test_id.php?id=$id&IzVop=$MyVopr[id]'><img src=../../../images/trash_bin_icon.png width='25' height='25'></a>
        <a id='predvarprosmotr'><img src=../../../images/perguntas_frequentes.png width='30' height='30' ><input type='hidden' value='0' id='Perecluchatel'></a> ";

            $OtvetNovPol=mysql_query("SELECT * FROM variant_otv WHERE id_questions='$MyVopr[id]'");
            $VarOtvNovPol=mysql_fetch_array($OtvetNovPol);
                 echo "<i id='scrivaem'>";
                        do
                        {
                            if($VarOtvNovPol['prav_ot']==1)
                            {
                              echo "<br><input type='text' size='20' value='$VarOtvNovPol[variant]' id='otvPole' readonly><img src=../../../images/gal.png width='30' height='30'>";
                            }
                            else
                            {
                                echo "<br><input type='text' size='20' value='$VarOtvNovPol[variant]' id='otvPole' readonly><img src=../../../images/kr.png width='20' height='20'>";
                            }
                        }
                        while($VarOtvNovPol=mysql_fetch_array($OtvetNovPol));
                     echo "</i></p>";       
             

     echo "</div>";             
             }



?>
</p>

                </div>


</article></div>
                    </div>
                </div>
            </div><footer class="art-footer">
<p>Д.К. © 2018-2019</p>
</footer>



</body></html>