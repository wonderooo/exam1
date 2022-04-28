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
        $i = 0;
        
        if(!isset($_GET['p'])){
            $_GET['p'] = 1;
        }

        echo '<div class="row">';
        while($row = mysqli_fetch_assoc($result)) {
            if ($i >= ($_GET['p']-1) * 8 && $i < (($_GET['p'] -1) * 8) + 8){
                echo '<div class="col-lg-3" style="max-width=100px; max-height=100px"> 
                <figure>
                <form action=view.php method=get>
                <input type=image
                class="img-thumbnail" src='.$row['imagefile'].'
                />
                <input name=iddd hidden value='.$row['id'].'></input>
                </form>
                <figcaption>'.$row['author'].' '.$row['name'].'
                </figcaption> 
                </figure>
                </div>';
            }
            $i++;
        }
        echo '</div>';
        } else {
        echo "0 results";
        }
        for($it=1; $it<($i/8)+1; $it++){
            echo '<form action=index.php> <a name=p value='.$it.' href=index.php?p='.$it.' >'.$it.'</a> </form>';
        }

        mysqli_close($conn);
    ?>
    
  </div>
</div>
</html>