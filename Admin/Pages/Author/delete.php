<?php 

    session_start();
    include("../../../login-signup/connection.php");
    include("../../../login-signup/functions.php");
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $admin_id=$_SESSION['admin_id'];
        $queryName = "SELECT name FROM author WHERE author_id='$id'";
        $nameResult = mysqli_query($con, $queryName);
        $displayName = mysqli_fetch_assoc($nameResult)['name'];
        if(isset($_GET['confirmation'])){
            $query = "DELETE FROM author WHERE author_id = '$id' ";

            if($con->query($query)=== TRUE){
                header("index-author.php");
                echo "Data has been deleted";
                
            }
            else {
                echo "Something Wrong";
            }

        }
        
    }
    else{
        die('id missing');
    }



?>
<style>
    .container{
      position: absolute;
      top: 50%;
      left: 50%;
      margin-right: -50%;
      transform: translate(-50%, -50%);
      text-align: center;
     
    }
    .box
    {
        width: 600px;
        height: 280px;
        border: solid thick;
        background-color: cornflowerblue ;
        border-color: cornflowerblue;
        border-radius: 30px;
        text-align: center;
        
    }
    .delete-btn{
        color: white;
        background-color: orangered;
        border: none;
        border-radius: 12px;
        height:30px;
        width: 20%;
        margin-left:20%;
        float: left;
        text-align: center;
        text-decoration: none;
    }
    #text{
        margin-top: 50px;
        color: white;
        font-size: 30px;
        font-weight: bold;
        
    }
    .btn-cont{
        margin-top: 50px;
    }
    .back-btn{
        color: white;
        background-color: hotpink;
        border: none;
        border-radius: 12px;
        height:30px;
        width: 20%;
        margin-left:20%;
        float: left;
        text-align: center;
        text-decoration: none;
    }
    .delete-btn :hover{
        background-color: brown;
    }
    #text2{
        color: white;
        font-size: 20px;
        text-align: center;
    }
</style>
<!DOCTYPE html>
<html>
<body>
    <div class="container">
        <div class="box">
            <div id="text">Do you want to delete this data?</div>
            <br>
            <br>
            <div id="text2"><?=$displayName;?></div>
            <div class="btn-cont">
                <div >
                    <a class="back-btn" href="index-author.php">Back</a>

                </div>
                <div>
                    <a  class="delete-btn" href="?confirmation=y&id=<?=$id;?>"> Delete</a>
                </div>
                
            </div>

        </div>

    </div>
</body>

</html>

