<?php include("blocks/db.php");
 session_start(); 

if(isset($_REQUEST['id']))
 {$id=$_REQUEST['id'];}

             if(isset($_SESSION['user_id']))
                {
                    $loginCoCoder=$_SESSION['user_id'];
                     $login=base64_decode($loginCoCoder);  
                    echo "<input type='hidden' value='1' id='EntPolz'>";
                     $zaprosCheckTestActivTw=mysql_query("SELECT activTest FROM admin_test WHERE id='$id' AND nickname='$login'");
                     $rezZaprosCheckTestActivTw=mysql_fetch_array($zaprosCheckTestActivTw);
                    if($rezZaprosCheckTestActivTw!='')
                    {
                        $activTestCheck=1;    
                    }
                    else
                    {
                        $zaprosCheckTestActiv=mysql_query("SELECT activTest FROM admin_test WHERE id='$id' AND activTest='1'");
                    $rezZaprosCheckTestActiv=mysql_fetch_array($zaprosCheckTestActiv);      
                        if($rezZaprosCheckTestActiv!='')
                        {
                            $activTestCheck=1;
                        }
                          else
                        {
                            $activTestCheck=0;
                        }   
                    }
                }
                else
                {
                  $zaprosCheckTestActiv=mysql_query("SELECT activTest FROM admin_test WHERE id='$id' AND activTest='1'");
                    $rezZaprosCheckTestActiv=mysql_fetch_array($zaprosCheckTestActiv);      
                    if($rezZaprosCheckTestActiv!='')
                     {
                        $activTestCheck=1;
                    }
                    else
                    {
                        $activTestCheck=0;
                    }              
                }


                if($activTestCheck==1)
                {
                      $prokrt=mysql_query("SELECT * FROM question WHERE numberTest='$id'", $db);
                        $poluch=mysql_fetch_array($prokrt);

                        $KolProkrut=0;

                        do
                        {
                            $KolProkrut++;
                        }
                        while($poluch=mysql_fetch_array($prokrt));
            
                        echo "<input type='hidden' value='$KolProkrut' id='CountQuest'>";
                }





?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <meta charset="utf-8">
    <title>Тестирование</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <link rel="stylesheet" href="style.css" media="screen">
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>

        <script language='javascript' type="text/javascript">


            $(document).ready(function() 
            {
                var regul=$('#EntPolz').val();
                if(regul==1)
                {
                        $('.dalshe').fadeOut(100);
                        $('.scrit').fadeIn(100);  
                }
                else
                {
                     $('#polzovat').fadeIn(0);
                }

                var KolPr=$('#CountQuest').val();
                var preobrZnach=parseInt(KolPr);


                $('#polzovat').click(function(){

                    $(this).val('');

                });


                $('.dalshe').click(function(){

                    var d= $('#polzovat').val();

                      var mask= new RegExp ("^[A-Za-zА-Яа-я]{1,20}$");
                        var pr=mask.test(d);

                    if((d!='')&&(pr==1))
                    {
                        $('.dalshe').fadeOut(500);
                        $('#polzovat').fadeOut(500);
                        $('.scrit').fadeIn(500);                        
                    }
                    else
                    {
                        if(d=='')
                        {
                            alert('Поле не заполнено!');
                            $('#polzovat').css({'background-color':'red'});
                        }
                        else
                        {
                            alert('Поле заполнено не верно!');
                            $('#polzovat').css({'background-color':'red'});                     
                        }
                    }


                });

                var KolichProcrut;

                $('.next').click(function(){

                    KolichProcrut=preobrZnach+1;
                    $('#1').attr('id', KolichProcrut).fadeOut(1000).css('z-index', 0);
                        var n=1;
                        var i=1;
                        while (n<KolichProcrut)
                            {                                                               
                                i=n++;
                                // alert(i);
                                // alert(n);
                                $('#'+n).attr('id', i);
                                $('#1').fadeIn(2000).css('z-index', 1);

                            };  

                            $('#'+ KolichProcrut).attr('id', KolPr);

                });


                    var ert=KolPr;

                $('.back').click(function(){

                    KolichProcrut=preobrZnach+1;
                    $('#1').attr('id', KolichProcrut).fadeOut(1000).css('z-index', 0);
                    $('#' + KolPr).attr('id', 1).fadeIn(1000).css('z-index', 1);
                    
                    var x=ert;
                    var zc=ert-1;
                    // alert(zc);

                    while(x>2)
                    {
                        zc=x--;
                        $('#'+x).attr('id', zc);
                    }

                    $('#' + KolichProcrut).attr('id', 2);


                });



            $('#otpr').click(function()
            {

                alert('Ваш запрос обрабатывается, подождите пожалуйста');

            }); 

            var cl=0;

            $('.block-2').on('change', 'input[name=cheak\\[\\]]', function(){


                var p=$(this).map( function( index, element ) 
                                {return element.id;}).get();
                var prover=$('#B' + p).val();
                if(prover!=0)
                {
                    if(this.checked)
                    {
                        cl++;
                         $('#B' + p).val(cl);                
                    }
                    else
                    {
                        cl--;
                         $('#B' + p).val(cl);
                    }                   
                }
                else
                {
                    cl=0;
                        if(this.checked)
                        {
                            cl++;
                            $('#B' + p).val(cl);                
                        }
                        else
                        {
                            cl--;
                             $('#B' + p).val(cl);
                        }       
                }

            });


            });

    </script>

