<?php

require_once 'src/connectToDb.php';
require_once 'src/Models/CardModel.php';
require_once 'src/cardViewHandler.php';

$db = connectToDb();

$cardModel = new CardModel($db);

$cardViewHandler = new cardViewHandler();

$myCards = $cardModel->getAllCards();

// Check if the form is submitted
if (isset($_POST['delete'])) {
    // Get the card ID from the form
    $cardId = $_POST['id'];

    // Call the removeCard method
    $result = $cardModel->removeCard($cardId);
    header('Location: index.php');
}

$sports = $cardModel->getAllSports(); // You need to implement this function


// Check if the form is submitted
if (isset($_POST['filter'])) {
    if ($selectedSport = $_POST['sport']) {
        $filteredCards = $cardModel->getCardsBySport($selectedSport);
    } else {
        $filteredCards = $cardModel->getAllCards();
    }
    // Call a function to get cards filtered by the selected sport
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
    <link rel="stylesheet" href="index.css"/>
    <title>All Star Cards</title>
</head>
<body>
<nav>
    <div class="nav-container">
        <a href="#" class="logo">All Star Cards</a>
        <div class="nav-links">
            <a href="#home">Home</a>
            <a href="#current-collection">Your Card Collection</a>
            <a href="addCard.php">Add To Your Collection</a>
            <a href="intro.php">About Us</a>
        </div>
    </div>
</nav>



<h1 id="current-collection">Your Card Collection</h1>

<form method="post">
    <label for="sport">Filter by Sport:</label>
    <select name="sport" id="sport">
        <option value="" selected>Select Sport</option>
        <option value="">All</option>
        <?php
        // Display the sports in the drop-down
        foreach ($sports as $sport) {
        echo '<option value="' . $sport['sport'] . '">' . $sport['sport'] . '</option>';
        }
        ?>
    </select>
    <input type="submit" name="filter" value="Filter">
</form>

    <div class="card-container">
        <?php echo $cardViewHandler->displayAllCards($myCards) ?>

    </div>

</body>
</html>


