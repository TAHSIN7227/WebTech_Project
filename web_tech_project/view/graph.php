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


$financialData = array(500000, 600000, 700000, 800000, 900000, 1000000);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
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
            <a href=""><h1>Financial Graph</h1></a>
        </li>
    </ul>
</aside>
<div class="content">
    <center>
        <h1>Financial Situation of BD Railway Company</h1>
        <br>
        <canvas id="financialChart" width="400" height="200"></canvas>
    </center>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Get financial data from PHP
    var financialData = <?php echo json_encode($financialData); ?>;
    
    // Chart.js configuration
    var ctx = document.getElementById('financialChart').getContext('2d');
    var financialChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Financial Situation (BD Railway Company)',
                data: financialData,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
</body>
</html>