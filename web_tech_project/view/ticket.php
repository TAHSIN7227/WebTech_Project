<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
}

require_once 'ticket_controller.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webtech_project";


?>

<!DOCTYPE html>
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
                <a href="user_view.php">Profile</a>
            </li>
            <li>
                <a href=""><h1>Online Ticket</h1></a>
            </li>
            <li>
                <a href="seatreserve.php">Seat Reserve</a>
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
            <h1>BUY TICKET</h1>
            <div class="profile">
                <form action="seatreserve.php" method="GET">
                    <div class="profile">
                        <label>START</label>
                        <select name="start">
                            <option value="Dhaka" <?php if ($ticketInfo['start'] == 'Dhaka') echo 'selected'; ?>>Dhaka</option>
                            <option value="Chittagong" <?php if ($ticketInfo['start'] == 'Chittagong') echo 'selected'; ?>>Chittagong</option>
                            <option value="Sylhet" <?php if ($ticketInfo['start'] == 'Sylhet') echo 'selected'; ?>>Sylhet</option>
                            <option value="Mymensingh" <?php if ($ticketInfo['start'] == 'Mymensingh') echo 'selected'; ?>>Mymensingh</option>
                            <option value="Rajshahi" <?php if ($ticketInfo['start'] == 'Rajshahi') echo 'selected'; ?>>Rajshahi</option>
                            <option value="Rangpur" <?php if ($ticketInfo['start'] == 'Rangpur') echo 'selected'; ?>>Rangpur</option>
                            <option value="khulna" <?php if ($ticketInfo['start'] == 'Khulna') echo 'selected'; ?>>Khulna</option>
                        </select>
                    </div>
                    <div class="profile">
                        <label>END</label>
                        <select name="end">
                        <option value="Dhaka" <?php if ($ticketInfo['end'] == 'Dhaka') echo 'selected'; ?>>Dhaka</option>
                            <option value="Chittagong" <?php if ($ticketInfo['end'] == 'Chittagong') echo 'selected'; ?>>Chittagong</option>
                            <option value="Sylhet" <?php if ($ticketInfo['end'] == 'Sylhet') echo 'selected'; ?>>Sylhet</option>
                            <option value="Mymensingh" <?php if ($ticketInfo['end'] == 'Mymensingh') echo 'selected'; ?>>Mymensingh</option>
                            <option value="Rajshahi" <?php if ($ticketInfo['end'] == 'Rajshahi') echo 'selected'; ?>>Rajshahi</option>
                            <option value="Rangpur" <?php if ($ticketInfo['end'] == 'Rangpur') echo 'selected'; ?>>Rangpur</option>
                            <option value="khulna" <?php if ($ticketInfo['end'] == 'Khulna') echo 'selected'; ?>>Khulna</option>
                            
                        </select>
                    </div>
                    <div class="profile">
                        <label>Choose class</label>
                        <select name="class">
                            <option value="AC" <?php if ($ticketInfo['class'] == 'AC') echo 'selected'; ?>>AC</option>
                            <option value="NON AC" <?php if ($ticketInfo['class'] == 'NON AC') echo 'selected'; ?>>NON AC</option>
                        </select>
                    </div>
                    <div class="profile">
                        <label>Quantity</label>
                        <select name="quantity">
                            <option value="1" <?php if ($ticketInfo['quantity'] == '1') echo 'selected'; ?>>1</option>
                            <option value="2" <?php if ($ticketInfo['quantity'] == '2') echo 'selected'; ?>>2</option>
                            <option value="3" <?php if ($ticketInfo['quantity'] == '3') echo 'selected'; ?>>3</option>
                            <option value="4" <?php if ($ticketInfo['quantity'] == '4') echo 'selected'; ?>>4</option>
                        
                        </select>
                    </div>
                    <div class="profile">
                        <input type="submit" value="NEXT">
                    </div>
                </form>
            </div>
        </center>
    </div>
</body>
</html>