<?php

require_once 'src/connectToDb.php';
require_once 'src/Models/CardModel.php';

$db = connectToDb();

$cardModel = new CardModel($db);

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
        <?php
        foreach ($filteredCards as $card) {
//            echo '<pre>';
//            var_dump($card);
            echo '<div class="card">';
            echo '<img src="' . $card['img_link'] . '" alt="' . $card['first_name'] . ' ' . $card['last_name'] . '">';
            echo '<div class="card-details">';
            echo '<div>';
            echo "<p class='cardName'>" . $card['first_name'] . ' ' . $card['last_name'] . "</p>";
            echo '</div>';
            echo '<div>';
            echo '</div>';
//            echo "<p>" . $card['release_year'] . "</p>";
            echo '<div>';
            echo "<p class='cardSport'>" . $card['sport'] . "</p>";
            echo "<p class='cardBrand'>" . $card['brand'] . "</p>";
            echo '</div>';
            echo "<p class='cardValue'>$" . $card['value'] . "</p>";
            echo '</div>';
            echo '<form  method="post">';
            echo '<input type="hidden" name=id value="' . $card['id'] . '">';
            echo '<input class="deleteButton" type="submit" name="delete" value="Remove Card">';
            echo '</form>';
            echo '<form method="get" action="editCard.php">';
            echo '<input type="hidden" name="id" value="' . $card['id'] . '">';
            echo '<input class="editButton" type="submit" name="edit" value="Edit Card Details">';
            echo '</form>';
            echo '</div>';
        }
        ?>

    </div>

</body>
</html>


