<?php
include 'db.php';
$message="";
if(isset($_POST['register']))
{
   $name= mysqli_real_escape_string($conn,$_POST['fullname']);
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $password= $_POST['password'];

    if(
        strlen($password) < 8 ||
        !preg_match("/[A-Z]/", $password) ||
        !preg_match("/[a-z]/", $password) ||
        !preg_match("/[0-9]/", $password) ||
        !preg_match("/[\W]/", $password) 
    )
 {
    $message = "Password must contain 8 characters, uppercase, lowercase, number, and special characters.";
 }
 else{
    $hashedPassword= password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO register(name,email,password)
   VALUES('$name', '$email', '$hashedPassword')";

   if(mysqli_query($conn,$sql))
    {
         header("Location: login.php");
         exit();
    }else{
        $message="Email already exists";
    }
 }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Registration Form</h2>
    <p><?php echo $message; ?></p>
     <form method="POST">
        Name: <input type="text" name="fullname" placeholder = "Full Name" required><br><br>
        E-mail: <input type="text" name="email" placeholder = "Email" required><br><br>
        Password: <input type = "password" name ="password" placeholder = "Password" required><br><br>
 <button type= "submit" name="register">Register</button>
</form>

<br>
<a href="login.php">Already have an account?</a>
</div>
</body>
</html>