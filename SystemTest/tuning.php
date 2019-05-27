<?php include("blocks/db.php");
mysql_query('SET NAMES utf8');
  include("blocks/lock.php");

if(isset($_REQUEST['id']))
 {$id=$_REQUEST['id'];}
   


?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <meta charset="utf-8">
    <title>Настройки</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <link rel="stylesheet" href="style.css" media="screen">
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>

       <script language='javascript' type="text/javascript">
       
       function editInf()
       {
           var dataInformEdit=$('[name=newDataInf]').find('input').serialize();
            
            $.ajax({
               type: "POST",
               url: "editInfPolz.php",
               data: dataInformEdit,
               success:function(otvetSrverEditInf)
               {
                    if(otvetSrverEditInf=='Er')
                    {
                        alert('Неверно введён пароль');
                          $('#stpa').css({'background-color':'#C0C0C0'});
        
                    }
                    if(otvetSrverEditInf=='0')
                    {
                       alert('Пароли не совпали');
                        $('#parl').css({'background-color':'#C0C0C0'});
                         $('#parll').css({'background-color':'#C0C0C0'});
                    }
                    if(otvetSrverEditInf=='1')
                    {
                         alert('Пароль успешно изменён');
                    }
               }
                
                
            });

       }
       
       
        $(document).ready(function() {

 $('#slka').click(function(){


    if(window.confirm('Выйти из личного кабинета?'))
    {
        $.ajax({
                  type: "POST",
                  url: "out_polz.php",
                  success: function(){
                       document.location.href = "blocks/entryPersonal.php";

                }
        });


    }

});



        });
    </script>  
    <style> 
        #Pol{width:300px;}
        #slka{padding-left: 95%;}

    </style>


</head>
<body>
<div id="art-main">
    <div class="art-sheet clearfix">
<header class="art-header">

    <div class="art-shapes">
        
            </div>

<h1 class="art-headline">
    <a href="index.php">Личный кабинет</a>
</h1>

         
                    
</header>
<nav class="art-nav">
    <ul class="art-hmenu">
        <li><a href="index.php" class="">Главная</a></li>
        <li><a href="test.php" class="">Мои проекты</a>
            <ul class="">
                <li><a href="test/new_test.php" class="">Создать новый тест</a></li>
<?php
           

            $VvodMenu=mysql_query("SELECT * FROM admin_test WHERE nickname='$loginCo'", $db);
            $masMenu=mysql_fetch_array($VvodMenu);

        do
        {
            echo "
                <li><a href='test/test_id.php?id=$masMenu[id]' class=''>$masMenu[nameTest]</a></li>";
        }
        while($masMenu=mysql_fetch_array($VvodMenu));

    ?>
            </ul>
        </li>
        <li><a href="testgo.php" class="">Пройти тест</a></li>
        <li><a href="tuning.php" class="active">Настройки</a></li>
    </ul> 
    </nav>
<div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content dopl"><article class="art-post art-article">
                                <h2 class="art-postheader">Настройки</h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix"><p>В данном разделе, вы можете поменять пароль</p>

                    <div id='smena'>

            <form name='newDataInf' id='Pol'>

                        <p>Старый пароль<input type='text' name='oldpas' id='stpa'></p>
                        <p >Новый пароль<br><input type='text' name='newpas' id='parll'></p>
                        <p >Повторите новый пароль<input type='text' name='newpasTwo' id='parl'></p>
                    <input type='button' onClick='editInf();' value='Сохранить'>
            </form>
            <div id='slka'><a href=''>Выйти</a></div>

                    </div>

                </div>


</article></div>
                    </div>
                </div>
            </div>

<footer class="art-footer">
<p>Д.К. © 2018-2019</p>
</footer>

</body></html>