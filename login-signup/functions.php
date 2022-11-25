<?php 
function check_login($con){
   if(isset( $_SESSION['user_name'])){
    $id=$_SESSION['user_name'];
    $query="SELECT* FROM user WHERE username = '$id' limit 1";
    $result=mysqli_query($con,$query);
    if($result && mysqli_num_rows($result)>0){
        $user_data=mysqli_fetch_assoc($result);
        return $user_data;

    }

   }
   
   if(isset( $_SESSION['user_name'])){
    $id=$_SESSION['user_name'];
    $query="SELECT* FROM admin WHERE admin_id='$id' limit 1";
    $result1=mysqli_query($con,$query);
    if($result1 && mysqli_num_rows($result1)>0){
        $user_data=mysqli_fetch_assoc($result1);
        return $user_data;
    }
   }

   header("Location: ../../login-signup/login.php");
   die;
}