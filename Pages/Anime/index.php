
<?php 
session_start();
include("../../login-signup/connection.php");
include("../../login-signup/functions.php");
$username = $_SESSION['user_name'];
$dataLimit = 10;
$totalData = 0;
$totalPage = 0;
$activePage = (isset($_GET["page"])) ? $_GET["page"] : 1;
$firstData = ($dataLimit) * ($activePage - 1);


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
    .pageNav{
        padding: 6px;
        background-color: hotpink;
        float:left;
        margin-left:5px;
        color:white;
        text-decoration: none;

    }
    .pageNav :hover{
        background-color:grey;
    }
    #active{
        background-color: cornflowerblue;
    }
    .pageNav-Container{
        float:right;
    }
</style>
<html>
    <title> </title>
    <head> 
        
    </head>
    <body>
        <div class="topnavigation">
            <a href="../Dashboard/index.php">Home</a>
            <a href="../MyProfile/index.php" >Profile</a>
            <a class="active"  href="index.php"> Anime</a>
            <a href="../Manga/index.php">Manga</a>
            <a href="../Drama/index.php">Drama</a>
            
            <div style="float: right;">
                <a href="../../login-signup/logout.php">Logout</a>
            </div>
        </div>
        <div style="padding-left: 5%; font-size:35px;">
            Anime Recommendation
        </div>
        <div class="container">
            <div class="box">
                
                    <img class="image" style="width:210px ;height:290px;" src="../../Object/1/OB001/One-piece-Poster.jpg" alt="">
                    <div class="content"> 
                        <h3>One Piece</h3>
                        <p> bla bla bla </p>
                        <a  href=" login.php" style="color: white;">Read More</a>

                    </div>
                
            
            </div>
            <div class="box">
                            
                    <img class="image" style="width:210px ;height:290px;" src="../../Object/1/OB002/Poster.jpg" alt="">
                    <div class="content"> 
                        <h3>Jujutsu Kaisen</h3>
                        <p> bla bla bla </p>
                        <a  href=" login.php" style="color: white;">Read More</a>

                    </div>
                

            </div>
            <div class="box">
                            
            <img class="image" style="width:210px ;height:290px;" src="../../Object/1/OB003/Poster.jpg" alt="">
                    <div class="content"> 
                        <h3>Tenki No Ko</h3>
                        <p> bla bla bla </p>
                        <a  href=" login.php" style="color: white;">Read More</a>

                    </div>

            </div>
            <div class="box">
                            
                    <img class="image" style="width:210px ;height:290px;" src="../../Object/1/OB004/Poster.jpg" alt="">
                    <div class="content"> 
                        <h3>Neon Genesis Evangelion</h3>
                        <p> bla bla bla </p>
                        <a  href=" login.php" style="color: white;">Read More</a>

                    </div>

            </div>
            <div class="box">
                            
            <img class="image" style="width:210px ;height:290px;" src="../../Object/1/OB005/Poster.jpg" alt="">
                    <div class="content"> 
                        <h3>Kimi No Nawa</h3>
                        <p> bla bla bla </p>
                        <a  href=" login.php" style="color: white;">Read More</a>

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
                    <table id="anime-table">
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
                                <th> Studio </th>
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
                                $totalSearchData = mysqli_query($con,"SELECT object.name 'name', object.type_id 't_id', author.author_id,
                                object.object_id 'id', author.name 'Studio',  ROUND(AVG(rating_table.rate),2) 'avg_rate',
                                 COUNT(rating_table.rate) 'rate_count'
                                FROM 
                                author JOIN object USING(author_id)
                                LEFT JOIN 
                                rating_table USING(object_id) 
                                WHERE object.type_id='1' AND object.name LIKE '%$filtervalues%'
                                GROUP BY (object.object_id) ORDER BY object_id");

                                

                                $searchQuery="SELECT object.name 'name', object.type_id 't_id', author.author_id,
                                object.object_id 'id', author.name 'Studio',  ROUND(AVG(rating_table.rate),2) 'avg_rate',
                                 COUNT(rating_table.rate) 'rate_count'
                                FROM 
                                author JOIN object USING(author_id)
                                LEFT JOIN 
                                rating_table USING(object_id) 
                                WHERE object.type_id='1' AND object.name LIKE '%$filtervalues%'
                                GROUP BY (object.object_id) ORDER BY object_id LIMIT $firstData,$dataLimit";

                                $searchResult=mysqli_query($con,$searchQuery);

                                $totalData = mysqli_num_rows($totalSearchData);
                                $totalPage = ceil($totalData / $dataLimit);

                                if(mysqli_num_rows($searchResult)>0){
                                    foreach ($searchResult as $rows) {
                                        ?>
                                        <tr>
                                            <td><?=$rows['id'];?> </td>
                                            <td> 
                                                <a style="color: black; font-weight: bold;" href="../../Object/<?=$rows['t_id'];?>/<?=$rows['id'];?>/index.php">
                                                 <?=$rows['name'];?> 
                                                </a>  
                                            </td>
                                            <td>
                                                 <a style="color: black; font-weight: bold; " href="index-by-author.php? id=<?=$rows['author_id'];?>"> 
                                                 <?=$rows['Studio'];?> 
                                                </a> 
                                            </td>
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
                                //display all data
                                ?> <?php 
                                $queryx="SELECT* FROM object where type_id='1' ";
                                $result1=mysqli_query($con,$queryx);
                                $totalData = mysqli_num_rows($result1);
                                $totalPage = ceil($totalData / $dataLimit);
                                $query1="SELECT object.name 'name', object.type_id 't_id' ,object.object_id 'id', 
                                author.name 'Studio',  author.author_id,
                                ROUND(AVG(rating_table.rate),2) 'avg_rate', COUNT(rating_table.rate) 'rate_count'
                                FROM 
                                author JOIN object USING(author_id)
                                LEFT JOIN 
                                rating_table USING(object_id) 
                                WHERE object.type_id='1'
                                GROUP BY (object.object_id) LIMIT $firstData, $dataLimit ";
                                $result=mysqli_query($con,$query1);

                                if(mysqli_num_rows($result)>0){
                                    foreach($result as $rows){
                                        ?>
                                        <tr>
                                            <td><?=$rows['id'];?> </td>
                                            <td>
                                                <a style="color: black; font-weight: bold;" href="../../Object/<?=$rows['t_id'];?>/<?=$rows['id'];?>/index.php"> 
                                                    <?=$rows['name'];?>
                                                 </a>  
                                            </td>
                                            <td>
                                                 <a style="color: black; font-weight: bold; " href="index-by-author.php? id=<?=$rows['author_id'];?>"> 
                                                 <?=$rows['Studio'];?> 
                                                </a> 
                                            </td>
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
                    <br>
                    

                </div>
                <div class="pageNav-Container">
                <?php
                        for ($i = 1; $i <= $totalPage;$i++) {
                            if($i==$activePage){
                                if(isset($_GET['search'])){
                                    $filtervalues = $_GET['search'];
                                    ?>
                                    <a class="pageNav" id="active"  href="?page=<?= $i; ?>&search=<?=$filtervalues;?>"> <?=$i;?></a>
                                    <?php
    
                                }
                                else{
                                    ?>
                                    <a class="pageNav" id="active" href="?page=<?=$i;?>"><?= $i;?></a>
    
                                    <?php
                                }

                            }
                            else{
                                if(isset($_GET['search'])){
                                    $filtervalues = $_GET['search'];
                                    ?>
                                    <a class="pageNav" href="?page=<?= $i; ?>&search=<?=$filtervalues;?>"> <?=$i;?></a>
                                    <?php
                                    
    
                                }
                                else{
                                    ?>
                                    <a class="pageNav" href="?page=<?=$i;?>"><?= $i;?></a>
    
                                    <?php
                                }

                            }
                            

                        }
                        

                    ?>

                </div>

                
            </div>
        </div>

        <br>
        <br>
        <br>
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