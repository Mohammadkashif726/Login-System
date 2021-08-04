<?php
    session_start();
    $db = mysqli_connect("localhost", "root", "", "authentication");
    if(isset($_POST['login-btn'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($db, $sql);
        if(mysqli_num_rows($result)==1){
            $_SESSION['message'] = "You are login";
            $_SESSION['username'] = $username;
            header("location: home.php");
        }else{
            $_SESSION['message'] = "Your email or password is incorrect";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
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
                <button class="toggle-btn">Login Form</button>
            </div>
            <div class="logos">
                <img src="img/facebook.png" alt="">
                <img src="img/twitter.png" alt="">
                <img src="img/instagram.jpg" alt="">
            </div>
            <form action="login.php" method="post" class="form-cls">
                <input type="text" class="input-group" placeholder="Username" required>
                <input type="password" class="input-group" placeholder="Password" required>
                <input type="password" class="input-group" placeholder="Password" required>
                <input type="submit" class="submit-btn" value="Register">
            </form>
        </div>
    </div>
</body>
</html>