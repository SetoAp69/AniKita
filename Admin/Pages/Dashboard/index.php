<?php
    session_start();
    include("../../../login-signup/connection.php");
    include("../../../login-signup/functions.php");

    $query="SELECT* FROM OBJECT";


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

<!DOCTYPE html>
<html>
    <title> 

    </title>
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
                <a href="../../../login-signup/logout.php">Logout</a>
            </div>
        </div>

        <br>
        <br>
        <div>
            <div>
                <div>
                    <table>
                        <thead>
                                <col width="5%"  />
                                <col width="30%"/>
                                <col width="25%"/>
                                <col width="15%"/>
                                
                                <col width="25%"/>
                            <tr>
                                <th>ID</th>
                                <th> Name </th>
                                <th> Type </th>
                                <th> Author </th>
                                
                                
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(isset($_GET['search']))
                            {
                                $filtervalues=$_GET['search'];
                                $searchQuery="SELECT* FROM OBJECT WHERE object_id LIKE '$filtervalues' ";
                                $searchResult=mysqli_query($con,$searchQuery);

                                if(mysqli_num_rows($searchResult)>0){
                                    foreach ($searchResult as $rows) {
                                        ?>
                                        <tr>
                                            <td><?=$rows['object_id'];?> </td>
                                            <td>  <?=$rows['name'];?> </td>
                                            <td><?=$rows['type_id'];?> </td>
                                            <td><?=$rows['author_id'];?> </td>
                            
                                            <td class="table-btn-col">
                                                <div class="add-btn">
                                                    <a class="ref" href="delete.php? id=<?=$rows['object_id'];?>">Delete </a> 
                                                    
                                                
                                                </div>
                                                <div class="add-btn">
                                                    <a class="ref" href="delete.php? id=<?=$rows['object_id'];?>">Edit </a> 
                                                    
                                                
                                                </div>
                                                
                                
                                                
                                            </td>
                                        </tr>

                                        <?php
                                    }

                                }

                            }
                            else{
                                ?> <?php 
                                $query1="SELECT * FROM object";
                                $result=mysqli_query($con,$query1);

                                if(mysqli_num_rows($result)>0){
                                    foreach($result as $rows){
                                        ?>
                                        <tr>
                                            <td><?=$rows['object_id'];?> </td>
                                            <td>  <?=$rows['name'];?> </td>
                                            <td><?=$rows['type_id'];?> </td>
                                            <td><?=$rows['author_id'];?> </td>
                            
                                            <td class="table-btn-col">
                                                <div class="add-btn">
                                                    <a class="ref" href="delete.php? id=<?=$rows['object_id'];?>">Delete </a> 
                                                    
                                                
                                                </div>
                                                <div class="add-btn">
                                                    <a class="ref" href="delete.php? id=<?=$rows['object_id'];?>">Edit </a> 
                                                    
                                                
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

        
        
    </body>


</html>