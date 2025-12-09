<?php
session_start();
include 'db.php';

$message = "";
if($_POST){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($check) > 0){
        $message = "Email already exists!";
    } else {
        mysqli_query($conn, "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$pass')");
        $message = "Registered successfully! <a href='login.php'>Click here to login</a>";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Register</title><link rel="stylesheet" href="css/style.css"></head>
<body>
<div class="container">
    <form method="POST">
        <h2 style="text-align:center;">Register</h2>
        <p style="text-align:center; color:<?php echo strpos($message,'success') ? 'green' : 'red'; ?>">
            <?php echo $message; ?>
        </p>
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn">Register</button>
        <p style="text-align:center;">Have account? <a href="login.php">Login</a></p>
    </form>
</div>
</body>
</html>