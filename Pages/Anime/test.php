<?php
session_start();
include("../../login-signup/connection.php");
include("../../login-signup/functions.php");

$dataLimit = 10;
$username = $_SESSION['user_name'];
$totalData = 0;
$totalPage = 0;
$activePage = (isset($_GET["page"])) ? $_GET["page"] : 1;
$firstData = ($dataLimit) * ($activePage - 1);






?>
<!DOCTYPE html> 
<html> 
    <head><!-- Bootstrap CSS -->
            <!-- Bootstrap DataTables CSS -->
            <!-- Jquery -->
            <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
            <!-- Jquery DataTables -->
            <script type="text/javascript" language="javascript" src="http:////cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
            <!-- Bootstrap dataTables Javascript -->
            <script type="text/javascript" language="javascript" src="http://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>

            <!-- Panggil Fungsi -->
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
	$('.table-paginate').dataTable();
 } );
</script>

    </head>
    <body>
        <div class="searchBarContainer">
            <form action="" method="GET" class="searchBar" >
                <div class="searchBar">

                    <input type="text" name='search' value="<?php if(isset($_GET['search']) ){echo $_GET['search'];}?>" class="form-control" placeholder="Search">
                    <button type="submit" class="searchButton">Search</button>
                </div>  

            </form>
            
        </div>
        <table id="anime-table">
                        <thead>
                                <col width="5%"  />
                                <col width="30%"/>
                                <col width="20%"/>
                                <col width="10%"/>
                                <col width="10%"/>
                                <col width="25%"/>
                            <tr>
                                <th>ID</th>
                                <th> Name </th>
                                <th> Studio </th>
                                <th> Average Rating </th>
                                <th>Total Rate Count</th>
                                
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(isset($_GET['search']))
                            {
                                $filtervalues=$_GET['search'];
                                $totalSearchData = mysqli_query($con,"SELECT object.name 'name', object.type_id 't_id', author.author_id,
                                object.object_id 'id', author.name 'Studio',  ROUND(AVG(rating_table.rate),2) 'avg_rate',
                                 COUNT(rating_table.rate) 'rate_count'
                                FROM 
                                author JOIN object USING(author_id)
                                LEFT JOIN 
                                rating_table USING(object_id) 
                                WHERE object.type_id='1' AND object.name LIKE '%$filtervalues%'
                                GROUP BY (object.object_id) ORDER BY object_id");

                                $searchQuery="SELECT object.name 'name', object.type_id 't_id', author.author_id,
                                object.object_id 'id', author.name 'Studio',  ROUND(AVG(rating_table.rate),2) 'avg_rate',
                                 COUNT(rating_table.rate) 'rate_count'
                                FROM 
                                author JOIN object USING(author_id)
                                LEFT JOIN 
                                rating_table USING(object_id) 
                                WHERE object.type_id='1' AND object.name LIKE '%$filtervalues%'
                                GROUP BY (object.object_id) ORDER BY object_id LIMIT $firstData,$dataLimit ";
                                $searchResult=mysqli_query($con,$searchQuery);

                                $totalData = mysqli_num_rows($totalSearchData);
                                $totalPage = ceil($totalData / $dataLimit);

                                if(mysqli_num_rows($searchResult)>0){
                                    foreach ($searchResult as $rows) {
                                        ?>
                                        <tr>
                                            <td><?=$rows['id'];?> </td>
                                            <td> 
                                                <a style="color: black; font-weight: bold;" href="../../Object/<?=$rows['t_id'];?>/<?=$rows['id'];?>/index.php">
                                                 <?=$rows['name'];?> 
                                                </a>  
                                            </td>
                                            <td>
                                                 <a style="color: black; font-weight: bold; " href="index-by-author.php? id=<?=$rows['author_id'];?>"> 
                                                 <?=$rows['Studio'];?> 
                                                </a> 
                                            </td>
                                            <td><?=$rows['avg_rate'];?> </td>
                                            <td><?=$rows['rate_count'];?> </td>
                                            <td class="table-btn-col">
                                                <div class="add-btn">
                                                    <a class="ref" href="add.php? id=<?=$rows['id'];?>">add </a> 
                    
                                                </div>
                        
                                            </td>
                                        </tr>

                                        <?php
                                    }

                                }
                            }
                            else{
                                //display all data
                                ?> <?php 
                                $queryx="SELECT* FROM object where type_id='1' ";
                                $result=mysqli_query($con,$queryx);
                                $totalData = mysqli_num_rows($result);
                                $totalPage = ceil($totalData / $dataLimit);
                                $query1="SELECT object.name 'name', object.type_id 't_id' ,object.object_id 'id', 
                                author.name 'Studio',  author.author_id,
                                ROUND(AVG(rating_table.rate),2) 'avg_rate', COUNT(rating_table.rate) 'rate_count'
                                FROM 
                                author JOIN object USING(author_id)
                                LEFT JOIN 
                                rating_table USING(object_id) 
                                WHERE object.type_id='1'
                                GROUP BY (object.object_id)
                                LIMIT $firstData,$dataLimit ";
                                $result=mysqli_query($con,$query1);

                                if(mysqli_num_rows($result)>0){
                                    foreach($result as $rows){
                                        ?>
                                        <tr>
                                            <td><?=$rows['id'];?> </td>
                                            <td>
                                                <a style="color: black; font-weight: bold;" href="../../Object/<?=$rows['t_id'];?>/<?=$rows['id'];?>/index.php"> 
                                                    <?=$rows['name'];?>
                                                 </a>  
                                            </td>
                                            <td>
                                                 <a style="color: black; font-weight: bold; " href="index-by-author.php? id=<?=$rows['author_id'];?>"> 
                                                 <?=$rows['Studio'];?> 
                                                </a> 
                                            </td>
                                            <td><?=$rows['avg_rate'];?> </td>
                                            <td><?=$rows['rate_count'];?> </td>
                                            <td class="table-btn-col">
                                                <div class="add-btn">
                                                    <a class="ref" href="add.php? id=<?=$rows['id'];?>">add </a> 
                                                    
                                                
                                                </div>

                                                
                                                
                                            </td>
                                        </tr>

                                        <?php

                                    }
                                }




                                

                                ?>
                                <?php
                            }


                            ?>
                            

                        </tbody>

                    </table>

                    
                    <?php
                    for ($i = 1; $i <= $totalPage;$i++) {
                        if(isset($_GET['search'])){
                            $filtervalues = $_GET['search'];
                            ?>
                            <a href="?page=<?= $i; ?>&search=<?=$filtervalues;?>"> <?=$i;?></a>
                            <?php
                            

                        }
                        else{
                            ?>
                            <a href="?page=<?=$i;?>"><?= $i;?></a>

                            <?php
                        }

                    }
                        

                    ?>
                    </div>
    </body>
</html>