<?php include("../../../blocks/db.php");
mysql_query('SET NAMES utf8');
            mysql_query("SET character_set_results='utf8'");
  include("../../../blocks/lock.php");
  include("../../../blocks/CleanerPole.php");

if(isset($_REQUEST['id']))
 {$id=$_REQUEST['id'];}
else
{
    if(isset($_POST['TestNomerId']))
    {
        $id=$_POST['TestNomerId'];
    }
}


   
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <title>Новый вопрос</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
    <link rel="stylesheet" href="../../../style.css" media="screen">
    <link rel="stylesheet" href="../../../style.responsive.css" media="all">


    <script src="../../../jquery.js"></script>
    <script src="../../../script.js"></script>
    <script src="../../../script.responsive.js"></script>

            <script language='javascript' type="text/javascript">
        $(document).ready(function() {

            $('#predvarprosmotr').click(function(){

                $('#scrivaem').toggle();

            });

        });
    </script>   
<style>

#scrivaem{display:none;}
#predvarprosmotr{cursor: pointer;}
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
#otvPole{width:300px;}

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
                                <h2 class="art-postheader">Новый вопрос</h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">

         <div id='SpesMenu'>
                <a href='../../../test.php' title='Тесты'><img src=../../../images/test.png width='25' height='25'></a>
  <?php echo "<a href='../../test_id.php?id=$id' title='Вопросы'><img src=../../../images/wh.png width='25' height='25' ></a>"; ?>


    <?php echo "<a href='add_question.php?id=$id' title='Добавить вопрос'><img src=../../../images/add.png width='25' height='25' </a>"; ?>
    
    <?php echo " <a href='remove_question.php?id=$id' title='Удалить вопросы'><img src=../../../images/trash_bin_icon.png width='25' height='25'></a><br>"; ?>
            
    <?php echo "<a href='edit_test.php?id=$id' title='Редактивароть тест'><img src=../../../images/edit_icon.png width='25' height='25'></a>"; ?>
    <?php echo " <a href='../../../testirivanie.php?id=$id' target='_blank' title='Предворительный просмотр'><img src=../../../images/eye.png width='25' height='25' ></a><br>"; ?>
               

            </div>


    <p> Вопрос:  
     <?php 


                
                if(isset($_POST['Perekl']))
                {
                    $PerecluchatelPriem=$_POST['Perekl'];
                    $Perecluchatel=$PerecluchatelPriem['0'];
                }
                else
                {
                    $Perecluchatel=0;
                }
                
                
              $idTesNomCome=$_POST['TestNomerId'];
                $idTesNom=cleanerFormComment($idTesNomCome);

              if($idTesNom!='')
              {
                     $Idfl=$_POST['IdFl'];

                     $fl=$Idfl;

                      if(isset($_POST['Flazhog']))
                       {
                         $Flagi=$_POST['Flazhog'];
                        }
                         else
                         {
                          $Flagi=0;
                         }   

                         $VoprosCome=$_POST['vopros'];
                         $Vopros=cleanerFormComment($VoprosCome);


                        
                         if(isset($_POST['PoslFlag']))
                         {
                             $FlPrOtvet=$_POST['PoslFlag'];
                         }
                         else
                         {
                             $bv=0; 
                         }    

                         $PoluchOtvet=$_POST['Otvet'];


                         $KolichOtv=0;

                         $PravOtvNet=0;

                         if(is_array($PoluchOtvet))
                         {
                             foreach ($PoluchOtvet as $procr)
                             {
                                 $KolichOtv++;
                             }
                         }
                    if(isset($_POST['PoslFlag']))
                     {
                          if(is_array($FlPrOtvet))
                         {
                             foreach ($FlPrOtvet as $Proverka) 
                             {
                                 if($Proverka==1)
                                 {
                                     $PravOtvNet++;
                                 }
                             }

                         if($PravOtvNet>=1)
                             {
                                 $bv=0;  
                             }
                             else
                             {
                                 $bv=1;  
                             }

                         }                 
                     }





                 if($Vopros!='')
                 {
                    if($Perecluchatel==1)
                    {
                        $fl=0;
                    }

                  $DobVopros=mysql_query("INSERT INTO question (text, numberTest, fl, flag2, FlagPravOtvNet) VALUES ('$Vopros', '$idTesNom', '$fl', '$Flagi', '$bv')"); 
                  if($DobVopros==1)
                  {
                     $VoprosNovDobavl=mysql_query("SELECT * FROM question WHERE numberTest='$idTesNom' AND text='$Vopros'", $db);
                        $MyVoprId=mysql_fetch_array($VoprosNovDobavl);
    
                        $idDobavVoprs=$MyVoprId['id'];
    
                         if($Perecluchatel!=1)
                         {
                             for($i=0; $i<$KolichOtv; $i++)
                             {
                                 $OtvetCome=$PoluchOtvet[$i];
                                 $Otvet=cleanerFormComment($OtvetCome);
    
                                 $flagNaPravOtv=$FlPrOtvet[$i];
                                 if($Otvet!='')
                                 {
                                     $dobavit=mysql_query("INSERT INTO variant_otv ( id_questions, variant, prav_ot, flazhog) VALUES ('$idDobavVoprs', '$Otvet', '$flagNaPravOtv', '$Flagi')");
    
                                 }
    
                             }           
                         }
                         else
                         {
                             $OtvetCome=$PoluchOtvet['0'];
                             
                               $Otvet=cleanerFormComment($OtvetCome);
                                 $fl=0;
                                 $Flagi=0;
    
                             $dobavit=mysql_query("INSERT INTO variant_otv (id_questions, variant, prav_ot, flazhog) VALUES ('$idDobavVoprs', '$Otvet', '$Perecluchatel', '$Flagi')");
                             
                         }
                         if($dobavit==1)
                            {
                                 echo " успешно добавлен!<br>";
                            }
                            else
                            {
                                echo "Ошибка... $idDobavVoprs', '$Otvet', '$Perecluchatel', '$Flagi'";
                            }                      
                  }
                  else
                  {
                      echo "Сам вопрос не был добавлен... '$Vopros', '$idTesNom', '$fl', '$Flagi', '$bv'";
                  }



                 }
                 else
                 {
                     echo " не был заполнен";
                 }                
              }
              else
              {
                echo "Произошла ошибка";
              }


              
                ?>
        </p>

                <div id='proverc'>    

     <?php 
        
        if($DobVopros!=0)
         {

            $VoprosNov=mysql_query("SELECT * FROM question WHERE numberTest='$idTesNom' AND text='$Vopros'", $db);
                $MyVopr=mysql_fetch_array($VoprosNov);
                echo "<p>$MyVopr[text]

        <a href='edit_question.php?id=$id&IzVop=$MyVopr[id]'><img src=../../../images/edit_icon.png width='25' height='25'></a>
        <a href='../../test_id.php?id=$id&IzVop=$MyVopr[id]'><img src=../../../images/trash_bin_icon.png width='25' height='25'></a>
        <a id='predvarprosmotr'><img src=../../../images/perguntas_frequentes.png width='30' height='30' ></a> ";

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
                  
             }


                 ?>

                </div>    

                </div>


</article></div>
                    </div>
                </div>
            </div><footer class="art-footer">
<p>Д.К. © 2018-2019</p>
</footer>

</body></html>