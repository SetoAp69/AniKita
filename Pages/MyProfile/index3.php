<?php 
session_start();
include("../login-signup/connection.php");
include("../login-signup/functions.php");

$user_data =check_login($con);
$username=$_SESSION["user_name"];
$query ="SELECT name FROM user WHERE username='$username' LIMIT 1";
$query1="SELECT o.object_id 'id', o.name, t.name 'type', a.name 'author', r.rate 
FROM user u, object o, author a, type_of_object t, rating_table r 
WHERE u.username='$username' AND o.object_id=r.object_id AND t.type_id=o.type_id AND a.author_id=o.author_id AND u.username=r.username";
$result=mysqli_query($con,$query);
$rating_table_result=mysqli_query($con,$query1);
$name=mysqli_fetch_assoc($result); 

?>
<!DOCTYPE html>
<style>
        body{
        margin : 0
        
    }
    .topnavigation{
        position: relative;
        overflow:hidden;
        background-color: cornflowerblue;
        width: 100%;
    }
    .topnavigation a{
        float: left;
        color: whitesmoke;
        text-align: center;
        padding: 14px 16px;
        text-decoration:none;
        font-size: 17px
    }
    .topnavigation a:hover{
        background-color: #ddd;
        color: black;
    }
    .topnavigation a.active{
        background-color: hotpink;
        color:white;
    }
    .footer{
        position: relative;
        bottom: 0px;
        width: 100%;
        height: 180px;
        background: cornflowerblue;
        overflow: hidden;
    }
    .footer .section{
        position: relative;
        width: 32%;
        height:155px;
        margin:0.2%;
        background-color: cornflowerblue;
        box-sizing: border-box;
        overflow: hidden;
        float:left;

    }
    .footer .section .content{
        top: 20px;
        color: white;

    }
    .footer .section .content .icon{
        width: 40px;
        height: 30px;
    }
    .profile{
        
        background: white;
        width: 98%;
        height: 250px;
        margin: 10px;
    }
    .profile .content{
        position: relative;
        width: 100%;
        height: 100%;
        
    }
    .profile .content .pp{
        
    
        background: gray;
        float:left;
        height: 200px;
        width: 150px;
        margin: 20px;
        

    }
    .profile .content .bio{
        float: left;
        height: 100%;
        width: 60%;
        top: 50px;
        margin-left: 30px;
        
        background: white;
    }
    #par{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: black;
        
    }
    #border{
        width: 95%;
        height:1px;
        background: cornflowerblue;
        margin-left: 35px;
        
    }
    .objectButtonContainer{
        width: 400px;
        height: 80px;
        float: right;
        margin-right: 2%;
        margin-top: 20px;

    }
    .objectButtonContainer .objectButton{
        background-color: cornflowerblue;
        height: 70px;
        width: 70px;
        margin: 5px ;
        float:left;
        border-radius: 100%;
        display: flex; 
        justify-content: center;
    }
    .objectButtonContainer .objectButton:hover{
        background-color:lightseagreen;
        
    }
    #active{
        background-color: hotpink;
    }
    table{
        table-layout: fixed;
        margin:0 auto;
        border: 1px solid black;
    }
    td{
        background-color: #E4F5D4;
        border: 1px solid black;
        overflow: hidden;
    }
    th, td{
        font-weight: bold;
        border: 1px solid black;
        padding: 10px;
        text-align: center;
        overflow: hidden;

    }
    td{
        font-weight: lighter;
        overflow: hidden;
    }
    .table-button{
        background: hotpink;
    }
    .rate_popup{
        display: none;
    }
    


