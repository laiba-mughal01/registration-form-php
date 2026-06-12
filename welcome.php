<?php
session_start();
if(!isset($_SESSION['name']))
{
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="welcome-container">
<h1>Welcome, <?php echo $_SESSION['name']; ?> </h1>
<p>You have successfully logged in.</p>
<a href= "logout.php" class="logout-btn">Logout</a>
</div>
</body>
</html>