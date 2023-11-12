
<?php
$servername = "localhost";
$username = "dumitruvlad";
$password = "1006";
$databasename = "game_generator";
$database_connection = mysqli_connect($servername , $username, $password, $databasename);

if(!database_connection){
die ("Failed connection to database: $databasename".mysqli_connect_error() );
}

echo "Successfully connected to database: $databasename";
?><br>

<html>
<head>
</head>
<body>


<?php 
$database_query = "select * from game_generator.games";
mysqli_query($database_connection, $database_query) or die("Querry error to database: $databasename");


$query_result = mysqli_query($database_connection,$database_query);
while ($line=mysqli_fetch_array($query_result))
{
    echo $line['emp_id'].' - '.$line['name'].'   '.$line['genre'].'   '.$line['player_support'].'<br />';
}

mysqli_close($database_connection);
?>
</body>
</html>
