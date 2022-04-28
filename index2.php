<!-- bootstrap image gallery 1 -->
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<div class="container-fluid">

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "exam";
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "SELECT imagefile, author, name, id FROM images";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        echo '<div class="row">';
        while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-lg-3" style="max-width=100px; max-height=100px"> 
            <figure>
            <form method=post action=view.php>
            <p hidden name=idd >'.$row['id'].'</p>
            <input type=image name=idd
            class="img-thumbnail" src='.$row['imagefile'].'
            />
            </form>
            <figcaption>'.$row['author'].' '.$row['name'].'
            </figcaption> 
            </figure>
            </div>';
        }
        echo '</div>';
        } else {
        echo "0 results";
        }

        mysqli_close($conn);
    ?>
    
  </div>
</div>
</html>