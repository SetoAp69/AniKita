<?php 
session_start();
include("../../../login-signup/connection.php");
include("../../../login-signup/functions.php");
if(isset($_GET['id'])){
    $object_id = $_GET['id'];
    $objectResult = mysqli_query($con, "SELECT name  FROM object WHERE object_id='$object_id' LIMIT 1");
    
    if(empty($objectResult)){
        echo"object not found";
    }
    else{
        $name1=mysqli_fetch_assoc($objectResult);
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $name = $_POST['name'];
            $author_id = $_POST['author_id'];
            $type_id=$_POST['type_id'];
            $query = "UPDATE object SET name='$name', author_id='$author_id',type_id='$type_id' WHERE object_id='$object_id'";
    
        }
        if(!empty($name)&&!empty($author_id)&&!empty($type_id)){
            if($con->query($query)===TRUE){
                echo "Object has been  Updated";
            }
            else{
                echo "something wrong";
            }
        }
        else{
            echo "complete the form";
        }

    }

    
}
?>

<style>
    #box{
                background-color: cornflowerblue;
                margin: auto;
                width: 80%;
                padding: 20px;
            }
    #back-btn{
        padding: 10px;
        background-color:hotpink;
        float:right;
        margin-left: 10px;
        color: white;
        text-decoration: none;

    }
    #button{
        padding: 10px;
        width: 100px;
        color:white;
        background-color: lightblue;
        border: none;
    }

</style>

<!DOCTYPE HTML>
<html>
    <head>

    </head>
    <body>
        <div id="box">
        <form method="POST" style="color:white">
            <label for="name"> Name </label> 
            <br>
            <input type="text" name="name" placeholder="<?=$name1['name'];?>" id="name">
            <br>
            <br>

            <label for="type_id"> Type</label> <br>
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
                $queryAuthor = "SELECT* FROM author ORDER BY name";
                $result = mysqli_query($con, $queryAuthor);
                if(mysqli_num_rows($result)>0){
                    foreach($result as $rows){
                        ?>
                        <option value="<?=$rows['author_id'];?>"><?=$rows['name'];?></option>
                        <?php
                    }
                }
                else{
                    echo "query error";
                }
                ?>
            </select>
            <br>
            <br>
            <input id="button" type="submit" value="Submit "> 
            <a href="index.php" id="back-btn"> Back </a>
        </form>

        </div>
        
    </body>
</html>