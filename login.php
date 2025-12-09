<?php
session_start();
include 'db.php';

$message = "";
if($_POST){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if($user = mysqli_fetch_assoc($result)){
        if(password_verify($pass, $user['password'])){
            $_SESSION['name'] = $user['name'];
            header("Location: index.php");
            exit();
        }
    }
    $message = "Invalid email or password!";
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title><link rel="stylesheet" href="css/style.css"></head>
<body>
<div class="container">
    <form method="POST">
        <h2 style="text-align:center;">Login</h2>
        <?php if($message): ?>
            <p style="color:red; text-align:center;"><?php echo $message; ?></p>
        <?php endif; ?>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn">Login</button>
        <p style="text-align:center;">No account? <a href="register.php">Register</a></p>
    </form>
</div>
</body>
</html>