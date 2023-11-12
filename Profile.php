<!DOCTYPE html>
<html lang="en">
<head>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
</head>
<body background="signupbackround.jpg">
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




    <div class="container d-flex justify-content-center mt-5">

        <div class="card" style="width: 350px; height:700px;">
            
            <div class="top-container">
                
                <br><br>
                <center><img src="/Images/controllerprofilepic.jpg" width="100"></center>
                <br><br>
                <div class="ml-3">
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

                  $query = "SELECT * FROM game_generator.users WHERE username='".$_SESSION['username']."'";
                  $result=mysqli_query($database_connection,$query);
                  $row = mysqli_fetch_array($result);
                  
                  echo '<center>
                  <h3 class="name" >'.$row['username'].'</h3>
                  <p class="mail">'.$row['email'].'</p>
                  </center>';

                  $query2 = "SELECT * FROM game_generator.your_list WHERE user_id='".$row['id']."';";
                  $result2 = mysqli_query($database_connection,$query2);
                  $contor = mysqli_num_rows($result2);
                  

                  echo '<center><p style="color:crimson; font-size:27px; font-weight:bolder">Games Played</p></center>
                        <center><p style="color:black; font-size:40px;">'.$contor.'</p>';

                  ?>

                  <center>
                    <a href="gamelist.php">
                      <button style="background-color: white; padding: 5px 15px; border: 1px solid crimson; cursor: pointer; border-radius: 15px;">
                      Your Game Collection</button>
                </a> 
                <br><br>
                <a href="wishlist.php">
                      <button style="background-color: white; padding: 5px 15px; border: 1px solid crimson; cursor: pointer; border-radius: 15px;">
                      Game Wishlist</button>
                </a> 
                <br><br>
                <form action="" method="post">
                      <input name="randomgame" value="Give me a random GAME!" type="submit" style="background-color: white; padding: 5px 15px; border: 1px solid crimson; cursor: pointer; border-radius: 15px;">

                </form> 
                <br>
                <?php
                if(isset($_POST['randomgame'])){
                  $query3 = "SELECT name FROM game_generator.games order by RAND() limit 1";
                  $result3 = mysqli_query($database_connection,$query3);
                  $_rand = mysqli_fetch_array($result3)['name'];
                  echo '<p style="color:white; width: 70% ; background:rgb(36,0,10);
                  background: linear-gradient(90deg, rgba(36,0,10,1) 0%, rgba(220,20,60,1) 50%, rgba(36,0,10,1) 100%); ; 
                  border:2px solid crimson; padding:30px 30px;">'.$_rand.'</p>';
                }
                ?>
                </div>
              </div>

              

                
            
            
        </div>
        
    </div>
    

    
    
</body>
</html>
