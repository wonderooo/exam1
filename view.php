<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "exam";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            $id = $_GET['iddd'];
    
            $sql = "SELECT * FROM images where id='$id'";
            $result = mysqli_query($conn, $sql);

            $max_id = 0;
            $min_id = 0;
            $row_id = 0;

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<img style="max-height: 1200px; max-width: 600px" class="img-fluid" src='.$row['imagefile'].' />';
                    echo '<p> id= '.$row['id'].'</p>';
                    echo '<p> name= '.$row['name'].'</p>';
                    echo '<p> picsum_id= '.$row['picsum_id'].'</p>';
                    echo '<p> imagefile= '.$row['imagefile'].'</p>';
                    echo '<p> author= '.$row['author'].'</p>';
                    echo '<p> width= '.$row['width'].'</p>';
                    echo '<p> height= '.$row['height'].'</p>';
                    echo '<p> added_at= '.$row['added_at'].'</p>';
                    $sql2 = "SELECT MAX(id) as max_id, MIN(id) as min_id FROM images";
                    $row_id = $row['id'];
                    $result2 = mysqli_query($conn, $sql2);
                    if (mysqli_num_rows($result2) > 0){
                        while ($row2 = mysqli_fetch_assoc($result2)){
                            $max_id = $row2['max_id'];
                            $min_id = $row2['min_id'];
                            if ($row_id== $min_id){
                                $prev_id = $max_id;
                            }
                            else{
                                $prev_id = $row_id - 1;
                            }

                            if ($row_id == $max_id){
                                $next_id = $min_id;
                            }
                            else{
                                $next_id = $row_id + 1;
                            }
                        }
                    }else{
                        echo "0 results";
                    }
                    echo '<button><a href=view.php?iddd='.$prev_id.'>previous</a></button>';
                    echo '<button><a href=view.php?iddd='.$next_id.'>next</a></button>';
                    $go_back_page = floor((($row_id - $min_id) / 8) + 1);
                    echo '<button><a href=index.php?p='.$go_back_page.'>go back</a></button>';
                }
                } else {
                echo "0 results";
                }
        ?>
    </body>
</html>