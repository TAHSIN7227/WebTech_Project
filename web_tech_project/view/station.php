<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="user.css">
    <style>
      .station {
    display: none;
    padding: 10px;
}

.station h2 {
    margin-bottom: 5px;
}
    </style>
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
            <a href="train.php">Train</a>
        </li>
        <li>
            <a href="#"><h1>Station</h1></a>
        </li>
    </ul>
</aside>
<div class="divisionstation">
    <ul>
        <li>
            <a href="#" onclick="showStations('Dhaka')">Dhaka</a>
        </li>
        <li>
            <a href="#" onclick="showStations('Chittagong')">Chittagong</a>
        </li>
        <li>
            <a href="#" onclick="showStations('Sylhet')">Sylhet</a>
        </li>
        <li>
            <a href="#" onclick="showStations('Mymensingh')">Mymensingh</a>
        </li>
        <li>
            <a href="#" onclick="showStations('Rajshahi')">Rajshahi</a>
        </li>
    </ul>
</div>
<div class="station" id="Dhaka"> 
    <h2>Kamalapur Railway Station</h2>
<h2>Banani railway station</h2>
<h2>Cantonment railway station</h2>
<h2>Gendaria railway station</h2>
<h2>Dhaka Airport railway station</h2>
<h2>Shyampur Baraitala railway station</h2>
<h2>Tejgaon railway station</h2>
    
   </div>
<div class="station" id="Chittagong">
    <h2>Chittagong Railway Station</h2>
    <h2>Balakhal Railway Station</h2>
    <h2>Chandpur Railway Station</h2>
    <h2>Chadpur Court Railway Station</h2>
    <h2>Chtoshi Road Railway Station</h2>
    <h2>Haziganj Railway Station</h2>
    <h2>Meher Railway Station</h2>
    <h2>Madhu Road Railway Station</h2>
    <h2>Maishadi Railway Station</h2>
    <h2>Shahrasti Railway Station</h2>
    <h2>Shahtoli Railway Station</h2>
    <h2>Waruk Railway Station</h2>
    
</div>
<div class="station" id="Sylhet">
<h2>Loshkorpur Railway Station</h2>
<h2>Rashidpur Railway Station</h2>
<h2>Satiajuri Railway Station</h2>
<h2>Shaestagonj Railway Station</h2>
<h2>Shahzibazar Railway Station</h2>
<h2>Shutang Railway Station</h2>
    
</div>
<div class="station" id="Mymensingh">
<h2>Agriculture University Railway Station</h2>
<h2>Ahmadbari Railway Station</h2>
<h2>Atharbari Railway Station</h2>
<h2>Aulianagar Railway Station</h2>
<h2>Baigonbari Railway Station</h2>
<h2>Biddyaganj Railway Station</h2>
<h2>Bishka Railway Station</h2>
<h2>Bokainagar Railway Station</h2>
<h2>Dhola Railway Station</h2>
<h2>Fatemanagar Railway Station</h2>
<h2>Gafargaon Railway Station</h2>
<h2>Gouripur Junction railway station</h2>
<h2>Ishwarganj Railway Station</h2>
<h2>Nandail Railway Station</h2>
<h2>Nimtoli Bazar Railway Station</h2>
<h2>Moshakhali Railway Station</h2>
<h2>Moshiurnagar Railway Station</h2>
<h2>Mushuli Railway Station</h2>
<h2>Mymensingh Junction railway station</h2>
<h2>Mymensingh Road Railway Station</h2>
<h2>Shohagi Railway Station</h2>
<h2>Shomvuganj Railway Station</h2>
<h2>Shutiyakhali Railway Station</h2>
<h2>Shyamganj Junction railway station</h2>
    
</div>

<div class="station" id="Rajshahi">
<h2>Santahar Junction railway station</h2>
<h2>Altafnagar railway station</h2>
<h2>Bogra railway station</h2>
<h2>Chatian Gram railway station</h2>
<h2>Gabtali railway station</h2>
<h2>Helaliarhat railway station</h2>
<h2>Kahalu railway station</h2>
<h2>Nosrotpur Railway Station</h2>
<h2>Pachpir Majar Railway Station</h2>
<h2>Sonatala Railway Station</h2>
<h2>Sukhanpulur Railway Station</h2>
<h2>Syed Ahmed College Railway Station</h2>
<h2>Talora Railway Station</h2>
<h2>Velurpara Railway Station</h2>
</div>
      </div>
<script>
    function showStations(division) {
        var stations = document.getElementsByClassName("station");
        for (var i = 0; i < stations.length; i++) {
            stations[i].style.display = "none";
        }
        document.getElementById(division).style.display = "block";
    }
</script>
</body>
</html>