<?php
session_start();
include 'db.php';
$message="";
if(isset($_POST['login']))
{
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $password= $_POST['password'];

    $sql= "SELECT * FROM register WHERE email='$email'";
    $result= mysqli_query($conn,$sql);

     if(mysqli_num_rows($result) > 0)
    {
        $user = mysqli_fetch_assoc($result);

        if(password_verify($password,$user['password']))
        {
            $_SESSION['name'] = $user['name'];

            header("Location: welcome.php");
            exit();
        }
        else
        {
            $message = "Invalid Password";
        }
    }
    else
    {
        $message = "User Not Found";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Login Form</h2>
  <p><?php echo $message; ?></p>

   <form method="POST">
   E-mail: <input type="text" name="email" placeholder = "Email" required><br><br>
   Password: <input type = "password" name ="password" placeholder = "Password" required><br><br>
 <button type= "submit" name="login">Login</button>
</form>
<br>
<a href= "register.php">Create Account</a>
</div>
</body>
</html>