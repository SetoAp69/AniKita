<?php 
session_start();
include("../../../login-signup/connection.php");
include("../../../login-signup/functions.php");
$username = $_SESSION['user_name'];
$userRate = 0;
$rate = 0;
$rate_count = 0;
$avg_rate =0;
$query = "SELECT rate FROM rating_table WHERE username='$username' AND object_id='OB004' LIMIT 1";
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
    $rate = mysqli_fetch_assoc($result)['rate'];

}



$query1 = "SELECT COUNT(rate) 'rate_count' FROM rating_table WHERE object_id='OB004' GROUP BY(object_id)";
$result1 = mysqli_query($con, $query1);


if(mysqli_num_rows($result1)>0){
    $rate_count = mysqli_fetch_array($result1)['rate_count'];
}


$query2 = "SELECT ROUND(AVG(rate),2) 'avg_rate' FROM rating_table WHERE object_id='OB004' GROUP BY(object_id)";
$result2 = mysqli_query($con, $query2);
if(mysqli_num_rows($result2)>0){
    $avg_rate = mysqli_fetch_array($result2)['avg_rate'];
}

?>
<style>
    body{
        margin : 0
        
    }
    .topnavigation{
        position: relative;
        overflow:hidden;
        background-color: cornflowerblue;
        width: 100%;
    }
    .topnavigation a{
        float: left;
        color: whitesmoke;
        text-align: center;
        padding: 14px 16px;
        text-decoration:none;
        font-size: 17px
    }
    .topnavigation a:hover{
        background-color: #ddd;
        color: black;
    }
    .topnavigation a.active{
        background-color: hotpink;
        color:white;
    }
    .picture{
        background-color:none;
        width:225px;
        height:319px;
        
    }
    .content{
        margin:30px;
    }
    .information-box{
        width: 100%;
        height: 25px;
        
        margin-top: 5px;
        
    }
    .information-value{
        float: left;
        

    }
    
    .information-data{
        font-weight: bold;
        float: left;
        width: 110px;
    }
    .colon{
        font-weight: bold;
        float:left;
        width: 5px;
    }
    .right-content{
        margin-top:56px;
    }
    .score-box{
        background-color: cornflowerblue;
        font-weight: bold;
        text-align: center;
        color: white;
        width: 60px;
        height: 20px;
        border-radius: 5px;
        
        
    }
    .user-score-box{
        background-color: hotpink;
        font-weight: bold;
        text-align: center;
        color: white;
        width: 100px;
        height: 20px;
        border-radius: 5px;

    }
    .score{
        font-size: 50px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-weight: bold;
        
    }
    .custom-heading{
        font-weight: bold;
        font-size: 22px;
    }
    .add-btn{
        background-color: cornflowerblue;
        color: white;
        text-decoration: none;
        font-size: 50px;
        font-weight: bold;
        padding: 0 15 0 15;
        border-radius: 15px ;
        

    }
    .cast-pic{
        
        width:50px;
        height:71px;

    }
    .va{
        text-align: right;
    }
    .footer{
        position: relative;
        float:bottom;
        bottom: 0px;
        
        width: 100%;
        height: 180px;
        background: cornflowerblue;
        overflow: hidden;
    }
    .footer .section{
        position: relative;
        width: 32%;
        height:155px;
        margin:0.2%;
        background-color: cornflowerblue;
        box-sizing: border-box;
        overflow: hidden;
        float:left;

    }
    .footer .section .content{
        top: 20px;
        color: white;

    }
    .footer .section .content .icon{
        width: 40px;
        height: 30px;
    }
    
    
</style>

<!DOCTYPE HTML> 
<html>
    <title>
        Neon Genesis Evangelion
    </title>
    <head>

    </head>
    <body>
    <div class="topnavigation">
            <a href="../../../Pages/Dashboard/index.php">Home</a>
            <a href="../../../Pages/MyProfile/index.php" >Profile</a>
            <a class="active"  href="../../../Pages/Anime/index.php"> Anime</a>
            <a href="../../../Pages/Manga/index.php">Manga</a>
            <a href="../../../Pages/Drama/index.php">Drama</a>
            
            <div style="float: right;">
                <a href="../../../login-signup/logout.php">Logout</a>
            </div>
    </div>

    <div class="content" >
        
        <table style="border:0;" cellpading="0" cellspacing="0" width="100%">
            <tbody>
                <tr>
                    <td width="225" style="border-width:0 10px 0 0; border-color: black; " valign="top">
                        <h2 class="title">Neon genesis Evangelion</h3>
                        <div class="picture">
                            <img class="picture" src="Poster.jpg" alt="">
                        </div>
                        <div class="custom-heading" style="font-weight: bold;">
                            Information
                        </div>
                        <div class="information-box">
                            <div class="information-data"> 
                                Episode
                            </div>
                            <div class="colon">:</div>
                            <div class="information-value">
                                26
                            </div>
                        </div>
                        <div class="information-box">
                            <div class="information-data"> 
                                Release 
                            </div>
                            <div class="colon">:</div>
                            <div class="information-value">
                                4 oct 2996
                            </div>
                        </div>
                        <div class="information-box">
                            <div class="information-data"> 
                                Studio
                            </div>
                            <div class="colon">:</div>
                            <div class="information-value">
                                Gainax
                            </div>
                        </div>
                        <div class="information-box">
                            <div class="information-data"> 
                                Status
                            </div>
                            <div class="colon">:</div>
                            <div class="information-value">
                                Finished Airing
                            </div>
                        </div>
                        


                    </td>

                    <td valign="top" style="padding-left: 10px; border-left: 2px solid #CDDEEE;">
                        
                        <div class="right-content">
                            <table style="border:0;" cellpading="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td valign="top">
                                            <table style="border-bottom: 2px solid #CDDEEE;" width="100%">
                                                <tbody style="border: 1px solid">
                                                <col width="200px">
                                                <col width="200px">
                                                <col width="200px">
                                                
                                                    <tr style="border: 1px solid #CDDEEE; ">
                                                        <td >
                                                            <div class="score-box"> Score</div>
                                                        </td>
                                                        <td > <div class="user-score-box"> Your Rate</div> </td>
                                                        <td > </td>


                                                        
                                                    </tr>
                                                    <tr>
                                                       <td class="score"> <?=$avg_rate;?></td>
                                                       <td class="score" style="font-weight: lighter ;"> <?=$rate;?></td>  
                                                       <td > 
                                                        <a href="../../../Pages/Anime/add.php?id=OB004" class="add-btn">+</a>
                                                         </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <?=$rate_count;?> users</td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-bottom: 2px solid #CDDEEE;">
                                            <div class="custom-heading"> Synopsis </div>
                                            <div class="synopsis-container"> 
                                                <p>Fifteen years after a cataclysmic event known as the Second Impact, the world faces a new threat: monstrous celestial beings called "Angels" invade Tokyo-3 one by one. Mankind is unable to defend themselves against the Angels despite utilizing their most advanced munitions and military tactics. The only hope for human salvation rests in the hands of NERV, a mysterious organization led by the cold Gendou Ikari. NERV operates giant humanoid robots dubbed "Evangelions" to combat the Angels with state-of-the-art advanced weaponry and protective barriers known as Absolute Terror Fields.
