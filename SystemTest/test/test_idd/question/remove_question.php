<?php include("../../../blocks/db.php");
mysql_query('SET NAMES utf8');
  include("../../../blocks/lock.php");

if(isset($_REQUEST['id']))
 {$id=$_REQUEST['id'];}

       if(isset($_GET['IzVop']))
         {$IzVop=$_GET['IzVop'];



               $ydVopr=mysql_query("DELETE FROM question WHERE id='$IzVop'");
               $ydVarOtv=mysql_query("DELETE FROM variant_otv WHERE id_questions='$IzVop'");

               if(($ydVopr!=0)&&($ydVarOtv!=0))
               {
                   echo "<input type='hidden' value='1' id='VoprosYdalen'>";
               }

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

            $Danstranichka=mysql_query("SELECT * FROM admin_test WHERE id='$id'", $db);
            $Vvodim=mysql_fetch_array($Danstranichka);
   
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <meta charset="utf-8">
    <title>Удаление вопроса</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <link rel="stylesheet" href="../../../style.css" media="screen">
    <link rel="stylesheet" href="../../../style.responsive.css" media="all">


    <script src="../../../jquery.js"></script>
    <script src="../../../script.js"></script>
    <script src="../../../script.responsive.js"></script>

    <script src="../../script.responsive.js"></script>

          <script language='javascript' type="text/javascript">

        function DeleVopros(NQuestion){

            var NumberQuestion=NQuestion;

        var dataDeleQuest = 'NumberDeleQuestion='+NumberQuestion;
            $.ajax({
                type: "POST",
                url: "../../DeleteQuestionA.php",
                data: dataDeleQuest,
                success: function(otvetServerDele){

                   if(otvetServerDele=='OK')
                  {
                     alert('Вопрос успешно удалён');
                      $('#HidPole'+NumberQuestion).hide(100);
                  }

                }

            });


        }

        function probn(c)
        {
             if(confirm('Удалить вопрос?'))
             {
                DeleVopros(c);
             }

        }

        
        $(document).ready(function() {



            var znach=$('#VoprosYdalen').val();
            if(znach==1)
            {
                alert('Вопрос был успешно удалён');
            }

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

#scrivaem{display:none;}
#predvarprosmotr{cursor: pointer;}

#otvPole{width:300px;}
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
                                <h2 class="art-postheader">Удаление вопроса</h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix" id='proverc'>



   <div id='SpesMenu'>
                <a href='http://www.localhost/admin_test/test.php' title='Тесты'><img src=../../../images/test.png width='25' height='25'></a>
  <?php echo "<a href='../../test_id.php?id=$id' title='Вопросы'><img src=../../../images/wh.png width='25' height='25' ></a>"; ?>


    <?php echo "<a href='add_question.php?id=$id' title='Добавить вопрос'><img src=../../../images/add.png width='25' height='25' </a>"; ?>
    
    <?php echo " <a href='remove_question.php?id=$id' title='Удалить вопросы'><img src=../../../images/trash_bin_icon.png width='25' height='25'></a><br>"; ?>
            
    <?php echo "<a href='edit_test.php?id=$id' title='Редактивароть тест'><img src=../../../images/edit_icon.png width='25' height='25'></a>"; ?>
    <?php echo " <a href='../../testirivanie.php?id=$id' target='_blank' title='Предворительный просмотр'><img src=../../../images/eye.png width='25' height='25' ></a><br>"; ?>
               

            </div>



 




        <p><form action='remove_obr_question.php' method='POST' name='frm'>

<input type='checkbox' name='IdalVse' value='1'> Удалить весь тест <br><br>

<?php 

mysql_query("SET character_set_results='utf8'");
mysql_query("SET NAMES 'utf8'");

    $chet=1;

        $SpisokVoprosov=mysql_query("SELECT * FROM question WHERE numberTest='$id'", $db);
        $MySpisokVoprosov=mysql_fetch_array($SpisokVoprosov);

        echo "Вопросы:";

        if($MySpisokVoprosov!=0)
        {
             do
                {
                    echo "<p id='HidPole$MySpisokVoprosov[id]'><input type='checkbox' name='YVop[]' value='$MySpisokVoprosov[id]'>$chet) $MySpisokVoprosov[text]
                             <a href='#' title='Удалить вопрос' id='delVopr' onclick='probn($MySpisokVoprosov[id])'><img src=../../../images/trash_bin_icon.png width='25' height='25'></a>
                            <a id='predvarprosmotr'><img src=../../../images/perguntas_frequentes.png width='30' height='30' ><input type='hidden' value='0' id='Perecluchatel'></a> ";
                    
                $Otvet=mysql_query("SELECT * FROM variant_otv WHERE id_questions='$MySpisokVoprosov[id]'");
                 $VarOtv=mysql_fetch_array($Otvet);
                 echo "<i id='scrivaem'>";
                        do
                        {
                            if($VarOtv['prav_ot']==1)
                            {
                              echo "<br><input type='text' size='20' value='$VarOtv[variant]' id='otvPole' readonly><img src=../../../images/gal.png width='30' height='30'>";
                            }
                            else
                            {
                                echo "<br><input type='text' size='20' value='$VarOtv[variant]' id='otvPole' readonly><img src=../../../images/krest.png width='20' height='20'>";
                            }
                        }
                        while($VarOtv=mysql_fetch_array($Otvet));
                     echo "</i></p>";       
                

                         $chet++;
                    }
                    while($MySpisokVoprosov=mysql_fetch_array($SpisokVoprosov));           
        }
        else
        {
            echo " Отсутствуют...";
        }




            echo "  <input type='hidden' name='TestNomerId' value='$id'?>";


?>
<br><br><input type='submit' name='submit' value='Удалить'>
</p>


                </div>


</article></div>
                    </div>
                </div>
            </div><footer class="art-footer">

<p>Д.К. © 2018-2019</p>
</footer>

</body></html>