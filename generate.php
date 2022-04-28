<?php
require ('vendor/autoload.php');
$faker = Faker\Factory::create();

$servername = "localhost";
$username = "kacpers";
$password = "kacpers";
$dbname = "test";
$conn = mysqli_connect('127.0.0.1', 'root', '', 'exam');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

for ($i =0; $i < 2; $i++){
    $random = rand(1, 100);
    $ure = 	"https://picsum.photos/id/".$random."/info";
    $json = file_get_contents($ure);
    $json = json_decode($json, true);
    $picsum_id = $json['id'];
    $picsum_author = $json['author'];
    $picsum_w = $json['width']; 
    $picsum_h = $json['height'];
    $timestamp = date("Y-m-d-h-i-sa");
    $name = $faker->firstName();
    $path = 'images/'.$name.'.png';
    $in = file_get_contents($json['download_url']);
    file_put_contents($path, $in);

    $sql = "INSERT INTO images (name, picsum_id, imagefile, author, width, height, added_at)
    VALUES ( '$name' , '$picsum_id' , '$path' , '$picsum_author', '$picsum_w', '$picsum_h', '$timestamp')";

    echo $path.$picsum_author.$timestamp;    
    if (mysqli_query($conn, $sql)){
        echo 'git';
    }
    else{
        echo mysqli_error($conn);
    }
}
mysqli_close($conn);
?>