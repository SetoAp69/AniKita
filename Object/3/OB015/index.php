<?php 
session_start();
include("../../../login-signup/connection.php");
include("../../../login-signup/functions.php");
$username = $_SESSION['user_name'];
$userRate = 0;
$rate = 0;
$rate_count = 0;
$avg_rate =0;
$query = "SELECT rate FROM rating_table WHERE username='$username' AND object_id='OB015' LIMIT 1";
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
    $rate = mysqli_fetch_assoc($result)['rate'];

}



$query1 = "SELECT COUNT(rate) 'rate_count' FROM rating_table WHERE object_id='OB015' GROUP BY(object_id)";
$result1 = mysqli_query($con, $query1);


if(mysqli_num_rows($result1)>0){
    $rate_count = mysqli_fetch_array($result1)['rate_count'];
}


$query2 = "SELECT ROUND(AVG(rate),2) 'avg_rate' FROM rating_table WHERE object_id='OB015' GROUP BY(object_id)";
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
    .va{
        text-align: right;
    }
    .title{
        font-weight: bold;
        font-size: 30px;
    }
    .cast{
        color:cornflowerblue;
        font-weight:bold;
        font-size:20px;
    }
    .role{
        font-size:15px;
    }
    
    
</style>

<!DOCTYPE HTML> 
<html>
    <title>
        Juhan Shuttai!
    </title>
    <head>

    </head>
    <body>
    <div class="topnavigation">
            <a href="../../../Pages/Dashboard/index.php">Home</a>
            <a href="../../../Pages/MyProfile/index.php" >Profile</a>
            <a href="../../../Pages/Anime/index.php"> Anime</a>
            <a href="../../../Pages/Manga/index.php">Manga</a>
            <a class="active"  href="../../../Pages/Drama/index.php">Drama</a>
            
            <div style="float: right;">
                <a href="../../../login-signup/logout.php">Logout</a>
            </div>
    </div>

    <div class="content" >
        
        <table style="border:0;" cellpading="0" cellspacing="0" width="100%">
            <tbody>
                <tr>
                    <td width="260" style="border-width:0 10px 0 0; border-color: black; " valign="top">
                        <h2 class="title">Juhan Shuttai!</h3>
                        <div class="picture">
                            <img class="picture" src="Poster.jpg" alt="">
                        </div>
                        <br>
                        <div class="custom-heading" style="font-weight: bold;">
                            Information
                        </div>
                        <div class="information-box">
                            <div class="information-data"> 
                                Episode
                            </div>
                            <div class="colon">:</div>
                            <div class="information-value">
                                10
                            </div>
                        </div>
                        <div class="information-box">
                            <div class="information-data"> 
                                Released 
                            </div>
                            <div class="colon">:</div>
                            <div class="information-value">
                                12 Apr 2016
                            </div>
                        </div>
                        <div class="information-box">
                            <div class="information-data"> 
                                Director
                            </div>
                            <div class="colon">:</div>
                            <div class="information-value">
                                Doi Nobuhiro
                            </div>
                        </div>
                        <div class="information-box">
                            <div class="information-data"> 
                                Status
                            </div>
                            <div class="colon">:</div>
                            <div class="information-value">
                                Finished
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
                                                        <a href="../../../Pages/Drama/add.php?id=OB015" class="add-btn">+</a>
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
                                                <p>
                                                Fukami Hiroki's younger sister was killed by a friend. Hiroki then meets the killer's sister, Toyama Futaba, 15 years after the incident. Both of their families have been burdened with grief, but through their meeting they struggle to find a brighter tomorrow. 
                                                </p> 
                                                
                                                <br>
                                            </div>
                                        </td>
                                        
                                       

                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-heading"> Cast & Characters </div>
                                            <br>
                                            <div>
                                                <table>
                                                    <tbody>
                                                        <col width="50px">
                                                        <col width="600px">
                                                        <col width="10px">
                                                        <col width="50px">
                                                        <col width="600px">
                                                        
                                                        <tr >
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>
                                                                <div class="cast">Kuroki, haru</div>
                                                                <div class="role">Kurosawa,  Kokoro</div>
                                                            </td>
                                                            <td></td>
                                                            <td class="cast-pic"> <img class="cast-pic" src="Icon.png" alt=""> </td>
                                                            <td>
                                                                <div class="cast">Matsushige, Yukata</div>
                                                                <div class="role">Wada, Yasuki </div>
                                                            </td>
                                                            
                                                            
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>
                                                                <div class="cast">Odagiri, Joe</div>
                                                                <div class="role">Iokibe, Kei</div>
                                                            </td>
                                                            <td></td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>
                                                                <div class="cast">Arakawa, Yoshiyoshi</div>
                                                                <div class="role">Mibu, Heita</div>
                                                            </td>
                                                            
                                                            
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>
                                                                <div class="cast">Sakaguchi, Kentaro</div>
                                                                <div class="role">Koizumi, Jun</div>
                                                            </td>
                                                            <td></td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>
                                                                <div class="cast">Yasuda, Jun</div>
                                                                <div class="role">Yasui, Noboru</div>
                                                            </td>
                                                            
                                                            
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>
                                                                <div class="cast">Kaname,  jun</div>
                                                                <div class="role">Narita, Melon</div>
                                                            </td>
                                                            <td></td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>
                                                                <div class="cast">Maeno,  Tomoya</div>
                                                                <div class="role">Hattan,  KAzuo</div>
                                                            </td>
                                                            
                                                            
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>
                                                                <div class="cast">Nakagawa, Taishi</div>
                                                                <div class="role">Otsuka, Shuko</div>
                                                            </td>
                                                            <td></td>
                                                            <td class="cast-pic"><img class="cast-pic" src="Icon.png" alt=""></td>
                                                            <td>
                                                                <div class="cast">Takatsuki, Sara</div>
                                                                <div class="role">Agarie, Kinu</div>
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
