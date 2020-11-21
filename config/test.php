
<?php
include "config/conn.php";

if(isset($_POST['but_submit'])){

    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if ($email != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where email='".$email."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['email'] = $email;
            header('Location: home.php');
        }else{
            echo "Invalid username and password";
        }

    }

}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
<form method="post" action="">
    <div id="div_login">
        <h1>Login</h1>
        <div>
            <input type="text" class="textbox" id="email" name="email" placeholder="Username" />
        </div>
        <div>
            <input type="password" class="textbox" id="password" name="password" placeholder="Password"/>
        </div>
        <div>
            <input type="submit" value="Submit" name="but_submit" id="but_submit" />
        </div>
    </div>
</form>
</div>
</body>
</html>

