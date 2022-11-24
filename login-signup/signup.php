<?php
session_start();
include("connection.php");
include("functions.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){
        //something posted
        $name = $_POST['name'];
        $user_name= $_POST['user_name'];
        $password = $_POST['password'];
        $email= $_POST['email'];

        if(!empty($user_name)&&!empty($password) ){
            $check_username = mysqli_query($con, "SELECT username FROM user WHERE username = '$user_name'");
            if(mysqli_num_rows($check_username)>0){
                echo('Username Already Exist');
                
            }
            else{
                $query ="insert into user(username,password,name,email) VALUES('$user_name','$password','$name','$email')";

                mysqli_query($con, $query);

                header("Location: login.php");
                die;

            }

        


            //save to database
            

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
                

            }

            #box{
                background-color: grey;
                margin: auto;
                width: 80%;
                padding: 20px;
            }
        </style>

        <div id="box">
            <form method="post">
                <div style="font-size: 30px; margin: 10px;color: white;">Sign up</div>
                <p>Please fill in this form to create an account </p> <br>
                <label for="name" style="color: white;"><b>Name</b></label>
                <input id="text" type="text" name="name" placeholder="Enter your name">
                <br>
                <br>
                <label for="user_name" style="color: white;"><b>User name</b></label>
                <input id="text" type="text" name="user_name" placeholder="Enter username">
                <br>
                <br>
                <label for="Email" style="color: white;"><b>Email</b></label>
                <input id="text" type="text" name="email" placeholder="Enter Email">
                <br>
                <br><label for="password" style="color: white;"><b>Password</b></label>
                <input id="text" type="password" name="password" placeholder="Enter password">
                <br>
                <br>
                <br><label for="password-repeat" style="color: white;"><b>Repeat Password</b></label>
                <input id="text" type="password" name="passwordRepeat" placeholder="Repeat password">
                <br>
                <br>
                <p>By creating an Account you agree to our Terms & Privacy</p>
                <input id="button" type="submit" value="Sign up ">
                <br>
                <br>
                
                <b>Already have an account? </b>

            
                <a href="Login.php" style=" color: aliceblue; ">Login here</a> <br><br>
            </form>
        </div>
    </body>
</html>