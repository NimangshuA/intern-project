<?php

session_start();

$name = $_SESSION['name'] ?? null;
$alerts = $_SESSION['alerts'] ?? [];
$active_form = $_SESSION['active_form'] ?? '';

session_unset();

if ($name !== null) $_SESSION['name'] =$name;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Stack Website With Login & Registration | Codehal</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <header>
        <a href="#" class="logo">Welcome To My First Project</a>

        <nav>
            <a href="index.php?page=home">Home</a>
            <a href="index.php?page=about">About</a>
            <a href="index.php?page=collection">Collection</a>
            <a href="index.php?page=contact">Contact</a>
        </nav>

        <div class="user-auth">
            <?php if (!empty($name)): ?>
            <div class="profile-box">
                <div class="avatar-circle"><?= strtoupper($name[0]); ?></div>
                <div class="dropdown">
                    <a href="#">My Account</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
            <?php else: ?>
            <button type="button" class="login-btn-modal">login</button>
            <?php endif; ?>
        </div>
    </header>

    <section>
<?php
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'about':
        echo "<h1>About Us</h1>";
        echo "<p>This is the about page.<br>
              Hi, I'm <strong>Nimangshu Acharjee</strong> and I'm pursuing my BCA degree.<br>
              You're currently viewing my first project!</p>";
        break;

    case 'collection':
        echo "<h1>Our Collection</h1>";
        echo "<p>Hello! This is currently in development, so there's no collection right now.</p>";
        break;

    case 'contact':
        echo "<h1>Contact Us</h1>";
        echo "<p>If you like the content, feel free to:<br>
              📧 Email: <a href='mailto:Hellouser@gmail.com'>Hellouser@gmail.com</a><br>
              📞 Call: 0123456789</p>";
        break;

    case 'home':
    default:
        echo "<h1>Hey-" . htmlspecialchars($name ?? 'Developer') . "-!</h1>";
        break;
}
?>
</section>

    <?php if (!empty($alerts)): ?>
    <div class="alert-box">
        <?php foreach ($alerts as $alert): ?>
        <div class="alert <?= $alert['type'] ?>">
            <i class='bx <?= $alert['type'] === 'success' ? 'bxs-check-circle' : 'bxs-x-circle'; ?>'></i>
            <span><?= $alert['message']; ?></span> 
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="auth-modal <?= $active_form === 'register' ? 'show slide' : ($active_form === 'login' ? 'show' : ''); ?>">
<button type="button" class="close-btn-modal"><i class='bx  bx-x'></i> </button>

        <div class="form-box login">
            <h2>Login</h2>
            <form action="auth_process.php" method="POST">
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class='bx bxs-envelope-alt '></i> 
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-keyhole '></i> 
                </div>
                <button type="submit" name="login_btn" class="btn">Login</button>
                <p>Don't Have An Account? <a href="#" class="register-link">Register</a></p>
            </form>
        </div>

        <div class="form-box register">
            <h2>Register</h2>
            <form action="auth_process.php" method="POST">
                <div class="input-box">
                    <input type="text" name="name" placeholder="Name" required>
                    <i class='bx bxs-user-circle'></i>  
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class='bx bxs-envelope-alt '></i> 
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-keyhole '></i> 
                </div>
                <button type="submit" name="register_btn" class="btn">Register</button>
                <p>Already Have An Account? <a href="#" class="login-link">Login</a></p>
            </form>
        </div>
    </div>

    
    <script src="script.js"></script>
</body>

</html>