<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
}

require_once 'user_controller.php';

$data = mysqli_connect("localhost", "root", "", "webtech_project");

$controller = new UserController($data);

if (isset($_POST['update_profile'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if ($controller->updateProfile($name, $phone, $email, $password, $_SESSION['username'])) {
        $_SESSION['username'] = $name;
        $message = "Profile updated successfully";
    } else {
        $error = "Error updating profile";
    }
}

$info = $controller->getUserInfo($_SESSION['username']);
$balance = $controller->getUserBalance($_SESSION['username']);
?>

<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
<header class="header">
    <a href="user.php">User Profile</a>
    <div class="logout">
        <a href="logout.php">logout</a>
    </div>
</header>
<aside>
    <ul>
        <li>
            <a href=""><h1>Profile</h1></a>
        </li>
        <li>
            <a href="ticket.php">Online Ticket</a>
        </li>
        <li>
            <a href="train.php">Train</a>
        </li>
        <li>
            <a href="station.php">Station</a>
        </li>
    </ul>
</aside>
<div class="content">
    <center>
        <h1>Update Profile</h1>
        <div class="profile">
            <form method="post">
                <div class="profile">
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo isset($info['username']) ? $info['username'] : ''; ?>">
                </div>
                <div class="profile">
                    <label>Phone</label>
                    <input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>">
                </div>
                <div class="profile">
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>">
                </div>
                <div class="profile">
                    <label>Password</label>
                    <input type="password" name="password" value="<?php echo isset($info['password']) ? $info['password'] : ''; ?>">
                </div>
                <div class="profile">
                    <label>Balance: <?php echo isset($balance) ? $balance : ''; ?></label>
                </div>
                <div>
                    <input type="submit" name="update_profile" value="UPDATE">
                </div>
                <?php
                    if (isset($message)) {
                        echo "<p>$message</p>";
                    }
                    if (isset($error)) {
                        echo "<p>$error</p>";
                    }
                ?>
            </form>
        </div>
    </center>
</div>
</body>
</html>