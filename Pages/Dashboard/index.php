<?php
session_start();
    
    include("../../login-signup/connection.php");
    include("../../login-signup/functions.php");


    $user_data =check_login($con);
    $get_object=mysqli_query($con,"SELECT*FROM object WHERE name ='One Piece'");
    $assoc=mysqli_fetch_assoc($get_object);
    $destination="../Object/2/".$assoc['object_id']."/index.php";
    
    
    
   
    

?>

<!DOCTYPE html>
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
    .container{
        position: relative;
        width: 1200px;
        height: 325px;
        margin-left: 5%; auto;
        background: lightslategray;
    }
    .container .box{
        position: relative;
        width: calc(240px - 30px);
        height: calc(320px - 30px);
        background: black;
        float: left;
        margin: 15px;
        box-sizing: border-box;
        overflow: hidden;
        border-radius:5px;
    }
    .container .box .image{
        position: absolute;
        background: lightslategray;
        transition: 0.5s;
        z-index: 0;
        width:210px ;
        height:290px;
    }
    .container .box:hover .image{

        opacity: 0.4;
        

    }
    .container .box  .content{
        position: absolute;
        top: 230px;
        height: calc(100%-100px);
        text-align: Center;
        padding: 20%;
        box-sizing: border-box;
        transition: 0.5s;

    }
    .container .box:hover .content{
        top: 50px;
        transition: 1.5s;
        color: white;

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
<head> 
    <title>Anikita</title>
</head>
<body>
    
    <div class="topnavigation">
        <a class="active" href="index.php">Home</a>
        <a href="../Myprofile/index.php" >Profile</a>
        <a href="../Anime/index.php"> Anime</a>
        <a href="../Manga/index.php">Manga</a>
        <a href="../Drama/index.php">Drama</a>
        
        <div style="float: right;">
            <a href="../../login-signup/logout.php">Logout</a>
        </div>
    </div>

    <br>
    <br>
    <br>
    <div style="padding-left: 5%; font-size:35px;">
        Anime Recommendation
    </div>
    <div class="container">
            <div class="box">
                
                    <img class="image" style="width:210px ;height:290px;" src="../../Object/1/OB001/One-piece-Poster.jpg" alt="">
                    <div class="content"> 
                        <h3>One Piece</h3>
                        
                        <a  href="../../Object/1/OB001" style="color: white;">Read More</a>

                    </div>
                
            
            </div>
            <div class="box">
                            
                    <img class="image" style="width:210px ;height:290px;" src="../../Object/1/OB002/Poster.jpg" alt="">
                    <div class="content"> 
                        <h3>Jujutsu Kaisen</h3>
                        
                        <a  href="../../Object/1/OB002" style="color: white;">Read More</a><

                    </div>
                

            </div>
            <div class="box">
                            
            <img class="image" style="width:210px ;height:290px;" src="../../Object/1/OB003/Poster.jpg" alt="">
                    <div class="content"> 
                        <h3>Tenki No Ko</h3>
                        <a  href="../../Object/1/OB003" style="color: white;">Read More</a>

                    </div>

            </div>
            <div class="box">
                            
                    <img class="image" style="width:210px ;height:290px;" src="../../Object/1/OB004/Poster.jpg" alt="">
                    <div class="content"> 
                        <h3>Neon Genesis Evangelion</h3>
                        <a  href="../../Object/1/OB004" style="color: white;">Read More</a>

                    </div>

            </div>
            <div class="box">
                            
            <img class="image" style="width:210px ;height:290px;" src="../../Object/1/OB005/Poster.jpg" alt="">
                    <div class="content"> 
                        <h3>Kimi No Nawa</h3>
                        <a  href="../../Object/1/OB005" style="color: white;">Read More</a>
                    </div>

            </div>


        </div>


    </div>
    <br>
    <div style="padding-left: 5%; font-size:35px;">
        Manga Recommendation
    </div>
    <div class="container">
        <div class="box">
            <img class="image" src="../../Object/2/OB006/Poster.jpg" alt="">
            <div class="content"> 
                <h3>Bleach</h3>
                <a href="../../Object/2/OB006/index.php" style="color: white">Read More</a>
            </div>
        </div>
        <div class="box">
            <img class="image" src="../../Object/2/OB007/Poster.jpg" alt="">
            <div class="content"> 
                <h3>Shounen No Abyss</h3>
                <a href="../../Object/2/OB007/index.php" style="color: white">Read More</a>
            </div>
            
        </div>
        <div class="box">
            <img class="image" src="../../Object/2/OB008/Poster.jpg" alt="">
            <div class="content"> 
                <h3>Great Teacher Onizuka</h3>
                <a href="../../Object/2/OB008/index.php" style="color: white">Read More</a>
            </div>  
            
        </div>
        <div class="box">
            <img class="image" src="../../Object/2/OB009/Poster.jpg" alt="">
            <div class="content"> 
                <h3>Fairy Tail</h3>
                <a href="../../Object/2/OB009/index.php" style="color: white">Read More</a>
            </div>
            
        </div>
        <div class="box">
            <img class="image" src="../../Object/2/OB010/Poster.jpg" alt="">
            <div class="content"> 
                <h3>Made In Abyss</h3>
                <a href="../../Object/2/OB010/index.php" style="color: white">Read More</a>
            </div>
            
        </div>
    </div>
    <br>
    <div style="padding-left: 5%; font-size:35px;">
        Drama Recommendation
    </div>
    <div class="container">
        <div class="box">
            <img class="image" src="../../Object/3/OB011/Poster.jpg" alt="">
            <div class="content"> 
                <h3>Unnatural</h3>
                <p>bla bla bla</p>
                <a href="../../Object/3/OB011/index.php" style="color: white">Read More</a>
            </div>
            
            
        </div>
        <div class="box">
            <img class="image" src="../../Object/3/OB012/Poster.jpg" alt="">
            <div class="content"> 
                <h3>3 Nen A Gumi: Ima kara Mina-san wa, Hitojichi Desu</h3>
                <p>bla bla bla</p>
                <a href="../../Object/3/OB012/index.php" style="color: white">Read More</a>
            </div>
                
        </div>
        <div class="box">
            <img class="image" src="../../Object/3/OB013/Poster.jpg" alt="">
            <div class="content"> 
                <h3>Mother</h3>
                <p>bla bla bla</p>
                <a href="../../Object/3/OB013/index.php" style="color: white">Read More</a>
            </div>
                
        </div>
        <div class="box">
            <img class="image" src="../../Object/3/OB014/Poster.jpg" alt="">
            <div class="content"> 
                <h3>Soredemo Ikite Yuku</h3>
                <p>bla bla bla</p>
                <a href="../../Object/3/OB014/index.php" style="color: white">Read More</a>
            </div>
                
        </div>
        <div class="box">
            <img class="image" src="../../Object/3/OB015/Poster.jpg" alt="">
            <div class="content"> 
                <h3>Juhan Shuttai!</h3>
                <p>bla bla bla</p>
                <a href="../../Object/3/OB015/index.php" style="color: white">Read More</a>
            </div>
                
        </div>
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
                    <img class="icon" src="../../Assets/discord.png" alt="">
                </a>
                <a href=""style="margin:5px;">
                    <img class="icon" src="../../Assets/discord.png" alt="">
                </a>
                <a href=""style="margin:5px;">
                    <img class="icon" src="../../Assets/discord.png" alt="">
                </a>
                <a href="" style="margin:5px;">
                    <img class="icon" src="../../Assets/discord.png" alt="">
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