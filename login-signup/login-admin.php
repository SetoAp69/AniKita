<?php
session_start();
include("connection.php");
include("functions.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){
        //something posted
        
        $admin_id= $_POST['admin_id'];
        $password = $_POST['password'];
        

        if(!empty($admin_id)&&!empty($password) ){

            //read database
            $query ="SELECT* FROM admin WHERE admin_id='$admin_id' LIMIT 1";
            
            $result=mysqli_query($con, $query);

            if($result){
                if($result && mysqli_num_rows($result)>0){
                    $user_data=mysqli_fetch_assoc($result);

                    if($user_data['password']==$password){
                        $_SESSION['admin_id']=$user_data['admin_id'];
                        header("Location:../Admin/Pages/Dashboard/index.php");
                        die;
                    }
                    

                }
                else{
                    echo "your password or username is invalid";
                }
            }

            

        }else{
            echo "please enter the same password";
        }
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
    </head>
    <body>
        <style type="text/css">
            #text{
                height: 25px;
                border-radius: 5px;
                padding: 4px;
                border: solid thin #aaa;
                width: 100%;
            }

            #button{
                padding: 10px;
                width: 100px;
                color:white;
                background-color: lightblue;
                border: none;
                margin-left: 65%;

            }

            #box{
                background-color: grey;
                margin: auto;
                width: 300px;
                padding: 20px;
            }

            #button2{
                padding: 12px;
                width:300px;
                color:white;
                background-color: lightpink;
                border: none;
                margin:auto;

            }
        </style>

        <div id="box">
            <form method="post">
                <div style="font-size: 20px; margin: 10px;color: white;">Admin Login</div>
                <input id="text" type="text" name="admin_id" placeholder="Enter Admin Id">
                <br>
                <br>
                <input id="text" type="password" name="password" placeholder="Enter Password">
                <br>
                <br>
                <input id="button" type="submit" value="Login">
                <br>
                <br>
            
                <a href="signup-admin.php" style=" color: aliceblue; ">Signup here</a> <br><br>
            </form>
        </div><br><br>

        <div id="button2">
            <a href="login.php">
                <button id="button2" type="button" margin="auto" onclick=""> Login as User </button>
            </a>
            
            
        </div>
        
    </body>
</html>
