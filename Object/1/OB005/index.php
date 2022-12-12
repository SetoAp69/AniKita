<?php 
session_start();
include("../../../login-signup/connection.php");
include("../../../login-signup/functions.php");
$username = $_SESSION['user_name'];
$userRate = 0;
$rate = 0;
$rate_count = 0;
$avg_rate =0;
$query = "SELECT rate FROM rating_table WHERE username='$username' AND object_id='OB005' LIMIT 1";
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
    $rate = mysqli_fetch_assoc($result)['rate'];

}



$query1 = "SELECT COUNT(rate) 'rate_count' FROM rating_table WHERE object_id='OB005' GROUP BY(object_id)";
$result1 = mysqli_query($con, $query1);


if(mysqli_num_rows($result1)>0){
    $rate_count = mysqli_fetch_array($result1)['rate_count'];
}


$query2 = "SELECT ROUND(AVG(rate),2) 'avg_rate' FROM rating_table WHERE object_id='OB005' GROUP BY(object_id)";
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
    .cast-pic{
        
        width:50px;
        height:71px;

    }
    .va{
        text-align: right;
    }
    
    
</style>

<!DOCTYPE HTML> 
<html>
    <title>
        Kimi no Na wa.
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
                        <h2 class="title">Kimi no Na wa.</h3>
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
                                1
                            </div>
                        </div>
                        <div class="information-box">
                            <div class="information-data"> 
                                Release 
                            </div>
                            <div class="colon">:</div>
                            <div class="information-value">
                                26 Aug 2016
                            </div>
                        </div>
                        <div class="information-box">
                            <div class="information-data"> 
                                Studio
                            </div>
                            <div class="colon">:</div>
                            <div class="information-value">
                                CoMix Wave Films
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
                                                        <a href="../../../Pages/Anime/add.php?id=OB005" class="add-btn">+</a>
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
                                                <p>Mitsuha Miyamizu, a high school girl, yearns to live the life of a boy in the bustling city of Tokyo—a dream that stands in stark contrast to her present life in the countryside. Meanwhile in the city, Taki Tachibana lives a busy life as a high school student while juggling his part-time job and hopes for a future in architecture.
</p> 
                                                <p>
                                                One day, Mitsuha awakens in a room that is not her own and suddenly finds herself living the dream life in Tokyo—but in Taki's body! Elsewhere, Taki finds himself living Mitsuha's life in the humble countryside. In pursuit of an answer to this strange phenomenon, they begin to search for one another.
</p>
                                                <p> Kimi no Na wa. revolves around Mitsuha and Taki's actions, which begin to have a dramatic impact on each other's lives, weaving them into a fabric held together by fate and circumstance.</p>
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
                                                            <td>Miyamizu, Mitsuha</td>
                                                            <td class="va">Kamishiraishi,  Mone</td>
                                                            <td class="cast-pic"> <img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td></td>
                                                            <td class="cast-pic"> <img class="cast-pic" src="Icon.png" alt=""> </td>
                                                            <td >Tachibana, Taki</td>
                                                            <td class="va">Kamiki, Ryunosuke</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            
                                                            
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>Yukino, Yukari</td>
                                                            <td class="va">Hanazawa,  Kana</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td></td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td >Miyamizu, Yotsuha</td>
                                                            <td class="va"> Tani, Kanon</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            
                                                            
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>Teshidawara, Katsuhiko</td>
                                                            <td class="va">Narita, Ryou</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td></td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td >Miyamizu, Hitoha</td>
                                                            <td class="va">Ichihara, Etsuko</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            
                                                            
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td> Fuji, Tsukasa</td>
                                                            <td class="va">Shimazaki, Nobunaga</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td></td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td >Natori, Sayaka</td>
                                                            <td class="va">Yuuki, Aoi</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            
                                                            
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>Takagi, Shinta</td>
                                                            <td class="va">Ishikawa, Kaito</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td></td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td >Okudera, Miki</td>
                                                            <td class="va">Nagasawa,  masami</td>
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
