<?php 
session_start();
include("../../login-signup/connection.php");
include("../../login-signup/functions.php");


$user_data =check_login($con);
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
    table{
        table-layout: fixed;
        margin:0 auto;
        border: 1px white;
    }
    td{
        background-color: #D2DAFF;
        border: 1px white;
        overflow: hidden;
    }
    th{
        background-color: hotpink;
        color: white;
    }
    th, td{
        font-weight: bold;
        border: none;
        padding: 10px;
        text-align: center;
        overflow: hidden;

    }
    td{
        font-weight: lighter;
        overflow: hidden;
        color: black;
    }
    .table-button{
        background: hotpink;
    }
    .rate_popup{
        display: none;
    }
    .searchBarContainer{
        
        width: 600px;
        height: 80px;
        float: right;
        margin-right: 2%;
        margin-top: 20px;


    }
    .searchBar{
        justify-content: center;
        margin-left: 5%;
        margin-top: 2%;
    }
    .form-control{
        text-align: center;
        background-color: lightgray;
        border: none;
        line-height: 40px;
        width: 450px;
        border-radius: 5px;
    }
    .searchButton{
        height:40px;
        background-color: hotpink;
        color: white;
        border: none;
        border-radius: 5px;

    }
    .table-btn-col{
        text-align: left;
        margin-left: 5%;
        

    }
    .add-btn{
        margin-left: 18%;
        text-align: center;
        background-color: cornflowerblue;
        width: 50px;
        height: 25px;
        float: left;
    }
    .table-btn-del{
        margin-right: 18%;
        float: right;
        text-align: center;
        background-color: salmon;
        width: 50px;
        height: 25px;

    }
    .ref{
        color: white;
    }
