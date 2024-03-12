<?php

require_once 'src/connectToDb.php';
require_once 'src/Models/CardModel.php';
require_once 'src/cardViewHandler.php';

$db = connectToDb();

$cardModel = new CardModel($db);

$cardViewHandler = new cardViewHandler();

//$myCards = $cardModel->getAllCards();
// Check if the form is submitted
if (isset($_POST['delete'])) {
    // Get the card ID from the form
    $cardId = $_POST['id'];

    // Call the removeCard method
    $result = $cardModel->removeCard($cardId);
    header('Location: index.php');
}

$sports = $cardModel->getAllSports(); // You need to implement this function

$filteredCards = $cardModel->getAllCards();

if (isset($_POST['filter']) && isset($_POST['sport'])) {
    $selectedSport = $_POST['sport'];
    // Check if "All" is selected
    if ($selectedSport === "") {
        // If "All" is selected, get all cards
        $filteredCards = $cardModel->getAllCards();
    } else {
        // Otherwise, filter cards by the selected sport
        $filteredCards = $cardModel->getCardsBySport($selectedSport);
    }
} else {
    // If the form is not submitted, get all cards
    $filteredCards = $cardModel->getAllCards();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexstylesheet.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <title>All Star Cards</title>
</head>
<body>
<nav>
    <div class="nav-container">
        <a href="#" class="logo">All Star Cards</a>
        <div class="nav-links">
            <a href="#home">HOME</a>
            <a href="#current-collection">YOUR COLLECTION</a>
            <a href="addCard.php">ADD TO COLLECTION</a>
        </div>
        <div>
            <img class="sport-logo-nfl" src="https://cdn.freebiesupply.com/logos/large/2x/nfl-1-logo-black-and-white.png">
            <img class="sport-logo-nba" src="https://images.purevpn-tools.com/public/images/NBA-right-Image.png">
            <img class="sport-logo-mlb" src="https://weareninetytwo.com/wp-content/uploads/2023/01/major-league-baseball-our-work-ninety-two.png">
        </div>
    </div>
</nav>

<h1 class="heading" id="current-collection">Your Card Collection</h1>

<form class="filterForm" method="post">
    <label for="sport"></label>
    <select class="filterSelect" name="sport" id="sport">
        <option value="" selected>Select Sport</option>
        <option value="">All</option>
        <?php
        // Display the sports in the drop-down
        foreach ($sports as $sport) {
        echo '<option value="' . $sport['sport'] . '">' . $sport['sport'] . '</option>';
        }
        ?>
    </select>
    <input class="filterButton" type="submit" name="filter" value="Filter">
</form>

    <div class="card-container">
        <?php echo $cardViewHandler->displayAllCards($filteredCards) ?>
    </div>

</body>
</html>


