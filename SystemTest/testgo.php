<?php include("blocks/db.php");
mysql_query('SET NAMES utf8');
  include("blocks/lock.php");
 
if(isset($_REQUEST['id']))
 {$id=$_REQUEST['id'];}
   
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <meta charset="utf-8">
    <title>Пройти тест</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <link rel="stylesheet" href="style.css" media="screen">
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>

<style>
.prod{font-size: 12pt;}
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
        <li><a href="testgo.php" class="active">Пройти тест</a></li>
        <li><a href="tuning.php">Настройки</a></li>
    </ul> 
    </nav>
<div class="art-layout-wrapper ">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content dopl"><article class="art-post art-article">
                                <h2 class="art-postheader">Пройти тест</h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">
        <p>

   <?php

        $prok=1;
            $zaprosTest=mysql_query("SELECT * FROM admin_test WHERE nickname!='$loginCo' AND activTest='1'", $db);
            $rezZaprosTest=mysql_fetch_array($zaprosTest);
            
        if($rezZaprosTest!='')
        {
             do
            {
                echo "<p ><a href='/testirivanie.php?id=$rezZaprosTest[id]' target='_blank' class='prod'>$prok) $rezZaprosTest[nameTest]</a> <br>

             <i>$rezZaprosTest[comment]</i></p>";
              $prok++;
            }
            while($rezZaprosTest=mysql_fetch_array($zaprosTest));            
        }
        else
        {
            echo "Нет доступных тестов для прохождения";
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