</p> 
                                                <p>
                                                Years after being abandoned by his father, Shinji Ikari, Gendou's 14-year-old son, returns to Tokyo-3. Shinji undergoes a perpetual internal battle against the deeply buried trauma caused by the loss of his mother and the emotional neglect he suffered at the hands of his father. Terrified to open himself up to another, Shinji's life is forever changed upon meeting 29-year-old Misato Katsuragi, a high-ranking NERV officer who shows him a free-spirited maternal kindness he has never experienced.
</p>
                                                <p>A devastating Angel attack forces Shinji into action as Gendou reveals his true motive for inviting his son back to Tokyo-3: Shinji is the only child capable of efficiently piloting Evangelion Unit-01, a new robot that synchronizes with his biometrics. Despite the brutal psychological trauma brought about by piloting an Evangelion, Shinji defends Tokyo-3 against the angelic threat, oblivious to his father's dark machinations.
</p>
                                                <br>
                                            </div>
                                        </td>
                                        
                                       

                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-heading"> Character & Voice Actors</div>
                                            <br>
                                            <div>
                                                <table>
                                                    <tbody>
                                                        <col width="50px">
                                                        <col width="150px">
                                                        <col width="150px">
                                                        <col width="50px">
                                                        <col width="10px">
                                                        <col width="50px">
                                                        <col width="150px">
                                                        <col width="150px">
                                                        <col width="50px">
                                                        <tr >
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>Souryuu, Asuka Langley</td>
                                                            <td class="va">Miyamura, Yuko</td>
                                                            <td class="cast-pic"> <img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td></td>
                                                            <td class="cast-pic"> <img class="cast-pic" src="Icon.png" alt=""> </td>
                                                            <td >Ikari, Shinji</td>
                                                            <td class="va">Ogata,  megumi</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            
                                                            
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>Ayanami, Rei</td>
                                                            <td class="va">Hayashibara, Megumi</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td></td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td >Katsuragi,  Misato</td>
                                                            <td class="va"> Mitsuishi, Kotonos</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            
                                                            
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>Pen pen</td>
                                                            <td class="va">Hayashibara, Megumi</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td></td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td >Ikari, Getou</td>
                                                            <td class="va">Tachiki, Fumihiko</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            
                                                            
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td> Kaji, Ryouji</td>
                                                            <td class="va">Yamadera, Kouichi</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td></td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td >Akagi, Ritsuko</td>
                                                            <td class="va">Yamaguchi, Yuriko</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            
                                                            
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>Suzuhara, Touji</td>
                                                            <td class="va">Seki, Tomokazu</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td></td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td >Nagisa,  Kaworu</td>
                                                            <td class="va">Ishida, Akira</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            
                                                            
                                                        </tr>
                                                        
                                                    </tbody>

                                                </table>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        

                    </td>
                </tr>
            </tbody>

        </table>

    </div>
    <br>
    <br>
    <div class="footer">
        <div class="section"> 
            <div class="content">
                <img src="" alt="">

            </div>
        </div>
        <div class="section">
            <div class="content">
                <h3>Follow Us On</h3>
                <a href=""style="margin:5px;">
                    <img class="icon" src="../../../Assets/discord.png" alt="">
                </a>
                <a href=""style="margin:5px;">
                    <img class="icon" src="../../../Assets/discord.png" alt="">
                </a>
                <a href=""style="margin:5px;">
                    <img class="icon" src="../../../Assets/discord.png" alt="">
                </a>
                <a href="" style="margin:5px;">
                    <img class="icon" src="../../../Assets/discord.png" alt="">
                </a>
            </div>
        </div>
        <div class="section">
            <div class="content">
                <h3>More About Us </h3>
                <div style="float: left;">
                    <a href=""style="color:white">About</a> <br> <br>
                    <a href="" style="color:white">Faq</a><br> <br>
                    <a href="" style="color:white">Support</a><br> <br>
                </div>
                <div style="float:left; margin-left:20px;">
                    <a href="" style="color:white">Privacy</a><br> <br>
                    <a href="" style="color:white">Cookie</a><br> <br>
                </div>
                
                
            </div>
        </div>
    </div>
    
        
    </body>
</html>
