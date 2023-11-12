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
<?php
$servername = "localhost";
$username = "dumitruvlad";
$password = "1006";
$databasename = "game_generator";
$database_connection = mysqli_connect($servername , $username, $password, $databasename);

if(!database_connection){
die ("Failed connection to database: $databasename".mysqli_connect_error() );
}

session_start();
?>
  
  
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
                <?php
                  session_start();
                  if(isset($_SESSION['username']))
                  echo '
                  <li><a class="dropdown-item" href="Profile.php">Profile</a>
                  </li>
                  <li><a class="dropdown-item" href="addgame.html">Add Game</a></li>
                  <li>
                    <li><a class="dropdown-item" href="gamelist.php">Your Game List </a></li>
                    <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li>
                  <form action="" method="post">
                  <input name="SignOutButton" type="submit" value="Sign Out" class="dropdown-item">
                  </input>
                  </form>
                  </li>';

                  else
                  echo '<li><a class="dropdown-item" href="SignUp.php">Login or Sign Up</a></li>';

                  if(isset($_POST['SignOutButton'])){
                    unset($_SESSION['username']);
                    header('Location:index.php');
                  }

                  ?>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>


      <br><br>
      <center>
  <font face="Palatino">
<div style=" width: 50% ; background:rgb(36,0,10);
background: linear-gradient(90deg, rgba(36,0,10,1) 0%, rgba(220,20,60,1) 50%, rgba(36,0,10,1) 100%); ; border:2px solid crimson; padding:30px 30px;">
  <h2 style="color:rgb(255, 255, 255); font-weight:bold ;">Your Game Wishlist</h2>

</div>
</font>
</center>
</font>

      <center><br>
      <a href="addtowishlist.html">
        <button style="background-color: white; padding: 5px 15px; border: 1px solid crimson; cursor: pointer; border-radius: 15px;">
        Add a game to your wishlist</button>
    </center>
                </a>
                <br>

    

    <?php
$query = "SELECT id FROM game_generator.users WHERE username='".$_SESSION['username']."'";
$result = mysqli_query($database_connection,$query);
$row = mysqli_fetch_array($result);
$database_query = "SELECT * FROM game_generator.wishlist WHERE user_id='".$row['id']."';";
mysqli_query($database_connection,$database_query) or die("Query error to database: $databasename");
$query_result = mysqli_query($database_connection, $database_query);

echo '<center><table width="45%" style="color:white; font-size: 25px">';
echo'<tr>
    <th style="text-align:center">Name</th>
    <th style="text-align:center">Price($)</th>
    </tr>';
while ($line = mysqli_fetch_array($query_result)){
    echo '<tr><td style="text-align:center">'.$line['name'].'</td><td style="text-align:center">'.$line['price'].'</td></tr>';
}
    echo '</table></center>';

    mysqli_close($database_connection);
    ?>

      </body>
      </html>