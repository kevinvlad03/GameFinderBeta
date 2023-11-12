<!DOCTYPE html>
<html>

<head>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameGenerator</title>
    

        
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

session_start();
?>

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
      <br>
   
<br>
<center>  
  <font face="Palatino">    
<p style="color:white; font-size:50px; width: 40% ; background:rgb(36,0,10);
background: linear-gradient(90deg, rgba(36,0,10,1) 0%, rgba(220,20,60,1) 50%, rgba(36,0,10,1) 100%); ; border:2px solid crimson; padding:30px 30px;">
Your Game Collection</p>
</font>
</center>
<br>

<?php
$query = "SELECT id FROM game_generator.users WHERE username='".$_SESSION['username']."'";
$result = mysqli_query($database_connection,$query);
$row = mysqli_fetch_array($result);

$database_query = "SELECT * FROM game_generator.your_list WHERE user_id='".$row['id']."';";
mysqli_query($database_connection,$database_query) or die("Query error to database: $databasename");
$query_result = mysqli_query($database_connection, $database_query);





echo '<center><table width="45%" style="color:white; font-size: 25px">';
echo'<tr>
    <th style="text-align:center">Name</th>
    <th style="text-align:center">Rating</th>
    <th style="text-align:center">Hours Played</th>
    </tr>';
while ($line = mysqli_fetch_array($query_result)){
    echo '<tr><td style="text-align:center">'.$line['name'].'</td><td style="text-align:center">'.$line['rating'].'</td>
    <td style="text-align:center">'.$line['hours'].'</td><td style="text-align:center"></tr>';
    
}


echo '</table></center>';
echo '<center>
<form method="POST" action="">
<select name="option" >';

$query4="SELECT id FROM users where username='".$_SESSION['username']."';";
  $result4=mysqli_query($database_connection,$query4);
  $row4 = mysqli_fetch_array($result4);
  
$query3 = "SELECT * FROM your_list where user_id='".$row4['id']."'";
$result3 = mysqli_query($database_connection,$query3);

while($row3 = mysqli_fetch_array($result3)){
  echo '<option value="'.$row3['name'].'">'.$row3['name'].'</option>';
}

echo'
</select>
<input name="remove" type="submit" value="remove">
</form>
</center>';


if(isset($_POST["remove"])){
  

  $query_remove = "DELETE FROM game_generator.your_list where name='".$_POST['option']."' and user_id='".$row4['id']."';";
  $query_result2 = mysqli_query($database_connection, $query_remove);
  
  header("Location:gamelist.php");
  //extract($_POST["remove"]);
  
  }

mysqli_close($database_connection);
?>


</body>