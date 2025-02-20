<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit; 
}

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "webtech_project";
$data = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch recent user activities
$userLogsSql = "SELECT user_logs.timestamp, user.username, user_logs.action, user_logs.details 
                FROM user_logs 
                JOIN user ON user_logs.user_id = user.id 
                ORDER BY user_logs.timestamp DESC LIMIT 10";
$userLogsResult = mysqli_query($data, $userLogsSql);

if (!$userLogsResult) {
    die("Error fetching user logs: " . mysqli_error($data));
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            height: 100vh;
            overflow: auto;
        }

        .content {
            margin-left: 200px;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        table {
            width: 60%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        @media (max-width: 768px) {
            table {
                width: 90%;
            }
        }
    </style>
</head>
<body>
<header class="header">
    <a href="adminhome.php">Admin Dashboard</a>
    <div class="logout">
        <a href="logout.php">logout</a>
    </div>
</header>
<aside>
    <ul>
        <li>
            <a href="add_user.php">Add User</a>
        </li>
        <li>
            <a href="add_manager.php">Add Manager</a>
        </li>
        <li>
            <a href="view_manager.php">View Manager</a>
        </li>
        <li>
            <a href="add_employee.php">Add Employee</a>
        </li>
        <li>
            <a href="view_employee.php">View And Update Users</a>
        </li>
        <li>
            <a href="delete_user.php">Manage All Users</a>
        </li>
        <li>
            <a href=""><h1>User Activity Logs</h1></a>
        </li>
    </ul>
</aside>
<div class="container">
    <div class="content">
        <center>
            <h1>Recent User Activities</h1>
            <table>
                <tr>
                    <th>Timestamp</th>
                    <th>User</th>
                    <th>Action</th>
                    <th>Details</th>
                </tr>
                <?php while ($log = mysqli_fetch_assoc($userLogsResult)): ?>
                    <tr>
                        <td><?php echo $log['timestamp']; ?></td>
                        <td><?php echo $log['username']; ?></td>
                        <td><?php echo $log['action']; ?></td>
                        <td><?php echo $log['details']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </center>
    </div>
</div>
</body>
</html>