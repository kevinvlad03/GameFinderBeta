<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
</head>
<body background="signupbackround.jpg" style="opacity:1;">
    
    <br><br><br><br><br><br>
    <div class="container d-flex justify-content-center mt-5">  
    <div class="card" style="width: 350px; height:430px;">
    <div class="login-wrap" style="text-align:center ;" >
        <br>
                <h1>SIGN UP</h1>
                <form action="SignUp.php" method="POST">
                <div class="sign-up-htm">
                    <div class="group">
                        <label for="user" class="label">Username</label><br>
                        <input name="user" id="user" type="text" class="input" />
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Email Address</label><br>
                        <input name="email" id="pass" type="text" class="input"/>
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label><br>
                        <input name="password" id="pass" type="password" class="input" data-type="password"/>
                    </div><br>
<?php
$servername = "localhost";
$username = "dumitruvlad";
$password = "1006";
$databasename = "game_generator";
$database_connection = mysqli_connect($servername , $username, $password, $databasename);

if(!$database_connection){
die ("Failed connection to database: $databasename".mysqli_connect_error() );
}

if(isset($_POST['submitbutton'])){

$query ="SELECT * FROM game_generator.users WHERE username='".$_POST["user"]."'";
$result = mysqli_query($database_connection,$query);
$row_count = mysqli_num_rows($result);

if((int)$row_count != 0){
   echo '<p style="color:red;">This user is already taken! :(<br>
   Please choose another.</p>'; 
}

else{
    $query ="INSERT INTO game_generator.users (username,email,password) VALUES
    ('".$_POST["user"]."','".$_POST["email"]."','".$_POST["password"]."');";
$result = mysqli_query($database_connection,$query);

header("Location:index.php");
    
}
}

?>
                    
                    <div class="group">
                        <input name="submitbutton" type="submit" class="button" value="Sign Up" style="width:100px; height:40px ;">
                    </div>
                    </form>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="SignIn.php" for="tab-1">Already Member?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>


</body>
</html>