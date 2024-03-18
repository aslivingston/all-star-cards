<?php

require_once 'src/connectToDb.php';
require_once 'src/Models/CardModel.php';

$db = connectToDb();
$cardModel = new CardModel($db);

?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <title>All Star Cards</title>
    <link rel="icon" type="image/x-icon" href="images/favIconFinal.png">
    <link rel="stylesheet" href="addCard.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">

</head>

<body>

<nav>
    <div class="nav-container">
        <a href="index.php" class="logo">All Star Cards</a>
        <div class="nav-links">
            <a href="index.php">HOME</a>
            <a href="yourCollection.php">YOUR COLLECTION</a>
            <a href="addCard.php">ADD TO COLLECTION</a>
        </div>
        <div>
            <img class="sport-logo-nfl" src="https://cdn.freebiesupply.com/logos/large/2x/nfl-1-logo-black-and-white.png">
            <img class="sport-logo-nba" src="https://images.purevpn-tools.com/public/images/NBA-right-Image.png">
            <img class="sport-logo-mlb" src="https://weareninetytwo.com/wp-content/uploads/2023/01/major-league-baseball-our-work-ninety-two.png">
        </div>
    </div>
</nav>

<div class="submit">
    <h2 class="addTitle">Add to your Card Vault</h2>

    <form class="addForm" method="post">
        <label for="first_name">First Name</label>
        <input class="addInput" type="text" id="first_name" name="first_name">

        <label for="last_name">Last Name</label>
        <input class="addInput" type="text" id="last_name" name="last_name">

        <label for="release_year">Release Year</label>
        <input class="addInput" type="text" id="release_year" name="release_year">

        <label for="brand">Card Brand</label>
        <input class="addInput" type="text" id="brand" name="brand">

        <label for="sport">Sport</label>
        <input class="addInput" type="text" id="sport" name="sport">

        <label for="Value">Value</label>
        <input class="addInput" type="number" id="value" name="value">

        <label for="image">Image URL</label>
        <input class="addInput" type="text" id="image" name="img_link">

        <div class="buttonPosition">
            <input class="submitButton" type="submit" name="submit" value="Submit New Card!">
        </div>
    </form>

</div>

<?php
if (isset($_POST['submit'])) {
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : null;
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : null;
    $release_year = isset($_POST['release_year']) ? $_POST['release_year'] : null;
    $brand = isset($_POST['brand']) ? $_POST['brand'] : null;
    $sport = isset($_POST['sport']) ? $_POST['sport'] : null;
    $value = isset($_POST['value']) ? $_POST['value'] : null;
    $img_link = isset($_POST['img_link']) ? $_POST['img_link'] : null;

    if (!$first_name || $first_name == "") {
        $message = false;
        echo 'You need to include a First Name';
        echo '<br>';
    }

    if (!$last_name || $last_name == "") {
        $message = false;
        echo 'You need to include a Last Name!';
        echo '<br>';
    }

    // Validate and sanitize the release_year value
    if (!is_numeric($release_year) || $release_year < 1901) {
        $message = false;
        echo 'Invalid Release Year!';
        echo '<br>';
    }

    $cardModel->registerCard($first_name, $last_name, $release_year, $brand, $sport, $value, $img_link);
    $message = true;


    if($message === false)
    {
        echo "<img src='https://i.gifer.com/3Q7h.gif' class='submitGif'/>";
    }
    if ($message === true){
        echo "Thank you for adding to your card collection!";
        echo '<br>';
        echo "<img src='https://media3.giphy.com/media/3ov9jWLbdZISvS7RCM/giphy.gif?cid=6c09b952cudfg0gj0juh1fvffw3jtw0it0jtc6lic6sa0zs4&ep=v1_internal_gif_by_id&rid=giphy.gif&ct=g' class='submitGif'/>";
    }
}
?>

<footer>
    <p>&#169 ALL STAR CARDS</p>
    <p>PRIVACY | TERMS AND CONDITIONS</p>
</footer>
</body>


