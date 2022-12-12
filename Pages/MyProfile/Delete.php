<?php 

    session_start();
    include("../../login-signup/connection.php");
    include("../../login-signup/functions.php");
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $username=$_SESSION['user_name'];
        $queryName = "SELECT name FROM object WHERE object_id='$id'";
        $resultName = mysqli_query($con, $queryName);
        $displayName = mysqli_fetch_assoc($resultName)['name'];
       if(isset($_GET['confirmation'])){
        $query = "DELETE FROM rating_table WHERE object_id = '$id' AND username= '$username' ";

        if($con->query($query)=== TRUE){
            echo "Data has been deleted";
            header("../../pages/MyProfile/index.php");
            
        }
        else {
            echo "Something Wrong";
        }
       }
    }
    else{
        
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
        text-align: center;
        font-size: 20px;

    }
</style>
<!DOCTYPE html>
<body>
    <div class="container">
        <div class="box">
            <div id="text">Do you want to delete this data?</div>
            <br>
            <div id="text2"><?=$displayName;?></div>
            <div class="btn-cont">
                <div >
                    <a class="back-btn" href="index.php">Back</a>

                </div>
                <div>
                    <a  class="delete-btn" href="?confirmation=y&id=<?=$id;?>"> Delete</a>
                </div>
                
            </div>

        </div>

    </div>
</body>

<html>
<script>
    
</script>

</html>