</style>
<html>
    <title> </title>
    <head> </head>
    <body>
        <div class="topnavigation">
            <a href="../login-signup/index.php">Home</a>
            <a class="active" href="index.php" >Profile</a>
            <a href="../Anime/index.php"> Anime</a>
            <a href="../Manga/index.php">Manga</a>
            <a href="../Drama/index.php">Drama</a>
            
            <div style="float: right;">
                <a href="../login-signup/logout.php">Logout</a>
            </div>
        </div>
        <div class="profile">
            <div class="content">
                <div class="pp">

                </div>
                <div id="par" class="bio"> 
                    <h2 > <?php echo $name['name']?></h2>
                    <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet provident obcaecati, dolores inventore rerum tempora hic! Nostrum exercitationem incidunt est, aperiam voluptatum ipsa obcaecati explicabo id cum? Optio, inventore iste!</p>
                </div>
                
            </div>
            
        </div>
        <div id="border">

        </div>
        <div class="objectButtonContainer">
                <div class="objectButton">
                    <img style=" height: 35px; width: 35px ;  margin-top:20%; " src="../Assets/AllObjectButton.png" alt="">
                
                </div>            
                <div class="objectButton">
                    <img style=" height: 35px; width: 35px ;  margin-top:20%; " src="../Assets/AnimeButton.png" alt="">
                
                </div>            
                <div class="objectButton">
                    <img style=" height: 35px; width: 35px ;  margin-top:20%; " src="../Assets/MangaButton.png" alt="">
                
                </div>
                <div class="objectButton">
                    <img style=" height: 35px; width: 35px ;  margin-top:20%; " src="../Assets/DramaButton.png" alt="">
                
                </div>

                <div>
                    Search Bar 
                </div>


        </div>
        <br>  <br><br>  <br><br>  <br><br>  <br>
        <div class="rate_popup" id="rate_form"> 
            <?php
                
            
            ?>
            <form method="POST" class="form-container">
                    <label for="new_rate"><b>New Rate</b></label>
                    <input type="text" name="new_rate">
                    <input type="submit" value="Submit">


            </form>
        
        </div>

        <div>

            <table>
                <col width="10%"  />
                <col width="30%"/>
                <col width="5%"/>
                <col width="20%"/>
                <col width="5%"/>
                <col width="5%"/>
                <col width="5%"/>
                <tr>
                    <th>ID</th>
                    <th> Name </th>
                    <th> Type </th>
                    <th> Author </th>
                    <th> Your rate </th>
                    <th>Total Rate</th>
                    <th> Total Rate Count</th>
                    
                </tr>
                <?php
                    /*if($_SERVER['REQUEST_METHOD']=='POST'){
                        echo"post requested";
                        if(isset($_GET['id'])){
                            $id=$_GET['id'];
                            $new_rate = $_POST['new_rate'];
                            $query2 = "UPDATE rating_table SET rate = '$new_rate' WHERE object_id='$id' AND username='$username'";
                    
                            if(!empty($new_rate)){
    
                                if($con->query($query2)=== TRUE){
                                    //echo "Rate Has Been Updated !";
                                    header("./MyProfile/index.php");
                                }
                                else {
                                    echo "Something Wrong";
                                }
                                $con->query($query2);
                                
                    
                            }
                            else{
                                echo "eror";
                            }
                            
                            
                    
                        
                        }
                        
                
                    }*/
                    while($rows=$rating_table_result -> fetch_assoc()){
                        
                        echo"<tr style='overflow:hidden;'>";
                            echo "<td>".$rows['id']."</td>";
                            echo "<td>".$rows['name']."</td>";
                            echo "<td>".$rows['type']."</td>";
                            echo "<td style='overflow:hidden;'>".$rows['author']."</td>";
                            echo "<td>".$rows['rate']."</td>";
                            echo "<td>".$rows['rate']."</td>";
                            echo "<td>".$rows['rate']."</td>";
                            echo "<td>";
                            echo"<div class='table_btn_group'>";
                            echo "<a style='color: white;' class = 'table-button' href='../edit.php? id=".$rows['id']." '> Edit</a>";
                            //echo "<button type='button' onclick='openForm();getID(".$rows['id'].");'>Edit </button> ";
                            echo "<a style='color: white;' class = 'table-button' href='../delete.php? id=".$rows['id']." '> Delete</a>";
                            echo "</div>"; 
                            echo "</td>";


                        echo"</tr>";

                        
                /*
                echo "<tr>";
                   echo <td>
                        echo $rows['id']>
                    </td>;
                    <td> 
                        <?php echo $rows['name'];?>
                    </td>
                    <td> 
                        <?php echo $rows['type'];?>
                    </td>
                    <td> 
                        <?php echo $rows['author'];?>
                    </td>
                    <td> 
                        <?php echo $rows['rate'];?>
                    </td>
                    <td>
                        <?php $idd=$rows['id']?>
                        <a style='color: white;' class = "table-button" href="../edit.php? id= $rows['id']"> Edit</a>
                        <a style="color: white;" class = "table-button" href="../delete.php?id=$rows['id']"> Delete</a>
                    </td>
                    

                </tr> */
                
                } 
                ?>
            </table>

        </div>
        <br>  <br><br>  <br><br>  <br><br>  <br>
        <br>  <br><br>  <br><br>  <br><br>  <br><br>  <br><br>  <br><br>  <br><br>  <br><br>  <br><br>  <br><br>  <br><br>  <br>
        <div class="footer">
        <div class="section"> 
            <div class="content">
                <h2>Follow Us on </h2>
                <a href=""style="margin:5px;">
                    <img class="icon" src="../discord.png" alt="">
                </a>
                <a href=""style="margin:5px;">
                    <img class="icon" src="../discord.png" alt="">
                </a>
                <a href=""style="margin:5px;">
                    <img class="icon" src="../discord.png" alt="">
                </a>
                <a href="" style="margin:5px;">
                    <img class="icon" src="../discord.png" alt="">
                </a>
            </div>
        </div>
        <div class="section">
            <div class="content">
                <h3>Follow Us on </h3>
            </div>
        </div>
        
        

        <div class="section">
            <div class="content">
                <h3>Follow Us on </h3>
                <div style="float: left;">
                    <a href=""style="color:white">About</a> <br> <br>
                    <a href="" style="color:white">Faq</a><br> <br>
                    <a href="" style="color:white">Support</a><br> <br>
                </div>
                <div style="float:left; margin-left:1px;">
                    <a href="" style="color:white">Privacy</a><br> <br>
                    <a href="" style="color:white">Cookie</a><br> <br>
                </div>
                
                
            </div>
        </div>
    </div>
    
    <script>
        function openForm(){
            
            document.getElementById("rate_form").style.display="block";
            
        }
        function closeFrom(){
            document.getElementById("rate_form").style.display="none";
        }
        function getID($rowsid){
            $id=$rowsid;
        }
        //window.location.reload(true);
        window.onload = function() {
            if(!window.location.hash) {
                window.location = window.location + '#loaded';
                window.location.reload();
            }
        }
    </script>
    </body>
</html>