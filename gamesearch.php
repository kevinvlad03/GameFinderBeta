<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameGenerator</title>
    

        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</head>
<body background="graphite.png" >
  
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <img src="logo2.png" alt="..." height="50">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="News.html">News</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="GamerRecensions.html">Gamer Recensions</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   Account
                  </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="Profile.php">Profile</a>
                  </li>
                  <li><a class="dropdown-item" href="addgame.html">Add Game</a></li>
                  <li>
                    <li><a class="dropdown-item" href="gamelist.php">Your Game List </a></li>
                    <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="SignUp.php">Login or Sign Up</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "game_generator";
$database_connection = mysqli_connect($servername , $username, $password, $databasename);

if(!$database_connection){
die ("Failed connection to database: $databasename".mysqli_connect_error() );
}

?>

<!DOCTYPE html>
<html>

<head>
</head>

<body>

    <?php
    $database_query = "SELECT * FROM game_generator.games 
    where name='".$_POST['gamename']."'";
    
    mysqli_query($database_connection,$database_query) or die("Query error to database: $databasename");
    $query_result = mysqli_query($database_connection, $database_query);
    
    $row_count = mysqli_num_rows($query_result);
    if((int)$row_count == 0 )
    echo '<br><br><center><p style="color:crimson; font-size: 50px">There is no game similar to this one in our library :(</p></center>';

    else {

    $row=mysqli_fetch_array($query_result);
    echo '<br><br><center><p style="color:crimson; font-size: 50px">Games similar to '.$row["name"].' are...</p></center>';

    $genre_query = "SELECT * FROM game_generator.games 
    where genre='".$row["genre"]."'and name!='".$row["name"]."'";

    $result = mysqli_query($database_connection, $genre_query);

    echo '
    <br><br><br><br>
    <center><table width="70%" style="color:white; font-size: 25px">';
    echo'<tr>
    <th style="text-align:center">Name</th>
    <th style="text-align:center">Genre</th>
    <th style="text-align:center">Player Support</th>
    </tr>';

    $contor=1;

while ($line = mysqli_fetch_array($result)){
    echo '<tr><td style="text-align:center">'.$line['name'].'</td><td style="text-align:center">'.$line['genre'].'</td>
    <td style="text-align:center">'.$line['player_support'].'</td></tr>';
    $contor=$contor+1;
}
echo '</table></center>';

    }



   

    
