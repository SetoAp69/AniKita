<?php 

    session_start();
    include("../../login-signup/connection.php");
    include("../../login-signup/functions.php");
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $username=$_SESSION['user_name'];
        $queryCheck="SELECT* FROM rating_table WHERE object_id='$id' AND username='$username'";
        $checkResult=mysqli_query($con,$queryCheck);
        if(mysqli_num_rows($checkResult)==0){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $new_rate = $_POST['new_rate'];
                if($new_rate>10){
                    $new_rate=10;
                }
                $query = "INSERT INTO rating_table VALUE ('$username','$id','$new_rate')";
                if(!empty($new_rate)){
                    if($con->query($query)===TRUE){
                        header("../../pages/MyProfile/index.php");

                    }
                    else{
                        echo"Something Wrong";
                    }
                }
                else{
                    echo"Please Enter new rate";
                }

            }
           

        }
        else{
            echo"Object Already on Your List!";
            header("../MyProfile/index.php");
        }

    }
    
    /*if()
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $username=$_SESSION['user_name'];
            $new_rate = $_POST['new_rate'];
            if($new_rate>10){
                $new_rate=10;
            }
            
    
            if(!empty($new_rate)){
                if($con->query($query)=== TRUE){
                    //echo "Rate Has Been Updated !";
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
    

?>

<!DOCTYPE html>
<html>
    <title> </title>
    <header> </header>
    <body>
        <div>
            <div>
                <form method="POST">
                    <label for="new_rate"><b>New Rate</b></label>
                    <input type="text" name="new_rate">
                    <a href="../../pages/MyProfile/index.php"> 
                        <input type="submit" value="Submit" onclick="backToProfile()">
                        
                    </a>
                    

                </form>
            </div>
        </div>
    </body>
    <script>
        function backToProfile(){
            mywindow = window.open("../../pages/MyProfile/index.php");
            mywindow.location.reload(true);
            
            
            
        }
    </script>

</html>
