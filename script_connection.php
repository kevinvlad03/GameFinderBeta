<?php
$servername = "localhost";
$username = "dumitruvlad";
$password = "1006";
$databasename = "game_generator";
$database_connection = mysqli_connect($servername , $username, $password, $databasename);

if(!$database_connection){
die ("Failed connection to database: $databasename".mysqli_connect_error() );
}

echo "Successfully connected to database: $databasename";
?>

<html>
<head>
</head>
<body>
<br><br> This is the php<br>
</body>
</html>
