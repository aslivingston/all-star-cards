<?php

require_once 'src/connectToDb.php';
require_once 'src/Models/CardModel.php';

$db = connectToDb();
$cardModel = new CardModel($db);

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

<div class="submit">
    <p class="submitTitle">Add to your Card Vault</p>

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

        <label for="Value">Value</label>
        <input class="addInput" type="number" id="value" name="value" placeholder="value">

        <label for="image">Image</label>
        <input class="addInput" type="text" id="image" name="img_link" placeholder="Image URL...">

        <div class="buttonPosition">
            <input type="submit" name="submit" value="Submit New Card!">
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

//    if (!isset($_POST["brand"]) || $_POST["brand"] == "") {
//        $message = false;
//        echo 'You need to include a brand';
//        echo '<br>';
//    }
//    if (!isset($_POST["sport"]) || $_POST["sport"] == "") {
//        $message = false;
//        echo 'You need to include a sport category';
//        echo '<br>';
//    }
//    if (!isset($_POST["value"]) || $_POST["value"] == 0) {
//        $message = false;
//        echo 'You need to include a value';
//        echo '<br>';
//    }
//    if (!isset($_POST["img_link"]) || $_POST["img_link"] == "") {
//        $message = false;
//        echo 'You need to include an image link';
//        echo '<br>';
//    }

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

<p>&#169 2024 Alex Livingston</p>
</body>


