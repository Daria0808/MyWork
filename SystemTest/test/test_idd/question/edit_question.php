<?php include("../../../blocks/db.php");
mysql_query('SET NAMES utf8');
  include("../../../blocks/lock.php");
include("../../../blocks/CleanerPole.php");
if(isset($_GET['id']))
 {$id=$_GET['id'];}
   
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
        


        var Pokazaa=$('#PokazatelKres').val();
        

            var k=1;


        $('#DobavOtvet').click(function(){

    $('#Dobavil').append("<i>Ответ: <input type='radio' name='FlPravilnOtvet[]' value='0'> <input type='hidden' name='PoslFlagNov[]' value='0'> <input type='text' size='20' name='Otvet[]' value=''><img src='../../../images/kr.png' id='krestik' width='20' height='20'><br></i>");         

       var SkolKr=$('#PokazatelKres').val();

        var pluch= +SkolKr + 1;
      $('#PokazatelKres').val(pluch);


        });


    $('#DobavOtvetChe').click(function(){

        $('#Dobavil').append("<i>Ответ:<input type='checkbox'  name='FlPravilnOtvet[]' value='0'><input type='hidden' name='PoslFlagNov[]' value='0'> <input type='text' size='20' name='Otvet[]' value=''> <img src='../../../images/kr.png' id='krestik' width='20' height='20'><br></i>");

        var SkolKr=$('#PokazatelKres').val();

        var pluch= +SkolKr + 1;

        $('#PokazatelKres').val(pluch);


    });



        $('#nashel').on('click', '#krestik', function(){



        var NeMenshe=$('#PokazatelKres').val();

        if(NeMenshe!=2)
        {

            var p=$(this).prev().map( function( index, element ) 
                                {return element.id;}).get();
            // alert(p);
            $(this).next().val(p);
            $(this).prev().html('');
            // $(this).fadeOut(100);
                // $(this).remove();
                // $(this).prev().remove();
                $(this).closest('i').remove();
                var novoe=NeMenshe-1;
                $('#PokazatelKres').val(novoe); 

        }
        else
        {
                alert('Должно быть минимум два варианта ответа');
        }


        });


    $('#nashel').on('change', 'input[name=FlPravilnOtvet\\[\\]]', function(){

                var ttt=$('input[name=FlPravilnOtvet\\[\\]]:radio');


                    if(ttt.is(':checked')!=':checked')
                    {
                         ttt.next().val('0');
                         ttt.val('0');
     
                    }

                    if(this.checked)
                    {
                        // alert('Nnn');
                        $(this).next().val('1');
                        $(this).val('1');
    
                    }
                    else
                    {
                        $(this).val('0');
                        $(this).next().val('0');

                    }

            });


    
        });
    </script>   


<style>
.otvPole{width: 300px;}

