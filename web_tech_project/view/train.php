<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="user.css">
    <style>
        .train ul {
            list-style-type: none;
            padding: 0;
        }

        .train ul li {
            margin-bottom: 10px;
        }

        .train ul li a {
            display: inline-block;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s ease;
        }

        .train ul li a:hover {
            background-color: #ddd;
        }
        .image-container {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.7);
            text-align: center;
        }

        .image-container img {
            margin-top: 15%;
            max-width: 80%;
            max-height: 80%;
            border-radius: 5px;
        }

        .close {
            color: #aaa;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: black;
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
            <a href=""><h1>Train</h1></a>
        </li>
        <li>
            <a href="station.php">Station</a>
        </li>
    </ul>
</aside>
<div class="train">
    <ul>
        <li>
            <a href="#" onclick="showImage('Ekota_Express.jpg')">Ekota Express</a>
        </li>
        <li>
            <a href="#" onclick="showImage('Parabat_Express.jpg')">Parabat Express</a>
        </li>
        <li>
            <a href="#" onclick="showImage('Subarna_Express.jpg')">Subarna Express</a>
        </li>
        <li>
            <a href="#" onclick="showImage('Tista_Express.jpg')">Tista Express</a>
        </li>
    </ul>
</div>

<div class="image-container" id="imageContainer">
    <span class="close" onclick="closeImageContainer()">&times;</span>
    <img id="displayedImage" src="">
</div>

<script>
    function showImage(imageSrc) {
        var imageContainer = document.getElementById("imageContainer");
        var displayedImage = document.getElementById("displayedImage");
        displayedImage.src = imageSrc;
        imageContainer.style.display = "block";
    }
    
    function closeImageContainer() {
        var imageContainer = document.getElementById("imageContainer");
        imageContainer.style.display = "none";
    }
</script>

</body>
</html>