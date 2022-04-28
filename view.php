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
                }
                } else {
                echo "0 results";
                }
        ?>
    </body>
</html>