<?php include("../../../blocks/db.php");
mysql_query('SET NAMES utf8');
include("../../../blocks/lock.php");

if(isset($_REQUEST['id']))
 {$id=$_REQUEST['id'];}

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
    <title>Добавить новый вопрос</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
    <link rel="stylesheet" href="../../../style.css" media="screen">
    <link rel="stylesheet" href="../../../style.responsive.css" media="all">


    <script src="../../../jquery.js"></script>
    <script src="../../../script.js"></script>
    <script src="../../../script.responsive.js"></script>

       <script language='javascript' type="text/javascript">
  

    $(document).ready(function() {

        var blokSubNewVopr;


    $('.dobavit').click(function(){

        $('#VvodOtvetov').append("<i>Ответ:<input type='checkbox'  name='FlPravilnOtvet[]' value='0'><input type='hidden' name='PoslFlag[]' value='0'> <input type='text' size='20' name='Otvet[]' ></i><img src='../../../images/kr.png' id='krestik' width='25' height='25'> <br>");

        var Skol=$('#DlKrestikaPokazatel').val();

        var pl= +Skol + 1;
                // alert(pl);   Для того, что бы не было варианта, что остался лишь один вопрос

        $('#DlKrestikaPokazatel').val(pl);


    });


    $('.dobavitRadi').click(function(){

        $('#VvodOtvetov').append("<i>Ответ: <input type='radio' name='FlPravilnOtvet[]' value='0'> <input type='hidden' name='PoslFlag[]' value='0'> <input type='text' size='20' name='Otvet[]' ></i><img src='../../../images/kr.png' id='krestik' width='25' height='25'><br>");            

    });


        $('#TipOtvetaRadio').change(function(){

            blokSubNewVopr=2;
             // Для того что бы поставить блок на кнопку


            if(this.checked)
            {
                $('#VvodSKlav').prop('disabled', true);
                $('#isches').fadeOut(0);
                $('#TipOtvetaCheckbox').prop('disabled', true);
                $('#isches2').fadeOut(0);

                $('#VvodOtvetov').append("Введите ответ:<br><input type='radio' name='FlPravilnOtvet[]' value='1' checked> <input type='hidden' name='PoslFlag[]' value='1'> <input type='text' size='20' name='Otvet[]' ><img src='../../../images/exclamation_mark.png' id='iError' width='25' height='25'style='display:none;'> <br>");

                $('#VvodOtvetov').append("Введите ещё один вариант ответа:<br><input type='radio' name='FlPravilnOtvet[]' value='0'> <input type='hidden' name='PoslFlag[]' value='0'> <input type='text' size='20' name='Otvet[]' ><img src='../../../images/exclamation_mark.png' id='iError' width='25' height='25'style='display:none;'><br>");        

                $('#VvodOtvetov').append("<input type='hidden' name='Flazhog' value='0'>");

                $('.dobavitRadi').fadeIn(0);


            }
            else
            {
                $('#VvodSKlav').prop('disabled', false);
                $('#isches').fadeIn(0);   
                $('#TipOtvetaCheckbox').prop('disabled', false);
                $('#isches2').fadeIn(0);  

                $('#VvodOtvetov').html('');

                blokSubNewVopr=0; 
                // Для того что бы поставить блок на кнопку

                $('.dobavitRadi').fadeOut(0);
    
            }

        });



        $('#VvodOtvetov').on('click', '#krestik', function(){

            // alert('Жмак');

            var NeMin=$('#DlKrestikaPokazatel').val();

            if(NeMin!=2)
            {
                $(this).prev().html('');
                $(this).fadeOut(0);

                var nov=NeMin-1;
                // alert(nov);  Для того, что бы не было варианта, что остался лишь один вопрос
                $('#DlKrestikaPokazatel').val(nov); 
            }
            else
            {
                alert('Должно быть минимум два варианта ответа');
            }



        });



            $('#VvodOtvetov').on('change', 'input[name=FlPravilnOtvet\\[\\]]', function(){

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


        $('#TipOtvetaCheckbox').change(function(){
            blokSubNewVopr=1;

            if(this.checked)
            {
                $('#VvodSKlav').prop('disabled', true);
                $('#isches2').fadeOut(0);
                $('#TipOtvetaRadio').prop('disabled', true);
                $('#isches3').fadeOut(0);

                $('#KolvoOtvetov').fadeIn(0);
            }
            else
            {
                $('#VvodSKlav').prop('disabled', false);
                $('#isches2').fadeIn(0);  
                $('#TipOtvetaRadio').prop('disabled', false);
                $('#isches3').fadeIn(0);  
                $('#KolvoOtvetov').fadeOut(0);

                $('#VvodOtvetov').html('');

                blokSubNewVopr=0;
    
            }

        });



        $('#Dobavit').click(function(){


            $('#VvodOtvetov').append("<input type='hidden' id='DlKrestikaPokazatel' value=''>");            



            var KolOtvet=$('#KOtvetov').val();

            $('#DlKrestikaPokazatel').val(KolOtvet);

            // var maska= new RegExp("[1-9]{1}");
            // var prover=maska.test(KolOtvet);

            // if(prover==1)
            // {
                    $('#Dobavit').prop('disabled', true);   
                        $('#TipOtvetaCheckbox').prop('disabled', true);                         
            
                if(KolOtvet!='')
                {

                    $('#VvodOtvetov').append("Введите ответы:<br>");            
                        

                        for(var i=1; i<=KolOtvet; i++)
                            {
                                $('#VvodOtvetov').append("<i>Ответ:<input type='checkbox'  name='FlPravilnOtvet[]' value='0'><input type='hidden' name='PoslFlag[]' value='0'> <input type='text' size='20' name='Otvet[]' ></i><img src='../../../images/kr.png' id='krestik' width='25' height='25'><img src='../../../images/exclamation_mark.png' id='iError' width='25' height='25'style='display:none;'> <br>");
                            }

                        $('#KOtvetov').prop('disabled', true);




                        $('#VvodOtvetov').append("<input type='hidden' name='Flazhog' value='1'>");

                            $('.dobavit').fadeIn(0);


                }               
            // }    
            // else 
            // {

            //  if(KolOtvet!='')
            //  {
            //  alert('Вы ввели не число.');
            //  }
            //  else
            //  {
            //      alert('Вы ничего не ввели');
            //  }
            // }


            });

        $('#VvodSKlav').change(function(){

            if(this.checked)
            {

                blokSubNewVopr=1;
                $('#TipOtvetaRadio').prop('disabled', true);
                $('#isches3').fadeOut(0);
                $('#TipOtvetaCheckbox').prop('disabled', true);
                $('#isches').fadeOut(0);

                $('#VvodOtvetov').append("Ответ: <input type='text' size='20' name='Otvet[]' ><img src='../../../images/exclamation_mark.png' id='iError' width='25' height='25'style='display:none;'><br>");


            }
            else
            {
                blokSubNewVopr=0;
                $('#TipOtvetaRadio').prop('disabled', false);
                $('#isches').fadeIn(0);   
                $('#TipOtvetaCheckbox').prop('disabled', false);
                $('#isches3').fadeIn(0);  

                $('#VvodOtvetov').html('');
    
            }

        });


        
        });
    </script>   

<style>
.dobavit, .dobavitRadi {display:none;}
#KolvoOtvetov {display:none;}
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


        // $id это номер теста

         $Danstranichka=mysql_query("SELECT * FROM admin_test WHERE id='$id'", $db);
            $Vvodim=mysql_fetch_array($Danstranichka);


    ?>
            </ul>
        </li>
        <li><a href="../../../testgo.php">Пройти тест</a></li>

        <li><a href="../../../tuning.php">Настройки</a></li>
    </ul> 
    </nav>
<div class="art-layout-wrapper dopl">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content "><article class="art-post art-article">
                                <h2 class="art-postheader">Добавить новый вопрос</h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">

         <div id='SpesMenu'>
                <a href='../../../test.php' title='Тесты'><img src=../../../images/test.png width='25' height='25'></a>
  <?php echo "<a href='../../test_id.php?id=$id' title='Вопросы'><img src=../../../images/wh.png width='25' height='25' ></a>"; ?>


    <?php echo "<a href='add_question.php?id=$id' title='Добавить вопрос'><img src=../../../images/add.png width='25' height='25' </a>"; ?>
    
    <?php echo " <a href='remove_question.php?id=$id' title='Удалить вопросы'><img src=../../../images/trash_bin_icon.png width='25' height='25'></a><br>"; ?>
            
    <?php echo "<a href='edit_test.php?id=$id' title='Редактивароть тест'><img src=../../../images/edit_icon.png width='25' height='25'></a>"; ?>
    <?php echo " <a href='../../testirivanie.php?id=$id' target='_blank' title='Предворительный просмотр'><img src=../../../images/eye.png width='25' height='25' ></a><br>"; ?>
               

            </div>


                <div>    
                      <?php 
                      mysql_query("SET character_set_results='utf8'");
                      mysql_query("SET NAMES 'utf8'");

                              $IdOtve=mysql_query("SELECT MAX(id) AS id FROM variant_otv ", $db);
                          $MyIdOtv=mysql_fetch_array($IdOtve);
                        //   $idOt=$MyIdOtv[id]+1;

                      ?>
                      <p><h4>В данном разделе вы можете добавить вопросы и ответы для теста</h4></p> 
                      <h4>Тест: "<?php echo "$Vvodim[nameTest]";?>"</h4>

                      <form action='add_obr_question.php' method='POST' name='frm'>

                          <input type='hidden' name='TestNomerId' value='<?php echo "$id"?>'>


                      <!-- <p>id вопроса <input type='text' size='1' id='IdVopros' value='<?php  $idV?>' readonly><br> -->
                          Введите вопрос: <textarea name='vopros' cols='20' rows='5'></textarea> </p>


                      <p>Выберите тип: <br> <i id='isches3'> <input type='checkbox' id='TipOtvetaRadio'> Возможне лишь один правильный ответ</i> <br>
                          <i id='isches'><input type='checkbox' id='TipOtvetaCheckbox' >Нету правильных ответов/Один правильный ответ(но есть возможность выбрать сразу несколько)/Много правильных ответов</i> <br>
                          <i id='isches2'><input type='checkbox' id='VvodSKlav' name='Perekl' value='1'>Ответ пользователь должен вводить с клавиатуры сам</i>


                      </p>



                      <p id='KolvoOtvetov'> Выберите колличество ответов на данный вопрос: 

                              <select name='ot' size='1' id='KOtvetov'>
                                  <option value='2'>2</option>
                                  <option value='3'>3</option>
                                  <option value='4'>4</option>
                                  <option value='5'>5</option>
                                  <option value='6'>6</option>
                                  <option value='7'>7</option>
                                  <option value='8'>8</option>
                                  <option value='9'>9</option>
                              </select>

                          <input type='button' value='Ok' id='Dobavit'><i>
                      </p>


        <input type='hidden' name='IdFl' value='<?php echo "$MyIdOtv[id]"?>'>


                      <div id='VvodOtvetov'>


                      </div>
                      <div id='But'></div>

                      <br><input type='button' value='Добавить ещё один вариант ответа' class='dobavit'>
                      <input type='button' value='Добавить ещё один вариант ответа' class='dobavitRadi'>

                      <input type='submit' name='submit' value='Сохранить' id='otpravka'><input type='button' onclick="history.back(-1); return false;" value='Отмена'>



                      </form>
                </div>    

                </div>


</article></div>
                    </div>
                </div>
            </div><footer class="art-footer">
<p>Д.К. © 2018-2019</p>
</footer>

</body></html>