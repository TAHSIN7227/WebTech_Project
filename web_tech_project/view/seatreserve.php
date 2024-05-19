<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
}

require_once 'reservation_controller.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webtech_project";

$controller = new ReservationController($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start = $_POST["start"] ?? '';
    $end = $_POST["end"] ?? '';
    $class = $_POST["class"] ?? '';
    $quantity = $_POST["quantity"] ?? '';
    $reserve = $_POST["reserve"] ?? '';

    $username = $_SESSION['username'];

    $message = $controller->reserveSeat($start, $end, $class, $quantity, $reserve, $username);
}

?>


<?php

require_once 'ticket_controller.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webtech_project";

$controller = new TicketController($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start = $_POST["start"] ?? '';
    $end = $_POST["end"] ?? '';
    $class = $_POST["class"] ?? '';
    $quantity = $_POST["quantity"] ?? '';
    $reserve = $_POST["reserve"] ?? '';

    $username = $_SESSION['username'];
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="seatreserve.css">
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
                <a href="user_view.php">Profile</a>
            </li>
            <li>
                <a href="ticket.php">Online Ticket</a>
            </li>
            <li>
                <a href=""><h1>Seat Reserve</h1></a>
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
            <h1>RESERVE</h1>
            <div class="profile">
                <form action="seatreserve.php" method="post">
                    <div class="profile">
                        <label>Reserve</label><br>
                        <input type="hidden" name="start" value="<?php echo $_GET['start'] ?? ''; ?>">
                        <input type="hidden" name="end" value="<?php echo $_GET['end'] ?? ''; ?>">
                        <input type="hidden" name="class" value="<?php echo $_GET['class'] ?? ''; ?>">
                        <input type="hidden" name="quantity" value="<?php echo $_GET['quantity'] ?? ''; ?>">
                        <input type="radio" name="reserve" value="option1">
                        <img src="Train-Seat-ACB1.jpg" alt="Option 1"><br>
                        <input type="radio" name="reserve" value="option2">
                        <img src="Train-Seat-FBerth1.jpg" alt="Option 2"><br>
                        <input type="radio" name="reserve" value="option1">
                        <img src="Train-Seat-SChair2.jpg" alt="Option 3"><br>
                        <input type="radio" name="reserve" value="option1">
                        <img src="Train-Seat-Shovon1.jpg" alt="Option 4"><br>
                        <input type="radio" name="reserve" value="option1">
                        <img src="Train-Seat-Snighdha3.jpg" alt="Option 5"><br>
                        <input type="radio" name="reserve" value="option1">
                        <img src="Train-Seat-Sulov1.jpg" alt="Option 6"><br>
                    </div>
                    <input type="submit" name="update_profile" value="Reserve">
                    <?php
                        if (isset($message)) {
                            echo "<p><center>$message</center></p>";
                        }
                    ?>
                </form>
            </div>
        </center>
    </div>
</body>
</html>