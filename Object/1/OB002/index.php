<?php 
session_start();
include("../../../login-signup/connection.php");
include("../../../login-signup/functions.php");
$username = $_SESSION['user_name'];
$userRate = 0;
$rate = 0;
$rate_count = 0;
$avg_rate =0;
$query = "SELECT rate FROM rating_table WHERE username='$username' AND object_id='OB002' LIMIT 1";
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
    $rate = mysqli_fetch_assoc($result)['rate'];

}



$query1 = "SELECT COUNT(rate) 'rate_count' FROM rating_table WHERE object_id='OB002' GROUP BY(object_id)";
$result1 = mysqli_query($con, $query1);


if(mysqli_num_rows($result1)>0){
    $rate_count = mysqli_fetch_array($result1)['rate_count'];
}


$query2 = "SELECT ROUND(AVG(rate),2) 'avg_rate' FROM rating_table WHERE object_id='OB002' GROUP BY(object_id)";
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
        Jujutsu Kaisen
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
                        <h2 class="title">One Piece</h3>
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
                                24
                            </div>
                        </div>
                        <div class="information-box">
                            <div class="information-data"> 
                                Release 
                            </div>
                            <div class="colon">:</div>
                            <div class="information-value">
                                3 October 2020
                            </div>
                        </div>
                        <div class="information-box">
                            <div class="information-data"> 
                                Studio
                            </div>
                            <div class="colon">:</div>
                            <div class="information-value">
                                MAPPA
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
                                                        <a href="../../../Pages/Anime/add.php?id=OB002" class="add-btn">+</a>
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
                                                <p>Idly indulging in baseless paranormal activities with the Occult Club, high schooler Yuuji Itadori spends his days at either the clubroom or the hospital, where he visits his bedridden grandfather. However, this leisurely lifestyle soon takes a turn for the strange when he unknowingly encounters a cursed item. Triggering a chain of supernatural occurrences, Yuuji finds himself suddenly thrust into the world of Curses—dreadful beings formed from human malice and negativity—after swallowing the said item, revealed to be a finger belonging to the demon Sukuna Ryoumen, the "King of Curses."
</p> 
                                                <p>
                                                Yuuji experiences first-hand the threat these Curses pose to society as he discovers his own newfound powers. Introduced to the Tokyo Metropolitan Jujutsu Technical High School, he begins to walk down a path from which he cannot return—the path of a Jujutsu sorcerer.
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
                                                            <td>Gojou, Satoru</td>
                                                            <td class="va">Nakamura, Yuuichi</td>
                                                            <td class="cast-pic"> <img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td></td>
                                                            <td class="cast-pic"> <img class="cast-pic" src="Icon.png" alt=""> </td>
                                                            <td >Itadori, Yuuji</td>
                                                            <td class="va">Enoki, Junya</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            
                                                            
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>Fushiguro, Megumi</td>
                                                            <td class="va">Uchida,  Yuuma</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td></td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td >Kugisaki, Nobara</td>
                                                            <td class="va"> Seto, Asami</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            
                                                            
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>Ryoumen, Sukuna</td>
                                                            <td class="va">Suwabe, Junichi</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td></td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td >Nanami, Kento</td>
                                                            <td class="va">Tsuda, Kenjirou</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            
                                                            
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td> Inumaki, Toge</td>
                                                            <td class="va">Uchiyama, Kouki</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td></td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td >Zenin, Maki</td>
                                                            <td class="va">Komatsu, Mikako</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            
                                                            
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>Toudou, Aoi</td>
                                                            <td class="va">Kimura, Subaru</td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td></td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td >Getou, Suguru</td>
                                                            <td class="va">Sakurai, Takahiro</td>
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
