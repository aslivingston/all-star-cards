<?php

require_once 'src/connectToDb.php';
require_once 'src/Models/CardModel.php';

$db = connectToDb();
$cardModel = new CardModel($db);

if (isset($_POST['submit'])) {
    // Get the card ID from the URL
    $cardId = $_POST['id'];
    $inputtedFirstName = $_POST['first_name'];
    $inputtedLastName = $_POST['last_name'];

//    // Call the updateCard method
    $result = $cardModel->updateCard($cardId, $inputtedFirstName, $inputtedLastName);
    header('Location: success.php');
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $singleCardDetails = $cardModel->getCardById($id);

    // Check if the card exists
    if ($singleCardDetails) {
        // Display the card details
        echo '<h1>Card Details</h1>';
        echo '<p>ID: ' . $singleCardDetails->id . '</p>';
        echo '<p>First Name: ' . $singleCardDetails->first_name . '</p>';
        echo '<p>Last Name: ' . $singleCardDetails->last_name . '</p>';
        echo '<p>Release Year: ' . $singleCardDetails->release_year . '</p>';
        echo '<p>Brand: ' . $singleCardDetails->brand . '</p>';
        echo '<p>Sport: ' . $singleCardDetails->sport . '</p>';
        echo '<p>Value: ' . $singleCardDetails->value . '</p>';
        echo '<img src="' . $singleCardDetails->img_link . '" alt="' . $singleCardDetails->first_name . ' ' . $singleCardDetails->last_name . '">';
    } else {
        echo '<p>Card not found.</p>';
    }
} else {
    echo '<p>No card ID specified.</p>';
}



?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Submit a Card</title>
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

        .submit {
            padding: 100px;
        }

        .submitTitle{
            font-size: xxx-large;
            text-align: center;
        }

        .addForm2{
            display: flex;
            flex-direction: column;
            text-align: center;
            font-size: xx-large;
            width: 500px;
            box-shadow: 0px 0px 17px 2px rgba(0,0,0,0.32);
            background-color: white;
            padding-top: 0.5rem;
            padding-right: 3rem;
            padding-left: 3rem;
            padding-bottom: 2rem;
            margin-top: -1rem;
            color: #79705D;
        }


        button{

        }

        button:hover {

        }

        @media only screen and (max-width: 1000px) {
            .submitTitle {

            }

            .addForm2{
                display: flex;
                flex-direction: column;
                text-align: center;
                font-size: x-large;
                width: fit-content;
                box-shadow: 0px 0px 17px 2px rgba(0,0,0,0.32);
                background-color: white;
                padding-top: 0.5rem;
                padding-right: 3rem;
                padding-left: 3rem;
                padding-bottom: 2rem;
                margin-top: 1rem;
                color: #79705D;
            }

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

<h1>Edit Card Page</h1>

<div class="submit">
    <p class="submitTitle">Edit your Card Details</p>

    <form class="addForm2" method="post">
        <label for="first_name">First Name</label>
        <input class="addInput" type="text" id="first_name" name="first_name" placeholder="First Name">

        <label for="last_name">Last Name</label>
        <input class="addInput" type="text" id="last_name" name="last_name" placeholder="Last Name">

        <label for="release_year">Release Year</label>
        <input class="addInput" type="text" id="release_year" name="release_year">

        <label for="brand">Card Brand</label>
        <input class="addInput" type="text" id="brand" name="brand" placeholder="Card Brand">

        <label for="sport">Sport</label>
        <input class="addInput" type="text" id="sport" name="sport" placeholder="Sport">

        <label for="value">Value</label>
        <input class="addInput" type="number" id="value" name="value" placeholder="value">

        <label for="image">Image</label>
        <input class="addInput" type="text" id="image" name="img_link" placeholder="Image URL...">

        <div class="buttonPosition">
            <input type="hidden" name="id" value="<?php echo isset($singleCardDetails->id) ? $singleCardDetails->id : ''; ?>">
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>

</div>

</body>
