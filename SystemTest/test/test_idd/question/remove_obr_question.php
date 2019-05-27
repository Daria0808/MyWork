<?php include("../../../blocks/db.php");
mysql_query('SET NAMES utf8');
  include("../../../blocks/lock.php");
  include("../../../blocks/CleanerPole.php");

if(isset($_POST['TestNomerId']))
 {
    $idCome=$_POST['TestNomerId'];
    $id=cleanerForm($idCome);
}
   
           $Danstranichka=mysql_query("SELECT * FROM admin_test WHERE id='$id' AND nickname='$loginCo'", $db);
            $Vvodim=mysql_fetch_array($Danstranichka);
            if($Vvodim=='')
            {
              $NoProverka=0;
              $id='';
            }
            else
            {
                $NoProverka=1;
            }


?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <meta charset="utf-8">
    <title>Вопрос удалён</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
    <link rel="stylesheet" href="../../../style.css" media="screen">
    <link rel="stylesheet" href="../../../style.responsive.css" media="all">

    <script src="../../../jquery.js"></script>
    <script src="../../../script.js"></script>
    <script src="../../../script.responsive.js"></script>

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
           
            $VvodMenu=mysql_query("SELECT * FROM admin_test WHERE nickname='$loginCo' AND id!='$id'", $db);
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
                                <h2 class="art-postheader">Удаление вопроса</h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">
                    
         <div id='SpesMenu'>
                <a href='http://www.localhost/admin_test/test.php' title='Тесты'><img src=../../../images/test.png width='25' height='25'></a>
  <?php echo "<a href='../../test_id.php?id=$id' title='Вопросы'><img src=../../../images/wh.png width='25' height='25' ></a>"; ?>


    <?php echo "<a href='add_question.php?id=$id' title='Добавить вопрос'><img src=../../../images/add.png width='25' height='25' </a>"; ?>
    
    <?php echo " <a href='remove_question.php?id=$id' title='Удалить вопросы'><img src=../../../images/trash_bin_icon.png width='25' height='25'></a><br>"; ?>
            
    <?php echo "<a href='edit_test.php?id=$id' title='Редактивароть тест'><img src=../../../images/edit_icon.png width='25' height='25'></a>"; ?>
    <?php echo " <a href='../../testirivanie.php?id=$id' target='_blank' title='Предворительный просмотр'><img src=../../../images/eye.png width='25' height='25' ></a><br>"; ?>
               

            </div>



        <p>
         <?php 

mysql_query("SET character_set_results='utf8'");
mysql_query("SET NAMES 'utf8'");

$IdVop=$_POST['YVop'];

if(isset($_POST['IdalVse']))
{
    $YdVs=$_POST['IdalVse'];
}
else
{
   $YdVs='0'; 
}


if($NoProverka==1)
{
    if($YdVs!=1)
        {
                if(is_array($IdVop))
                {
                    foreach($IdVop as $key => $PodYdal)
                    {
                        if($PodYdal!='')
                        {
                            // echo "id под удаление: $PodYdal";
                            echo "Вопрос $PodYdal успешно удален<br>";
                            $ydVopr=mysql_query("DELETE FROM question WHERE id='$PodYdal'");
                            $ydVarOtv=mysql_query("DELETE FROM variant_otv WHERE id_questions='$PodYdal'");
                        }
                        else
                        {
                            // echo "No";
                            echo "Произошла ошибка";
                        }
                    }
                }
                else
                {
                    if($IdVop!='')
                    {
                          echo "Вопрос $IdVop успешно удален <br>";
                            // echo "id под удаление(один): $IdVop";
                        $ydVopr=mysql_query("DELETE FROM question WHERE id='$IdVop'");
                        $ydVarOtv=mysql_query("DELETE FROM variant_otv WHERE id_questions='$IdVop'");
                    }
                    else
                    {
                        // echo "Пусто?";
                       echo "Произошла ошибка";

                    }
                }


        }
        else
        {
            $DlYdalVopros=mysql_query("SELECT * FROM question WHERE numberTest='$id'");
                $VoprYdal=mysql_fetch_array($DlYdalVopros);

                


                do
                {
                    $OtBd=$VoprYdal['id'];

                    $YdalVopros=mysql_query("DELETE FROM question WHERE id='$OtBd'");
                    $YdalOtvet=mysql_query("DELETE FROM variant_otv WHERE id_questions='$OtBd'");
                     if(($YdalVopros!=0)&&($YdalOtvet!=0))
                     {
                        // echo "Прошло";
                     }
                     else
                     {
                        echo "Произошла ошибка";
                     }
                     
                }
                while($VoprYdal=mysql_fetch_array($DlYdalVopros));


                 $YdalTest=mysql_query("DELETE FROM admin_test WHERE id='$id'");

            echo "Тест $masMenu[nameTest] успешно удалён";
        }   
}
else
{
    echo "Произошла ошибка";
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