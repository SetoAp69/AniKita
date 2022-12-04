<?php 

    session_start();
    include("../../../login-signup/connection.php");
    include("../../../login-signup/functions.php");
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $admin_id=$_SESSION['admin_id'];
        $query = "DELETE FROM author WHERE author_id = '$id' ";

        if($con->query($query)=== TRUE){
            header("index-author.php");
            echo "Data has been deleted";
            
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
    window.open("index-author.php");
</script>

</html>

