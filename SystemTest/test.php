<?php include("blocks/db.php");
mysql_query('SET NAMES utf8');



  include("blocks/lock.php");

  

 
$TesKolich=-1;
             $testkolch=mysql_query("SELECT * FROM admin_test WHERE nickname='$loginCo'", $db);

             while($masProv=mysql_fetch_array($testkolch))
             {
                $TesKolich++;
             }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <meta charset="utf-8">
    <title>Мои тесты</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <link rel="stylesheet" href="style.css" media="screen">
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>

 <script language='javascript' type="text/javascript"> 
  var ZnachPerecluchat;

    function getXmlHttpRequest(){
            if (window.XMLHttpRequest) 
            {
                try 
                {
                    return new XMLHttpRequest();
                } 
                catch (e){}
            } 
            else if (window.ActiveXObject) 
            {
                try 
                {
                    return new ActiveXObject('Msxml2.XMLHTTP');
                } catch (e){}
                try 
                {
                    return new ActiveXObject('Microsoft.XMLHTTP');
                } 
                catch (e){}
            }
            return null;
    }

        function xz(PolZnachPerecl, NTest){
            
          var dannie=PolZnachPerecl;
          var NumberTest=NTest;

      var request = getXmlHttpRequest();

      request.onreadystatechange = function (){

      if (request.readyState == 4) {
      if (request.status == 200){

            } else document.write("Произошла ошибка. Обнови страничку");
        }
      }

      var url = 'togglElem.php?MyPerkl='+dannie+'&NumTestAdd='+NumberTest;

      request.open("GET", url, true);  
      request.setRequestHeader("Content-type", "charset=utf8");
      request.send(null);

        }



    $(document).ready(function() {

            var procrut=<?php echo "$TesKolich";?>;
            // alert(procrut);

     while(procrut!=-1)
       {
            $('#vtors'+ procrut).click(function(){
                        
                var znachVal=$(this).prev().val();
                // alert(znachVal);
                if(znachVal==1)
                {
                    $(this).prev().val('0');
                }
                else
                {
                    $(this).prev().val('1');
                }

                ZnachPerecluchat=$(this).prev().val();
                NamOb=$(this).prev().attr('name');
               var port=xz(ZnachPerecluchat,NamOb);
                // alert(ZnachPerecluchat);

                $(this).toggleClass('switch-on');

            });


                   var snpokz=$('#nayk'+ procrut).val();
                   // alert(snpokz);

                   if(snpokz==1)
                   {
                     $('#vtors'+ procrut).toggleClass('switch-on');
                   }
                   else
                   {
                     $('#vtors'+ procrut).toggleClass('switch-off');
                   }    
                   procrut--;            
       }


        });
    </script>   

