<?php 

session_start();
    include("../../../login-signup/connection.php");
    include("../../../login-signup/functions.php");
    $id='';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $admin_id=$_SESSION['admin_id'];
        $queryName = "SELECT name FROM author WHERE author_id='$id' LIMIT 1";
        $nameResult = mysqli_query($con, $queryName);
        $displayName = mysqli_fetch_assoc($nameResult)['name'];
       
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $admin_id=$_SESSION['admin_id'];
            $name = $_POST['name'];
            $query="UPDATE author SET name='$name' WHERE author_id='$id'";
            
    
            if(!empty($name)){
                if($con->query($query)=== TRUE){
                    echo "Name Has Been Updated !";
                    header("../../pages/MyProfile/index.php");
                }
                else {
                    echo "Something Wrong";
                }
    
            }

        }
    }
    
    /*if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $username=$_SESSION['user_name'];
            $new_rate = $_POST['new_rate'];
            if($new_rate>10){
                $new_rate=10;
            }
            $query = "UPDATE rating_table SET rate = '$new_rate' WHERE object_id='$id' AND username='$username'";
    
            if(!empty($new_rate)){
                if($con->query($query)=== TRUE){
                    echo "Rate Has Been Updated !";
                    header("../../pages/MyProfile/index.php");
                }
                else {
                    echo "Something Wrong";
                }
    
            }
    
           
        }
        else{
            die('id missing');
        }

    }*/
    $query2="SELECT name FROM author WHERE author_id='$id' LIMIT 1";
    $result=mysqli_query($con,$query2);
    $authorName="";

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        if($result){
            if($result && mysqli_num_rows($result)>0){
                $author_data=mysqli_fetch_assoc($result);
                $authorName=$author_data['name'];
                
                
    
                
                
    
            }
            else{
                echo "error";
            }
        }
    }
    
    
    

?>
<style> 
    
    ::after.container{
      position: absolute;
      top: 50%;
      left: 50%;
      margin-right: -50%;
      transform: translate(-50%, -50%);
     
    }
    .box
    {
        width: 600px;
        height: 280px;
        border: solid thick;
        background-color: cornflowerblue ;
        border-color: cornflowerblue;
        border-radius: 30px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
        
        
    }
    .box .content{
        
        width: 100%;
        height: 30%;
        
        margin: 0 auto;
    }
    .box .content .child{
        width: 400px;
        height: 30px;
        margin: 0 auto;
        background-color: pink;
        
        
    }
    .label{
        size: 100%;
        text-align: center;
    }
    #text{
        padding: 0 auto;
        margin-left: 10%;
        margin-right: 5%;
        height: 30px;
        width: 80%;
        text-align: center;
        border: solid;
        border-color: cornflowerblue;
        border-radius: 15px;
        background-color: whitesmoke;
                
    }
    #par{
        margin left: 30% ;
    }
    .btn-container{
        height:30px;
        width: 70%;
        margin-left: 15%;
        background-color: none;
    }
    .btn-container .box-btn{
        height: 100%;
        width: 50%;
        float: left;
    }
    .back-btn{
        color: white;
        background-color: hotpink;
        border: none;
        border-radius: 12px;
        height:30px;
        width: 50%;
        margin-left:25%;
        float: left;
        text-align: center;

    }
    .back-btn:hover{
        background-color: #F6E1D3;
        border: solid thin;
        color: hotpink;

        border-color: hotpink;
    }
    .back-btn a{
        
        padding: 12px 30px;
        background-color: None;
        text-decoration: none;
        color: white;
        
    }
    .back-btn a:hover{
        color: hotpink;
    }
    #button{
        color: white;
        background-color: hotpink;
        border: none;
        border-radius: 12px;
        height:30px;
        width: 50%;
        margin-left:25%;
        float: left;
        text-align: center;
    }
    #name{
        text-align: center;
        color: white;
    }
    #text1{
        color: white;

    }
    #text2{
        color: white;
        text-align: center;
        font-size: 20px;
    }
    </style>

<!DOCTYPE html>
<html>
    <title> </title>
    <header> </header>
    <body>
        <div class="container">
            <div class="box">
                <div class="content" style="text-align: center;">
                <br>
                    <h2 id="text1">Edit</h2>
                    
                </div>
                <div class="content">
                        <form method="POST">
                            <div id="text2"><?=$displayName;?></div>
                            <br>
                            <div id="name">
                                <label for="name">Name</label>
                            </div>
                            
                            <br>
                            <input id="text" type="text" name="name" class="" style="float: top;">
                            <br> <br>

                            <div class="btn-container">
                                <div class="box-btn"> 
                                    <input id="button" type="submit" value="Submit" >
                               
                                
                                </div>
                                <div class="box-btn">
                                    
                                    <div class="back-btn"> 
                                        <a href="index-author.php">Back</a>
                                    </div>

                                </div>
                                

                            </div>

                            
                                
                            
                            

                        </form>

                </div>


                
                



            </div>


        </div>
            
        <!--<div class="container">
            <div class="box">
                <div class="content">
                    <div class="label">
                        <h3> New Rate</h3>
                    </div>

                    <form method="POST">
                        <input type="text" name="new_rate" class="child" style="float: top;">
                        <br>
                        <br>
                        <a href="../../pages/MyProfile/index.php" style="float: top;"> 
                            <input class="submin-btn" type="submit" value="Submit" onclick="backToProfile()">
                            
                        </a>
                    </form>
                

                </div>
                <div class="content">
                <form method="POST">
                    
                    <input type="text" name="new_rate" class="child" style="float: top;">
                    <a href="../../pages/MyProfile/index.php" style="float: top;"> 
                        <input class="submin-btn" type="submit" value="Submit" onclick="backToProfile()">
                        
                    </a>
                    

                </form>
                </div>
                
            </div>
        </div>-->
    </body>
    <script>
        function backToProfile(){
            mywindow = window.open("index-author.php");
            mywindow.location.reload(true);
            
            
            
        }
    </script>

</html>