<style>

.block-1 
{
position: absolute;
margin-top: 0px;
z-index: 1;
width: 100%;
background: rgba(235, 244, 250, 0.6);

}

.block-2
{
position: absolute;
display:none;
width: 100%;
background: rgba(235, 244, 250, 0.6);
}

.scrit
{display:none;
background: rgba(235, 244, 250, 0.6);}
#but
{
    position: absolute;
    padding-top: 200px;
}

</style>    

</head>
<body>
<div id="art-main">
    <div class="art-sheet clearfix">

<div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content dopl"><article class="art-post art-article">
                                <h2 class="art-postheader">Тестирование</h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">
    <form action='rezultat.php' method='POST' name='frm'>


<div class='scrit'> 



<?php 
        
        if($activTestCheck==1)
        {
             $zaprosQuestion=mysql_query("SELECT * FROM question WHERE numberTest='$id'", $db);
            $rezZaprosQuestion=mysql_fetch_array($zaprosQuestion);

            $Vopr=$rezZaprosQuestion['id'];

            $zaprosOtvetQuest=mysql_query("SELECT * FROM variant_otv WHERE id_questions='$Vopr'", $db);
            $otvet=mysql_fetch_array($zaprosOtvetQuest);

            $dch=1;

            $Cdch=0;

            $chislo=1;

                echo "<input type='hidden' name='id_test' value='$id'>
                <div class='block-1' id='$dch'><p>$chislo) 
                        $rezZaprosQuestion[text]</p>

                        <input type='hidden' name='id_vopros[]' value='$rezZaprosQuestion[id]'>";

                $fl=$rezZaprosQuestion['fl'];
                $flag2=$rezZaprosQuestion['flag2'];

                if($flag2==0)
                {

                    if($fl!=0)
                        {

                                echo "<input type='hidden' name='VtFlag[]' value='$flag2'>";    
                                // echo "<input type='hidden' name='cheak[]' value=''>";    

                        do
                            {
                                echo "<p><input type='radio' name='idOtvet[$Cdch]' value='$otvet[id]'>$otvet[variant]</p>";
                            }
                            while($otvet=mysql_fetch_array($zaprosOtvetQuest));
                        }
                        else
                        {
                            echo "<input type='hidden' name='VtFlag[]' value='flag2'>"; 
                            echo "<input type='hidden' name='idOtvet[]' value=''>";
                            echo "<input type='text' size='20' name='otvettext[$Cdch]'>";   
                            // echo "<input type='hidden' name='cheak[]' value=''>";    
    
                        }
                }
                else
                {

                    echo "<input type='hidden' name='VtFlag[]' value='flag2'>";
                            // echo "<input type='hidden' name='cheak[]' value=''>";    

                    do
                        {
                            echo "<p><input type='checkbox' name='cheak[]' value='$otvet[id]'>
                            $otvet[variant]</p>";
                        }
                            while($otvet=mysql_fetch_array($zaprosOtvetQuest));
        
                        echo "<input type='hidden' name='KolvoOtvetovOtChbox[]' value='0' id='BCh$Cdch'>";


                }




                echo "</div>";


            $zaprosQuestionTw=mysql_query("SELECT * FROM question WHERE id!='$Vopr' AND numberTest='$id'", $db);
            $rezzaprosQuestionTw=mysql_fetch_array($zaprosQuestionTw);

        do
            {       
                $chislo++;
                
            $NovVopr=$rezzaprosQuestionTw['id'];

            $zaprosOtvetQuestTw=mysql_query("SELECT * FROM variant_otv WHERE id_questions!='$Vopr' AND id_questions='$NovVopr'", $db);
            $Botvet=mysql_fetch_array($zaprosOtvetQuestTw);       

                $dch++;
                $Cdch++;


                echo "<div class='block-2' id='$dch'><p>$chislo) 
                        $rezzaprosQuestionTw[text]</p>

                        <input type='hidden' name='id_vopros[]' value='$rezzaprosQuestionTw[id]'>";

                $Bfl=$rezzaprosQuestionTw['fl'];
                $Bflag2=$rezzaprosQuestionTw['flag2'];

                if($Bflag2!=1)
                {

                    if($Bfl!=0)
                        {
                                echo "<input type='hidden' name='VtFlag[]' value='$Bflag2'>";
                                        // echo "<input type='hidden' name='cheak[]' value=''>";    
    
    
                        do
                            {

                                echo "<p><input type='radio' name='idOtvet[$Cdch]' value='$Botvet[id]'>$Botvet[variant]</p>";
                            }
                            while($Botvet=mysql_fetch_array($zaprosOtvetQuestTw));
                        }
                        else
                        {
                            echo "<input type='hidden' name='VtFlag[]' value='$Bflag2'>";   

                            echo "<input type='hidden' name='idOtvet[]' value=''>";
                            echo "<input type='text' size='20' name='otvettext[$Cdch]'>";   

                                // echo "<input type='hidden' name='cheak[]' value=''>";    
            
                        }
                }
                else
                {
                            echo "<input type='hidden' name='VtFlag[]' value='$Bflag2'>";   
                                // echo "<input type='hidden' name='cheak[]' value=''>";    



                    do
                        {
                            echo "<p><input type='checkbox' name='cheak[]' value='$Botvet[id]' id='Ch$Cdch'>

                            $Botvet[variant]</p>";
                        }
                            while($Botvet=mysql_fetch_array($zaprosOtvetQuestTw));

                    echo "<input type='hidden' name='KolvoOtvetovOtChbox[]' value='0' id='BCh$Cdch'>";
        
                }




                echo "</div>";
            }
        while($rezzaprosQuestionTw=mysql_fetch_array($zaprosQuestionTw));
            $Vt=time();
            $ProxDate=date('Y-m-d H:i:s');
            $DateDan=date('Y-m-d');

             echo "<input type='hidden' name='PrDate' value='$DateDan'>";

                echo "<input type='hidden' name='Vtime' value='$Vt'>";
                echo "<input type='hidden' name='PrTime' value='$ProxDate'>";

                    echo "<input type='hidden' name='KolvoVoprs' value='$KolProkrut'>";       
        }



    ?>
            <div id='but'>

        <input type='button' value='Предыдущий' class='back' >
        <input type='button' value='Следущий вопрос' class='next'>
        <input type='submit' name='submit' id='otpr'>
            </div>
</div>
    <?php
     if($activTestCheck==1)
     {
        if(isset($login))
        {
           echo "<input type='text' size='20' name='polz' id='polzovat' value='$login' hidden>   "; 
        }
        else
        {
            echo "<input type='text' size='20' name='polz' id='polzovat' value='Введите ваше имя'>"; 
        } 
        echo "    <input type='button' value='Дальше' class='dalshe' >";
     }
     else
     {
         echo "Данный тест не доступен, для прохождения";
     }

    
    ?>
                            

</form>

                </div>


                        </div>


</article></div>
                    </div>
                </div>
            </div>
        </div>
      </div>  


</body></html>