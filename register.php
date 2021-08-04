<?php
    session_start();
    $db = mysqli_connect("localhost", "root", "", "authentication");
    if(isset($_POST['register-btn'])){
        session_start();
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password2 = mysqli_real_escape_string($db, $_POST['password2']);

        if($password==$password2){
            $password = md5($password);
            $sql = "INSERT INTO users(username, email, password) VALUES ('$username','$email', '$password')";
            mysqli_query($db, $sql);
            $_SESSION['message'] = "you are now logged in";
            $_SESSION['username'] = $username;
            header("location: home.php");
        }else{
            $_SESSION['message'] = "Your two passwrds do not match";
        }
    }
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN AND REGISTRATION FORM</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
<?php
    if(isset($_SESSION['message'])){
        echo "<div>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
?>
    <div class="container">
        <div class="form-box">
            <div class="button-box">
                <button class="toggle-btn">Registration Form</button>
            </div>
            <div class="logos">
                <img src="img/facebook.png" alt="">
                <img src="img/twitter.png" alt="">
                <img src="img/instagram.jpg" alt="">
            </div>
            <div class="form-group" method="post" action="register.php">
                <input type="text" name="name" class="input-group" placeholder="name" required>
                <input type="email" name="email" class="input-group" placeholder="email" required>
                <input type="password" name="password" class="input-group" placeholder="enter password" required>
                <input type="password" name="password2" class="input-group" placeholder="Re-enter password" required>
                <input type="submit" name="register-btn" class="register-btn" value="Register">
            </div>
        </div>
    </div>
</body>
</html>