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
                background-color: lightblue;
                border: none;
                

            }
            #back-btn{
                padding: 10px;
                background-color:hotpink;
                float:right;
                margin-left: 10px;
                color: white;
                text-decoration: none;

            }
            

            #box{
                background-color: cornflowerblue;
                margin: auto;
                width: 80%;
                padding: 20px;
            }
</style>

<!DOCTYPE html> 
<html> 
<div id="box">
            <form method="post">
                <div style="font-size: 30px; margin: 10px;color: white;">Add new object</div>
                <p> Add new object </p> <br>
                <label for="object_id" style="color: white; text-align: center; "><b>Object ID</b></label>
                <input id="text" type="text" name="object_id" placeholder="Enter object id">
                <br>
                <br>
                <label for="name" style="color: white; text-align: center; "><b>Name</b></label>
                <input id="text" type="text" name="name" placeholder="Enter your name">
                <br>
                <br>
                <label for="type_id"> Type ID</label> <br>
                <select name="type_id" id="type_id">
                    <option value="1">1. Anime</option>
                    <option value="2">2. Manga</option>
                    <option value="3">3. Drama</option>
                </select>
                <br>
                <br>
                <label for="author"> Author </label> <br>
                <select name="author_id" id="author_id"> 
                <?php 
                    $queryAuthor="SELECT* FROM author ORDER BY name";
                    $result=mysqli_query($con,$queryAuthor);
                    if(mysqli_num_rows($result)>0){
                        foreach($result as $rows){
                            ?>
                            <option value="<?=$rows['author_id'];?>"> <?=$rows['name'];?> </option>
                            <?php
                        }

                    }
                    else{
                        echo"query error";
                    }
                
                ?>
                </select>
                <br> <br>
                <input id="button" type="submit" value="Submit ">
                <a href="index.php" id="back-btn"> Back </a>
                <br>
                <br>
                <?php 
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        $object_id=$_POST['object_id'];
                        $name=$_POST['name'];
                        $type_id=$_POST['type_id'];
                        $author_id=$_POST['author_id'];
                    }

                    if(!empty($object_id)&&!empty($name)&&!empty($type_id)&&!empty($author_id)){
                        $check_objectID="SELECT object_id from object WHERE object_id='$object_id'";
                        $check_result=mysqli_query($con,$check_objectID);
                        if(mysqli_num_rows($check_result)>0){
                            echo"object already exist";
                        }
                        else{
                            $insertQuery="INSERT INTO object (object_id,name,type_id, author_id)
                            VALUES ('$object_id','$name','$type_id','$author_id')";
                            mysqli_query($con,$insertQuery);
                        }


                    }
                    else{
                        echo"Complete the form!";
                    }
                ?>
                
                

            
                
            </form>
        </div>


</html>