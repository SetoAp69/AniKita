<?php
    session_start();
    include("../../../login-signup/connection.php");
    include("../../../login-signup/functions.php");
    $dataLimit = 10;
    $totalData = 0;
    $totalPage = 0;
    $activePage = (isset($_GET["page"])) ? $_GET["page"] : 1;
    $firstData = ($dataLimit) * ($activePage - 1);


    


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
        width: 50%;
        height: 80px;
        margin: 0 auto;
        background: None;


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
        width: 60%;
        border-radius: 5px;
    }
    .searchButton{
        width: 15%;
        height:40px;
        background-color: hotpink;
        color: white;
        border: none;
        border-radius: 5px;

    }
    #pink-btn{
        text-align: center;
        width:15%;
        height:40px;
        background-color: hotpink;
        color: white;
        border: none;
        border-radius: 5px;
        margin-right: 5px;

    }
    .table-btn-col{
        text-align: left;
        margin-left: 5%;
        

    }
    .add-btn{
        margin-left: 14%;
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
    .objectButtonContainer{
        
        width: 400px;
        height: 80px;
        float: right;
        margin-right: 2%;
        margin-top: 20px;

    }
    .objectButtonContainer .objectButton{
        background-color: cornflowerblue;
        height: 70px;
        width: 70px;
        margin: 5px ;
        float:left;
        border-radius: 100%;
        display: flex; 
        justify-content: center;
    }
    .objectButtonContainer .objectButton:hover{
        background-color:lightseagreen;
        
    }
    #active{
        background-color: hotpink;
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
    #active2{
        background-color: cornflowerblue;
    }
    .pageNav-Container{
        float:right;
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
            <a href="../Dashboard/index.php">Object</a>
            <a class="active" href="../author/index-author.php" >Author</a>
            <div style="float: right;">
                <a href="../../../login-signup/logout.php">Logout</a>
            </div>
        </div>

        <br>
        <br>
        <div class="searchBarContainer">
            <form action="" method="GET" class="searchBar" >
                
              <div style="float: left; color:white; text-decoration: None;" id="pink-btn"> 
                  <a style="float: top; color:white; text-decoration: None; margin-top: 15%;" href="add.php">ADD</a>
              </div>
                <div class="searchBar">

                    <input type="text" name='search' value="<?php if(isset($_GET['search']) ){echo $_GET['search'];}?>" class="form-control" placeholder="Search">
                    <button type="submit" class="searchButton">Search</button>
                </div>  
            </form>
        <br> <br> <br> <br>
        <div>
            <div>
                <div>
                    <table>
                        <thead>
                                <col width="20%"  />
                                <col width="20%"/>
                                <col width="20%"/>
                            <tr>
                                <th>Author ID</th>
                                <th>Name</th>
                                
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(isset($_GET['search']))
                            {
                                $filtervalues=$_GET['search'];
                                $totalSearchData=mysqli_query($con," SELECT* FROM author WHERE name LIKE '%$filtervalues%' ");
                                $searchQuery=" SELECT* FROM author WHERE name LIKE '%$filtervalues%' LIMIT $firstData,$dataLimit";
                                $searchResult=mysqli_query($con,$searchQuery);
                                $totalData = mysqli_num_rows($totalSearchData);
                                $totalPage = ceil($totalData / $dataLimit);


                                if(mysqli_num_rows($searchResult)>0){
                                    foreach ($searchResult as $rows) {
                                        ?>
                                        <tr>
                                            
                                            <td><?=$rows['author_id'];?> </td>
                                            <td><?=$rows['name'];?> </td>
                            
                                            <td class="table-btn-col">
                                                <div class="add-btn">
                                                    <a class="ref" href="edit.php? id=<?=$rows['author_id'];?>">Edit </a> 
                                                </div>
                                                <div class="add-btn">
                                                    <a class="ref" href="delete.php? id=<?=$rows['author_id'];?>">Delete </a> 
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            else{
                                ?> <?php 
                                $queryx="SELECT* FROM author ";
                                $result1=mysqli_query($con,$queryx);
                                $totalData = mysqli_num_rows($result1);
                                $totalPage = ceil($totalData / $dataLimit);
                                $query1="SELECT * FROM author LIMIT $firstData,$dataLimit";
                                $result=mysqli_query($con,$query1);

                                if(mysqli_num_rows($result)>0){
                                    foreach($result as $rows){
                                        ?>
                                        <tr>
                                            
                                            <td><?=$rows['author_id'];?> </td>
                                            <td><?=$rows['name'];?> </td>
                            
                                            <td class="table-btn-col">
                                                <div class="add-btn">
                                                    <a class="ref" href="edit.php? id=<?=$rows['author_id'];?>">Edit </a> 
                                                </div>
                                                <div class="add-btn">
                                                    <a class="ref" href="delete.php? id=<?=$rows['author_id'];?>">Delete </a> 
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
                <div class="pageNav-Container">
                <?php
                        for ($i = 1; $i <= $totalPage;$i++) {
                            if($i==$activePage){
                                if(isset($_GET['search'])){
                                    $filtervalues = $_GET['search'];
                                    ?>
                                    <a class="pageNav" id="active2"  href="?page=<?= $i; ?>&search=<?=$filtervalues;?>"> <?=$i;?></a>
                                    <?php
    
                                }
                                else{
                                    ?>
                                    <a class="pageNav" id="active2" href="?page=<?=$i;?>"><?= $i;?></a>
    
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
        </div>

        
        
    </body>


</html>