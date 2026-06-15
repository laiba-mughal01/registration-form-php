<?php
session_start();
if(!isset($_SESSION['name']))
{
    header("Location: login.php");
    exit();
}
$name = $_SESSION['name'];
$reverse = "";

for($i = strlen($name)-1; $i >= 0; $i--)
{
    $reverse = $reverse . $name[$i];
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
<h1>Welcome, <?php echo $reverse; ?> </h1>
<p>You have successfully logged in.</p>
<a href= "logout.php" class="logout-btn">Logout</a>
</div>
</body>
</html>