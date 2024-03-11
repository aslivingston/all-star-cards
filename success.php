<?php


?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <title>All Star Cards</title>
    <link rel="icon" type="image/x-icon" href="images/favIconFinal.png">
    <style>
        body{
            background-color: #F0ECE3;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
        }

        nav {
            background-color: #000;
            color: #ecf0f1;
            position: fixed;
            width: 100%;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ecf0f1;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 1rem;
        }

        .nav-links a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 0.5rem;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #3498db;
        }

        h1 {
            padding: 150px;
        }

    </style>
</head>
<body>

<nav>
    <div class="nav-container">
        <a href="#" class="logo">All Star Cards</a>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="index.php">Your Card Collection</a>
            <a href="addCard.php">Add To Your Collection</a>
        </div>
    </div>
</nav>

<h1>Update Successful!</h1>

</body>


