<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "game_generator";
$database_connection = mysqli_connect($servername , $username, $password, $databasename);

if(!$database_connection){
die ("Failed connection to database: $databasename".mysqli_connect_error() );
}

session_start();
?>

<?php
$query = "SELECT id FROM game_generator.users WHERE username='".$_SESSION['username']."'";
$result = mysqli_query($database_connection,$query);
$row = mysqli_fetch_array($result);

$database_query = "INSERT INTO wishlist (name,price,user_id)
VALUES ('".$_POST['game_name']."' , '".$_POST['game_price']."', '".$row['id']."');";
mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
header('Location:wishlist.php');
?>
