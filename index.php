<?php session_start(); include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>GameLibrary</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>GameLibrary</h1>
        <nav>
            <a href="index.php">Home</a>
            <?php if(isset($_SESSION['name'])): ?>
                <span>Welcome, <?php echo $_SESSION['name']; ?></span>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php endif; ?>
        </nav>
    </header>

    <div class="container">
        <?php if(isset($_SESSION['name'])): ?>
            <div class="welcome">You are logged in!</div>
        <?php endif; ?>

        <h2 style="text-align:center; margin:20px 0;">Available Games</h2>
        <div class="games-grid">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM games");
            while($game = mysqli_fetch_assoc($result)):
            ?>
                <div class="game-card">
                    <img src="images/<?php echo $game['image']; ?>" alt="<?php echo $game['title']; ?>">
                    <h3><?php echo $game['title']; ?></h3>
                    <p><?php echo $game['genre']; ?> | $<?php echo $game['price']; ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>