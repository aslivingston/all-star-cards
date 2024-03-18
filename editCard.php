<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Submit a Card</title>
    <link rel="icon" type="image/x-icon" href="images/favIconFinal.png">
    <link rel="stylesheet" href="editCard.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">

</head>
<body>

<nav>
    <div class="nav-container">
        <a href="index.php" class="logo">All Star Cards</a>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="yourCollection.php">Your Card Collection</a>
            <a href="addCard.php">Add To Your Collection</a>
        </div>
        <div>
            <img class="sport-logo-nfl" src="https://cdn.freebiesupply.com/logos/large/2x/nfl-1-logo-black-and-white.png">
            <img class="sport-logo-nba" src="https://images.purevpn-tools.com/public/images/NBA-right-Image.png">
            <img class="sport-logo-mlb" src="https://weareninetytwo.com/wp-content/uploads/2023/01/major-league-baseball-our-work-ninety-two.png">
        </div>
    </div>
</nav>

<h1 class="heading">Edit Your Card</h1>

<?php

require_once 'src/connectToDb.php';
require_once 'src/Models/CardModel.php';

$db = connectToDb();
$cardModel = new CardModel($db);
$errorMessageFirstName = '';
$errorMessageLastName = '';

if (isset($_POST['submit'])) {
    // Get the card ID from the URL
    $cardId = $_POST['id'];
    $inputtedFirstName = $_POST['first_name'];
    $inputtedLastName = $_POST['last_name'];

    if (!$inputtedFirstName || $inputtedFirstName == "") {
        $errorMessageFirstName = 'You need to include a First Name';
    }

    if (!$inputtedLastName || $inputtedLastName == "") {
        $errorMessageLastName = 'You need to include a Last Name!';
    }

    else {
        $result = $cardModel->updateCard($cardId, $inputtedFirstName, $inputtedLastName);
    }
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $singleCardDetails = $cardModel->getCardById($id);

    // Check if the card exists
    if ($singleCardDetails) {
        // Display the card details
        echo '<h1>Card Details</h1>';
        echo '<div class="cardContainer">';
        echo '<div class="editCardDetails">';
        echo '<p>First Name: ' . $singleCardDetails->first_name . '</p>';
        echo '<p>Last Name: ' . $singleCardDetails->last_name . '</p>';
        echo '<p>Release Year: ' . $singleCardDetails->release_year . '</p>';
        echo '<p>Brand: ' . $singleCardDetails->brand . '</p>';
        echo '<p>Sport: ' . $singleCardDetails->sport . '</p>';
        echo '<p>Value: $' . $singleCardDetails->value . '</p>';
        echo '</div>';
        echo '<img class="editImage" src="' . $singleCardDetails->img_link . '" alt="' . $singleCardDetails->first_name . ' ' . $singleCardDetails->last_name . '">';
        echo '</div>';
    } else {
        echo '<p>Card not found.</p>';
    }
} else {
    echo '<p>No card ID specified.</p>';
}



?>

<div class="submit">
    <h1>Edit your Card Details</h1>

    <form class="editForm" method="post">
        <label for="first_name">First Name</label>
        <input class="addInput" type="text" id="first_name" name="first_name">
        <?php if (!empty($errorMessageFirstName)) : ?>
            <p class="error"><?php echo $errorMessageFirstName; ?></p>
        <?php endif; ?>

        <label for="last_name">Last Name</label>
        <input class="addInput" type="text" id="last_name" name="last_name">
        <?php if (!empty($errorMessageLastName)) : ?>
            <p class="error"><?php echo $errorMessageLastName; ?></p>
        <?php endif; ?>

        <label for="release_year">Release Year</label>
        <input class="addInput" type="text" id="release_year" name="release_year">

        <label for="brand">Card Brand</label>
        <input class="addInput" type="text" id="brand" name="brand">

        <label for="sport">Sport</label>
        <input class="addInput" type="text" id="sport" name="sport">

        <label for="value">Value</label>
        <input class="addInput" type="number" id="value" name="value">

        <label for="image">Image</label>
        <input class="addInput" type="text" id="image" name="img_link" placeholder="Image URL">

        <div class="buttonPosition">
            <input type="hidden" name="id" value="<?php echo isset($singleCardDetails->id) ? $singleCardDetails->id : ''; ?>">
            <input class="submitButton" type="submit" name="submit" value="Submit">
        </div>
    </form>
</div>

<footer>
    <p>&#169 ALL STAR CARDS</p>
    <p>PRIVACY | TERMS AND CONDITIONS</p>
</footer>

</body>
