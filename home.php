<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if(isset($_SESSION['message'])){
        echo "<div>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
?>
    <h1>HomePage</h1>
    <h3>Hello <?php echo $_SESSION['username']; ?></h3>
    <a href="logout.php">logout</a>
</body>
</html>