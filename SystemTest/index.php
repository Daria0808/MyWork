<?php include("blocks/db.php");
mysql_query('SET NAMES utf8');

    include("blocks/lock.php");

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <meta charset="utf-8">
    <title>Главная</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <link rel="stylesheet" href="style.css" media="screen">
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>


<style>.art-content .art-postcontent-0 .layout-item-0 { border-spacing: 20px 0px; border-collapse: separate;  }
.art-content .art-postcontent-0 .layout-item-1 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;border-left-width:1px;border-top-color:#C3DFEF;border-right-color:#C3DFEF;border-bottom-color:#C3DFEF;border-left-color:#C3DFEF; color: #123344; background: #FFFFFF;background: rgba(255, 255, 255, 0.5); padding: 3px; vertical-align: top; border-radius: 20px;  }
.art-content .art-postcontent-0 .layout-item-2 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;border-left-width:1px;border-top-color:#C3DFEF;border-right-color:#C3DFEF;border-bottom-color:#C3DFEF;border-left-color:#C3DFEF; color: #102D3C; background: #DBECF5; background: rgba(255, 255, 255, 0.5); padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px; border-radius: 20px;  }
.art-content .art-postcontent-0 .layout-item-3 { background: ;  }
.art-content .art-postcontent-0 .layout-item-4 { background: ; padding-right: 10px;padding-left: 10px;  }
.art-content .art-postcontent-0 .layout-item-5 { color: #0F2A38; background: ; border-spacing: 20px 0px; border-collapse: separate;  }
.art-content .art-postcontent-0 .layout-item-6 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;border-left-width:1px;border-top-color:#C3DFEF;border-right-color:#C3DFEF;border-bottom-color:#C3DFEF;border-left-color:#C3DFEF; color: #113040; background: #EBF4FA;background: rgba(235, 244, 250, 0.5); padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px; border-radius: 20px;  }
.art-content .art-postcontent-0 .layout-item-7 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;border-left-width:1px;border-top-color:#C3DFEF;border-right-color:#C3DFEF;border-bottom-color:#C3DFEF;border-left-color:#C3DFEF; color: #113040; background: #EBF4FA;background: rgba(235, 244, 250, 0.7); padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px; border-radius: 20px;  }
.art-content .art-postcontent-0 .layout-item-8 { color: #0F2A38; background: ;  border-collapse: separate;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }

.corect{font-size: 11pt;}

</style></head>
<body>
<div id="art-main">
    <div id="art-header-bg">
            </div>
    <div class="art-sheet clearfix">
<header class="art-header">

    <div class="art-shapes">
        
            </div>

<h1 class="art-headline">
    <a href="index.php">Личный кабинет</a>
</h1>

 
</header>
<nav class="art-nav">

        <?php include("blocks/panel_menu.php");     ?>

    </nav>
<div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                <h2 class="art-postheader">Главная</h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">
                    <div class="art-content-layout layout-item-0">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-1" style="width: 50%" >
        <p style="text-align: left;">
            <a href="test.php"><img width="128" height="128" alt=""  src="images/Card_file_bw.png">
                <span style="font-family: 'Lucida Sans Unicode'; font-size: 22px; color: rgb(27, 75, 101);">
                    <span style="color: #1B4B65;">Мои</span> <span style="color: #1B4B65;">проект</span>ы</span></a></p>
                    <p class='corect'><span style="color: rgb(27, 75, 101);">В данном разделе Вы можете посмотреть свои тесты, изменить, а так же создать новые.</span></p>
    </div>
    <div class="art-layout-cell layout-item-2" style="width: 50%" >
        <p style="text-align: right;"><span style="font-family: 'Lucida Sans Unicode';"><a href='test/new_test.php'><span style="font-size: 22px; color: #1B4B65;">Создать новый тест</span><span style="font-size: 16px;"><img width="160" height="160" alt="" src="images/green1.png"></a></span></span><span style="color: rgb(48, 63, 80);"><br></span></p>
    </div>
    </div>
</div>
<div class="art-content-layout layout-item-3">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-4" style="width: 100%" >
        <p><br></p>
    </div>
    </div>
</div>
<div class="art-content-layout layout-item-5">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-6" style="width: 33%" >
        <p style="text-align: center;"><a href="testgo.php"><span style="font-family: 'Lucida Sans Unicode'; font-size: 22px; color: #1B4B65;">Пройти тест<img width="120" height="127" alt="" src="images/Notepad-117597_640.png"></a></span><br></p>


    </div><div class="art-layout-cell layout-item-6" style="width: 33%" >
        <p style="text-align: center;"><a href="tuning.php"><span style="font-family: 'Lucida Sans Unicode'; font-size: 22px; color: #1B4B65;">Настройки<img width="128" height="128" alt="" src="images/w512h5121380477044settings.png"></a></span></p>
    </div>
    </div>
</div>

</div>


</article></div>
                    </div>
                </div>
            </div><footer class="art-footer">

<p>Д.К. © 2018-2019</p>
</footer>

</body></html>