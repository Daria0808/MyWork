<?php include("../blocks/db.php");
mysql_query('SET NAMES utf8');
  include("../blocks/lock.php");

if(isset($_GET['id']))
 {$id=$_GET['id'];}
   
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <meta charset="utf-8">
    <title>Создать новый тест</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <link rel="stylesheet" href="../style.css" media="screen">
    <link rel="stylesheet" href="../style.responsive.css" media="all">


    <script src="../jquery.js"></script>
    <script src="../script.js"></script>
    <script src="../script.responsive.js"></script>
    <style>
#progon{ width:500px;}

    </style>
</head>
<body>
<div id="art-main">
    <div class="art-sheet clearfix">
<header class="art-header">

    <div class="art-shapes">
        
            </div>

<h1 class="art-headline">
    <a href="../index.php">Личный кабинет</a>
</h1>

               
</header>
<nav class="art-nav">
    <ul class="art-hmenu">
        <li><a href="../index.php" class="">Главная</a></li>
        <li><a href="../test.php" class="active">Мои проекты</a>
            <ul class="active">
                <li><a href="../test/new_test.php" class="active">Создать новый тест</a></li>
<?php
           

            $VvodMenu=mysql_query("SELECT * FROM admin_test WHERE nickname='$loginCo'", $db);
            $masMenu=mysql_fetch_array($VvodMenu);

        do
        {
            echo "
                <li><a href='test_id.php?id=$masMenu[id]'>$masMenu[nameTest]</a></li>";
        }
        while($masMenu=mysql_fetch_array($VvodMenu));

    ?>
            </ul>
        </li>
        <li><a href="../testgo.php">Пройти тест</a></li>
        <li><a href="../tuning.php">Настройки</a></li>
    </ul> 
    </nav>
<div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content dopl"><article class="art-post art-article">
                                <h2 class="art-postheader">Создать новый тест</h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">


       <p>
<form action='test_id.php' method='POST' name='frm' id='progon'>

Название теста: <input type='text' name='NTest' size='60'><br><br>
Комментарий к тесту: <textarea name='comment' cols='20' rows='5'></textarea>
<!-- <input type='hidden' name='Nickname' value=''>
 -->

 <br><input type='submit' name='submit' value='Добавить'>
</form>



        </p>

                </div>


</article></div>
                    </div>
                </div>
            </div><footer class="art-footer">
<p>Д.К. © 2018-2019</p>
</footer>

</body></html>