<?php
    session_start();
    include("connection.php");
    include("functions.php");
    
        if($_SERVER['REQUEST_METHOD']=="POST"){
            //something posted
            
            $user_name= $_POST['user_name'];
            $password = $_POST['password'];
            
    
            if(!empty($user_name)&&!empty($password) ){
    
                //read database
                $query ="SELECT* FROM user WHERE username='$user_name' LIMIT 1";
                
                $result=mysqli_query($con, $query);

                if($result){
                    if($result && mysqli_num_rows($result)>0){
                        $user_data=mysqli_fetch_assoc($result);

                        if($user_data['password']==$password){
                            $_SESSION['user_name']=$user_data['username'];
                            header("Location:../pages/Dashboard/index.php");
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
        <title>Login</title>
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
                <div style="font-size: 20px; margin: 10px;color: white;">Login</div>
                <input id="text" type="text" name="user_name" placeholder="Enter Username">
                <br>
                <br>
                <input id="text" type="password" name="password" placeholder="Enter Password">
                <br>
                <br>
                <input id="button" type="submit" value="Login">
                <br>
                <br>
            
                <a href="signup.php" style=" color: aliceblue; ">Signup here</a> <br><br>
            </form>
        </div><br><br>
        <div id="button2">
            <a href="login-admin.php">
                <button id="button2" type="button" margin="auto" onclick=""> Login as Admin </button>
            </a>
            
            
        </div>
    </body>
</html>