<style>.art-content .art-postcontent-0 .layout-item-0 { border-spacing: 20px 0px; border-collapse: separate;  }
.art-content .art-postcontent-0 .layout-item-1 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;border-left-width:1px;border-top-color:#C3DFEF;border-right-color:#C3DFEF;border-bottom-color:#C3DFEF;border-left-color:#C3DFEF; color: #123344; background: #FFFFFF;background: rgba(255, 255, 255, 0.7); padding: 3px; vertical-align: top; border-radius: 20px;  }
.art-content .art-postcontent-0 .layout-item-2 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;border-left-width:1px;border-top-color:#C3DFEF;border-right-color:#C3DFEF;border-bottom-color:#C3DFEF;border-left-color:#C3DFEF; color: #102D3C; background: #DBECF5; padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px; border-radius: 20px;  }
.art-content .art-postcontent-0 .layout-item-3 { background: ;  }
.art-content .art-postcontent-0 .layout-item-4 { background: ; padding-right: 10px;padding-left: 10px;  }
.art-content .art-postcontent-0 .layout-item-5 { color: #0F2A38; background: ; border-spacing: 20px 0px; border-collapse: separate;  }
.art-content .art-postcontent-0 .layout-item-6 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;border-left-width:1px;border-top-color:#C3DFEF;border-right-color:#C3DFEF;border-bottom-color:#C3DFEF;border-left-color:#C3DFEF; color: #113040; background: #EBF4FA;background: rgba(235, 244, 250, 0.7); padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px; border-radius: 20px;  }
.art-content .art-postcontent-0 .layout-item-7 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;border-left-width:1px;border-top-color:#C3DFEF;border-right-color:#C3DFEF;border-bottom-color:#C3DFEF;border-left-color:#C3DFEF; color: #113040; background: #EBF4FA;background: rgba(235, 244, 250, 0.7); padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px; border-radius: 20px;  }
.art-content .art-postcontent-0 .layout-item-8 { color: #0F2A38; background: ;  border-collapse: separate;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }

#icatvnosti{
    margin-top: -50px;
margin-left: 90%;
width: 180px;
}


.switch-btn {
    display: inline-block;
    width: 72px; /* ширина */
    height: 38px; /* высота */
    border-radius: 19px; /* радиус скругления */
    background: #bfbfbf; /* цвет фона */
    z-index: 0;
    margin: 0;
    padding: 0;
    border: none;
    cursor: pointer;
    position: relative;
    transition-duration: 300ms; /* анимация */
}
.switch-btn::after {
    content: "";
    height: 32px; /* высота кнопки */
    width: 32px; /* ширина кнопки */
    border-radius: 17px;
    background: #fff; /* цвет кнопки */
    top: 3px; /* положение кнопки по вертикали относительно основы */
    left: 3px; /* положение кнопки по горизонтали относительно основы */
    transition-duration: 300ms; /* анимация */
    position: absolute;
    z-index: 1;
}
.switch-on {
    background: #118c4e;
}
.switch-on::after {
    left: 37px;
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
    <a href="index.php">Личный кабинет</a>
</h1>

            
</header>
<nav class="art-nav">
    <ul class="art-hmenu">
        <li><a href="index.php" class="">Главная</a></li>
        <li><a href="test.php" class="active">Мои проекты</a>
            <ul class="active">
                <li><a href="test/new_test.php">Создать новый тест</a></li>
<?php
           

            $VvodMenu=mysql_query("SELECT * FROM admin_test WHERE nickname='$loginCo'", $db);


            while($masMenu=mysql_fetch_array($VvodMenu))
            {
                 echo "<li><a href='test/test_id.php?id=$masMenu[id]'>$masMenu[nameTest]</a></li>";               
            }                
        



    ?>
            </ul>
        </li>
        <li><a href="testgo.php">Пройти тест</a></li>

        <li><a href="tuning.php">Настройки</a></li>
    </ul> 
    </nav>
<div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content">
                            <article class="art-post art-article">
                                <h2 class="art-postheader">Мои тесты</h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">
                    <p>
                     
        <?php

        $prok=1;
        $vtr=0;
        $schet=0;
            $zaprosInfTest=mysql_query("SELECT * FROM admin_test WHERE nickname='$loginCo'", $db);
            $rezZaprosInfTest=mysql_fetch_array($zaprosInfTest);

        if($rezZaprosInfTest['id']=='')
         {
             echo "Здесь будут видны все ваши тесты.<br> Пока у вас нет ни одного теста. Хотетите создать свой первый тест? <h3><a href='test/new_test.php'>Создать тест</a></h3>";
         }
         else
         {
                do
                {
                    
                    echo "<div class='art-content-layout layout-item-5'>
                              <div class='art-content-layout-row'>";
                    echo "<div class='art-layout-cell layout-item-6' style='width: 33%'>";
                      echo " <p><a href='test/test_id.php?id=$rezZaprosInfTest[id]'><h3>$prok) $rezZaprosInfTest[nameTest]</a><a href='test/test_id/question/edit_test.php?id=$rezZaprosInfTest[id]' title='Редактивароть тест'><img src='images/edit_icon.png' width='25' height='25'> </a></h3><a href='test/test_id.php?id=$rezZaprosInfTest[id]'><i class='comn'>$rezZaprosInfTest[comment]</i></a>";


                    echo "<div id='icatvnosti'> <form action='' method='' name='frm'>



                    <input type='hidden' value='$rezZaprosInfTest[activTest]' id='nayk$schet' name='$rezZaprosInfTest[id]'><div id='vtors$schet' class='switch-btn' onClick='z();'></form></div>";


                     echo " </div></p></div>";  

                            echo "</div></div>";             

                                echo "<div class='art-content-layout layout-item-3'>
                                             <div class='art-content-layout-row'>
                                            <div class='art-layout-cell layout-item-4' style='width: 100%' >
                                                <br>
                                            </div>
                                            </div>
                                     </div>";

                                $prok++;   
                                $schet++;                 
                            
            
                }
             while($rezZaprosInfTest=mysql_fetch_array($zaprosInfTest));
         }

        ?>
                    </p>

                </div>


</article></div>
                    </div>
                </div>
            </div>

            <footer class="art-footer">

<p>Д.К. © 2018-2019</p>
</footer>

</body></html>