#progon{ width:65%;}
#DlVoprosPolosa{ width:600px;}
#SpesMenu
{
    position: fixed;
    height: 280px;
    width: 40px;
    bottom:90px;
    right:15px;
    background: rgba(100, 120, 250, 0.6);
}
.zakr{ display: none;}

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
if(isset($_GET['IzVop']))
 {$IzVop=$_GET['IzVop'];}

        $poex=1;


    // $Vopros=mysql_query("SELECT * FROM question WHERE numberTest='$id'", $db);

    // if(!isset($IzVop))
    // {
    //     while($MyVopr=mysql_fetch_array($Vopros))
    //         {
    //             echo "<p><a href='edit_questions.php?id=$id&IzVop=$MyVopr[id]'>$poex) $MyVopr[text]</a></p>";
    //             $poex++;
    //         }
    // // }
    // else
    if(isset($IzVop))
    {
        $proverkaQuestPolz=mysql_query("SELECT id FROM admin_test WHERE id='$id' AND nickname='$loginCo'");
        $rezZaprosproverkaQuestPolz=mysql_fetch_array($proverkaQuestPolz);

        if($rezZaprosproverkaQuestPolz!='')
        {
                $Otvet=mysql_query("SELECT * FROM variant_otv WHERE id_questions='$IzVop'");
                $VarOtv=mysql_fetch_array($Otvet);

                $TQuest=mysql_query("SELECT * FROM question WHERE id='$IzVop'");
                $Vopr=mysql_fetch_array($TQuest);

                $fl=$Vopr['flag2'];
                $sd=0;
                $flaz=$Vopr['fl'];

                
                echo "<form action='edit_obr_question.php' method='POST' name='zx'>";
                    echo "<div id='nashel'>";

                echo "<input type='hidden' name='flazhog' value='$fl'>";

            if($fl==0)
            {
                

                do
                    {

                        echo "<p id='DlVoprosPolosa'> Вопрос: <input value='$Vopr[text]' name='IzmenVopros' type='text' size='60'></p>
                                            <input type='hidden' name='idVopr' value='$Vopr[id]'>";
                                                    
                                    echo "<p>Ответы:</p>";  

                        echo "<div id='progon'>";            
                                do
                                {
                                        $idOtveta=$VarOtv['id'];
            
                                    if($VarOtv['prav_ot']==1)
                                    {


                                        if($flaz!=0)
                                        {
                                            echo "<i>Правильный ответ:
                                                <input type='radio' name='FlPravilnOtvet[]' checked>
                                                <input type='hidden' name='PoslFlag[]' value='1'>
                                            <i id='$VarOtv[id]'>
                                                 <input id='z$VarOtv[id]' value='$VarOtv[variant]' name='IzmenOtv[]' type='text' class='otvPole'>
                                            </i>
                                            </i> <img src='../../../images/kr.png' id='krestik' width='20' height='20'><input type='hidden' name='YdalOtvId[]' value=''><br>";    
                                            echo "<input type='hidden' name='idOtveta[]' value='$idOtveta'>";                                    
                                        }
                                        else
                                        {
                                             echo "<i>Правильный ответ:
                                                <input type='radio' name='FlPravilnOtvet[]' checked>
                                                <input type='hidden' name='PoslFlag[]' value='1'>
                                            <i id='$VarOtv[id]'>
                                                 <input id='z$VarOtv[id]' value='$VarOtv[variant]' name='IzmenOtv[]' type='text' class='otvPole'>
                                            </i>
                                            </i> ";
                                            echo "<input type='hidden' name='idOtveta[]' value='$idOtveta'>";                                    
                                        }

                                // и всё
                                        
                                        $sd++;
                                    }
                                    else
                                    {
                                        echo "<i>Правильный ответ: <input type='radio' name='FlPravilnOtvet[]'><input type='hidden' name='PoslFlag[]' value='0'><i id='$VarOtv[id]'><input id='z$VarOtv[id]' value='$VarOtv[variant]' name='IzmenOtv[]' type='text' class='otvPole'> </i></i><img src='../../../images/kr.png' id='krestik' width='20' height='20'><input type='hidden' name='YdalOtvId[]' value=''><br>";
                                        echo "<input type='hidden' name='idOtveta[]' value='$idOtveta'>";
                                        $sd++;
                                    }                           
                                }
                                while($VarOtv=mysql_fetch_array($Otvet));

                    }
                    while($Vopr=mysql_fetch_array($TQuest));

                                    echo "<input type='hidden' id='PokazatelKres' value='$sd'>";


                    echo "<div id='Dobavil'></div>";


                        if($flaz!=0)
                        {
                            echo " <br><input type='button' value='Добавить ответ' id='DobavOtvet' >";
                        }


            }
            else
            {
                do
                    {

                        echo "<p> Вопрос: <input value='$Vopr[text]' name='IzmenVopros' type='text' size='60'></p>
                                            <input type='hidden' name='idVopr' value='$Vopr[id]'>";
                                                    
                                    echo "<p>Ответы:</p>";  


                                do
                                {
                                        
                                        $idOtveta=$VarOtv['id'];
            
                                    if($VarOtv['prav_ot']==1)
                                    {
                                        echo "<i id='$VarOtv[id]'><input type='checkbox' name='FlPravilnOtvet[]' checked><input type='hidden' name='PoslFlag[]' value='1'>Ответ: <input id='z$VarOtv[id]' value='$VarOtv[variant]' name='IzmenOtv[]' type='text' class='otvPole'>(по условию был правильным ответом)<input type='hidden' name='idOtveta[]' value='$idOtveta'></i><img src='../../../images/kr.png' id='krestik' width='20' height='20'><input type='hidden' name='YdalOtvId[]' value=''> <br>";    
                                        // echo "<input type='hidden' name='idOtveta[]' value='$idOtveta'>"; Перенесла на строчку выше, в эту большую конструкцию, что бы при удалении не мешалось
                                        $sd++;

                                    }
                                    else
                                    {
                                        echo "<i id='$VarOtv[id]'><input type='checkbox' name='FlPravilnOtvet[]' ><input type='hidden' name='PoslFlag[]' value='0'>Ответ: <input id='z$VarOtv[id]' value='$VarOtv[variant]' name='IzmenOtv[]' type='text' class='otvPole'> <input type='hidden' name='idOtveta[]' value='$idOtveta'> </i><img src='../../../images/kr.png' id='krestik' width='20' height='20'><input type='hidden' name='YdalOtvId[]' value=''><br>";
                                        // echo "<input type='hidden' name='idOtveta[]' value='$idOtveta'>"; Перенесла на строчку выше, в эту большую конструкцию, что бы при удалении не мешалось
                                        $sd++;
                                    }                           
                                }
                                while($VarOtv=mysql_fetch_array($Otvet));

                    }
                    while($Vopr=mysql_fetch_array($TQuest));

                        echo "<input type='hidden' id='PokazatelKres' value='$sd'>";

                    echo "<div id='Dobavil'></div>";

                    echo "</div>";

                    echo " <br><input type='button' value='Добавить ответ' id='DobavOtvetChe'>"; 
            }



                echo "<input type='hidden' name='SkolkoProgonov' value='$sd'>";
                    echo "  <input type='submit' name='submit' value='Сохранить'>";
                                echo " <input type='button' onclick='history.back(-1); return false;' value='Отмена'>";       


                    echo "  <input type='hidden' name='TestNomerId' value='$id'?>";

                    echo "</div></form>";


            }            
        }
        else
        {
             echo "Произошла ошибка<br> <a href='../index.php'>На главную страницу";
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