</style>
<html>
    <title> </title>
    <head> </head>
    <body>
        <div class="topnavigation">
            <a href="../Dashboard/index.php">Home</a>
            <a href="../MyProfile/index.php" >Profile</a>
            <a href="../Anime/index.php"> Anime</a>
            <a href="../Manga/index.php">Manga</a>
            <a class="active"   href="../Drama/index.php">Drama</a>
            
            <div style="float: right;">
                <a href="../../login-signup/logout.php">Logout</a>
            </div>
        </div>
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
        <div class="searchBarContainer">
            <form action="" method="GET" class="searchBar" >
                <div class="searchBar">

                    <input type="text" name='search' value="<?php if(isset($_GET['search']) ){echo $_GET['search'];}?>" class="form-control" placeholder="Search">
                    <button type="submit" class="searchButton">Search</button>
                </div>  

            </form>
            
        </div>
        <br>  <br><br>  <br><br>  <br>  <br>


        <div>
            <div>
                <div>
                    <table>
                        <thead>
                                <col width="5%"  />
                                <col width="30%"/>
                                <col width="20%"/>
                                <col width="10%"/>
                                <col width="10%"/>
                                <col width="25%"/>
                            <tr>
                                <th>ID</th>
                                <th> Name </th>
                                <th> Producer </th>
                                <th> Average Rating </th>
                                <th>Total Rate Count</th>
                                
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(isset($_GET['search']))
                            {
                                $filtervalues=$_GET['search'];
                                $searchQuery="SELECT object.name 'name', object.type_id 't_id' ,object.object_id 'id', author.name 'Producer',  ROUND(AVG(rating_table.rate),2) 'avg_rate', COUNT(rating_table.rate) 'rate_count'
                                FROM 
                                author JOIN object USING(author_id)
                                LEFT JOIN 
                                rating_table USING(object_id) 
                                WHERE object.type_id='3' AND object.name LIKE '%$filtervalues%'
                                GROUP BY (object.object_id) ";
                                $searchResult=mysqli_query($con,$searchQuery);

                                if(mysqli_num_rows($searchResult)>0){
                                    foreach ($searchResult as $rows) {
                                        ?>
                                        <tr>
                                            <td><?=$rows['id'];?> </td>
                                            <td> <a style="color: black; font-weight: bold;" href="../../Object/<?=$rows['t_id'];?>/<?=$rows['id'];?>/index.php"> <?=$rows['name'];?> </a>  </td>
                                            <td><?=$rows['Producer'];?> </td>
                                            <td><?=$rows['avg_rate'];?> </td>
                                            <td><?=$rows['rate_count'];?> </td>
                                            <td class="table-btn-col">
                                                <div class="add-btn">
                                                    <a class="ref" href="add.php? id=<?=$rows['id'];?>">add </a> 
                                                    
                                                
                                                </div>
                                                
                                                
                                                
                                                
                                            </td>
                                        </tr>

                                        <?php
                                    }

                                }

                            }
                            else{
                                ?> <?php 
                                $query1="SELECT object.name 'name', object.type_id 't_id' ,object.object_id 'id', author.name 'Producer',  ROUND(AVG(rating_table.rate),2) 'avg_rate', COUNT(rating_table.rate) 'rate_count'
                                FROM 
                                author JOIN object USING(author_id)
                                LEFT JOIN 
                                rating_table USING(object_id) 
                                WHERE object.type_id='3'
                                GROUP BY (object.object_id) ";
                                $result=mysqli_query($con,$query1);

                                if(mysqli_num_rows($result)>0){
                                    foreach($result as $rows){
                                        ?>
                                        <tr>
                                            <td><?=$rows['id'];?> </td>
                                            <td> <a style="color: black; font-weight: bold;" href="../../Object/<?=$rows['t_id'];?>/<?=$rows['id'];?>/index.php"> <?=$rows['name'];?> </a>  </td>
                                            <td><?=$rows['Producer'];?> </td>
                                            <td><?=$rows['avg_rate'];?> </td>
                                            <td><?=$rows['rate_count'];?> </td>
                                            <td class="table-btn-col">
                                                <div class="add-btn">
                                                    <a class="ref" href="add.php? id=<?=$rows['id'];?>">add </a> 
                                                    
                                                
                                                </div>

                                                
                                                
                                            </td>
                                        </tr>

                                        <?php

                                    }
                                }




                                

                                ?>
                                <?php
                            }


                            ?>
                            

                        </tbody>

                    </table>
                </div>
                
            </div>
        </div>

        <br>
        <br>




        <br>  <br><br>  <br><br>  <br><br>  <br>
        <br>  <br><br>  <br><br>  <br><br>  <br><br>  <br><br>  <br><br>  <br><br>  <br><br>  <br><br>  <br><br>  <br><br>  <br>
        <div class="footer">
        <div class="section"> 
            <div class="content">
                <h2>Follow Us on </h2>
                <a href=""style="margin:5px;">
                    <img class="icon" src="../discord.png" alt="">
                </a>
                <a href=""style="margin:5px;">
                    <img class="icon" src="../discord.png" alt="">
                </a>
                <a href=""style="margin:5px;">
                    <img class="icon" src="../discord.png" alt="">
                </a>
                <a href="" style="margin:5px;">
                    <img class="icon" src="../discord.png" alt="">
                </a>
            </div>
        </div>
        <div class="section">
            <div class="content">
                <h3>Follow Us on </h3>
            </div>
        </div>
        
        

        <div class="section">
            <div class="content">
                <h3>Follow Us on </h3>
                <div style="float: left;">
                    <a href=""style="color:white">About</a> <br> <br>
                    <a href="" style="color:white">Faq</a><br> <br>
                    <a href="" style="color:white">Support</a><br> <br>
                </div>
                <div style="float:left; margin-left:1px;">
                    <a href="" style="color:white">Privacy</a><br> <br>
                    <a href="" style="color:white">Cookie</a><br> <br>
                </div>
                
                
            </div>
        </div>
    </div>
    </body>
</html>