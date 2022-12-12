<?php
session_start();
include("../../../login-signup/connection.php");
include("../../../login-signup/functions.php");

?>

<style> 
            #text{
                height: 30px;
                border-radius: 5px;
                padding: 4px;
                border: solid thin #aaa;
                width: 100%;
            }

            #button{
                padding: 10px;
                width: 100px;
                color:white;
                background-color: hotpink;
                border: none;
                float: left;

            }

            #box{
                background-color: cornflowerblue;
                margin: auto;
                width: 80%;
                padding: 20px;
            }
            .back-btn{
                padding: 10px;
                width: 100px;
                margin-left: 25px;
                text-align: center;
                color:white;
                background-color: lightblue;
                border: none;
                float: left;
            }
</style>

<!DOCTYPE html> 
<html> 
    <body>
    <div id="box">
            <form method="post">
                <div style="font-size: 30px; margin: 10px;color: white;">Add new Author</div>
                <label for="author_id" style="color: white; text-align: center; "><b>Author ID</b></label>
                <input id="text" type="text" name="author_id" placeholder="Enter object id">
                <br>
                <br>
                <label for="name" style="color: white; text-align: center; "><b>Name</b></label>
                <input id="text" type="text" name="name" placeholder="Enter your name">

                <br> <br>
                
                <div class="btn-cont">
                    <input id="button" type="submit" value="Submit ">
                    <a class="back-btn" href="index-author.php"> Back </a>
                </div>
                <br>
                <br>

                <?php 
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        $author_id=$_POST['author_id'];
                        $name=$_POST['name'];
                        
                    }

                    if(!empty($name)&&!empty($author_id)){
                        $check_objectID="SELECT author_id from author WHERE author_id='$author_id'";
                        $check_result=mysqli_query($con,$check_objectID);
                        if(mysqli_num_rows($check_result)>0){
                            echo"Author already exist";
                        }
                        else{
                            $insertQuery="INSERT INTO author (author_id,name)
                            VALUES ('$author_id','$name')";
                            mysqli_query($con,$insertQuery);
                        }


                    }
                    else{
                        
                    }
                ?>
                
                

            
                
            </form>
        </div>
        
    </body>



</html>