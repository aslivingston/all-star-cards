<?php

require_once 'src/Models/CardModel.php';

class cardViewHandler
{
    public function displayAllCards(array $filteredCards): string
    {
        $cardDetails = '';
        foreach ($filteredCards as $card) {
            $cardDetails .= "<div class='card'>
    <img src='{$card['img_link']} alt='{$card['first_name']} {$card['last_name']}'>
    <div class='card-details'>
        <div>
            <p class='cardName'>{$card['first_name']} {$card['last_name']}</p>
        </div>
        <div>
            <p class='cardSport'>{$card['sport']}</p>
            <p class='cardBrand'>{$card['brand']}</p>
        </div>
        <p class='cardValue'>$ {$card['value']}</p>
    </div>
    <form method='post'>
        <input type='hidden' name='id' value='{$card['id']}'>
        <input class='deleteButton' type='submit' name='delete' value='Remove Card'>
    </form>
    <form method='get' action='editCard.php'>
        <input type='hidden' name='id' value='{$card['id']}'>
        <input class='editButton' type='submit' name='edit' value='Edit Card Details'>
    </form>
</div>";
        }
        return $cardDetails;
    }
}
