<!DOCTYPE html>
<html>

<head>

</head>

<body>

<?php
$servername = "localhost";
$username = "dumitruvlad";
$password = "1006";
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

$database_query = "INSERT INTO game_generator.your_list (name,rating,hours,user_id)
VALUES ('".$_POST['game_name']."' , '".$_POST['game_rating']."' , '".$_POST['game_hours_played']."' , '".$row['id']."');";
mysqli_query($database_connection, $database_query);
echo $database_query;
header('Location:addgame.html');
?>

</body>
</html>