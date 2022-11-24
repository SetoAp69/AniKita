<?php 

    session_start();
    include("../../login-signup/connection.php");
    include("../../login-signup/functions.php");
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $username=$_SESSION['user_name'];
        $query = "DELETE FROM rating_table WHERE object_id = '$id' AND username= '$username' ";

        if($con->query($query)=== TRUE){
            header("../../pages/MyProfile/index.php");
            //echo "Data has been deleted";
            
        }
        else {
            echo "Something Wrong";
        }
    }
    else{
        die('id missing');
    }



?>
<!DOCTYPE html>
<html>
<script>
    window.open("../../pages/MyProfile/index.php");
</script>

</html>

