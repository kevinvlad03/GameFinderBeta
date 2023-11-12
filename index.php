<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS only -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameGenerator</title>

    <link rel="stylesheet" href="style.css">
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</head>
<body background="graphite.png">
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
  
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <img src="logo2.png" alt="..." height="50" >
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
                  if(!session_id())
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
<div style=" width: 70% ; background:rgb(36,0,10);
background: linear-gradient(90deg, rgba(36,0,10,1) 0%, rgba(220,20,60,1) 50%, rgba(36,0,10,1) 100%); ; border:2px solid crimson; padding:30px 30px;">
  <h2 style="color:rgb(255, 255, 255); font-weight:bold ;">Let us help you find a game you will surely enjoy!</h2>
  <h4 style="color:rgb(255, 255, 255);">Search for video game recommendations, enter the title of your favourite game or game series for a curated list of similar games.</h4>
</div>
</font>
</center>
</font>

<br>
<center><hr style="background-color:crimson; height:6px; width:70%; opacity:0.8"></center>
<br>
<font face="Palatino" >
  <center>
      <p style="color:white; font-weight: 900;font-size:50px; font-style:italic;">Give me a game similar to...</p>
                </center>
    </font>


  <div class="searchBox"  >
  <form method="post" action="gamesearch.php">
    <center><input name="gamename" class="searchInput"type="text" style="height: 60px; width: 600px; color: crimson; font-style:italic;" name="" placeholder="Eg. FIFA">
    </center>
  </form>
</div>

<br><br>
<center><hr style="background-color:crimson; height:6px; width:70%; opacity:0.8"></center>
<br>
<center>
  <font face="Palatino">
<div style=" width: 40% ; background:rgb(36,0,10);
background: linear-gradient(90deg, rgba(36,0,10,1) 0%, rgba(220,20,60,1) 50%, rgba(36,0,10,1) 100%); ; border:2px solid crimson; padding:30px 30px;">
  <p style="color:rgb(255, 255, 255); font-size:25px;">There are moments in your gamer life when you feel like you don`t know what to play, so...</p>
</div>
</font>
<br>

<center>
  
<form action="" method="post">
   <input name="randomgame" value="Give me a random GAME!" type="submit" style="background-color: white; padding: 5px 15px; border: 1px solid crimson; cursor: pointer; border-radius: 15px;">
    <br>            
<?php
if(!session_id())
session_start();
                if(isset($_POST['randomgame'])){
                  $query3 = "SELECT name FROM game_generator.games order by RAND() limit 1";
                  $result3 = mysqli_query($database_connection,$query3);
                  $_rand = mysqli_fetch_array($result3)['name'];
                  echo '<br><p style="color:white; width: 20% ; background:rgb(36,0,10);
                  background: linear-gradient(90deg, rgba(36,0,10,1) 0%, rgba(220,20,60,1) 50%, rgba(36,0,10,1) 100%); ; 
                  border:2px solid crimson; padding:20px 20px;">'.$_rand.'</p>';
                }
                ?>
</center>


<br><br>
<footer>
<p style="color:white;">Games Finder is the number one source for curated video game 
  recommendations. Browse our large collection of games like lists 
  to discover similar games or search using the form above.

We are a human driven video game database supported by user ratings 
from Games Finder visitors. 
Titles are reviewed by our writing team while being carefully 
matched with similar games based on gameplay, mechanics, genre, 
theme and other features.

The result is high quality editorial games like lists that feature relevant games 
that you actually want to play. 
              </p>
</footer>






</body>
</html>