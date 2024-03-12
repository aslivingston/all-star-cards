<?php

require_once 'src/Models/CardModel.php';

class cardViewHandler
{
    public function displayAllCards(array $filteredCards): string
    {
        $cardDetails = '';
        foreach ($filteredCards as $card) {
            // Set background color based on the sport
            $backgroundColor = $this->getBackgroundColor($card['sport']);

            $cardDetails .=
                "<div class='card' style='background-color: $backgroundColor;'>
                    <img class='card-img' src='{$card['img_link']}' alt='{$card['first_name']} {$card['last_name']}'>
                    <div class='card-details'>
                        <div>
                            <p class='cardName'>{$card['first_name']} {$card['last_name']}</p>
                        </div>
                        <div class='card-grid'>
                            <div>
                                 <p class='cardSport'>{$card['sport']}</p>
                            </div>
                            <div>
                                 <p class='cardBrand'>{$card['brand']}</p>
                            </div>
                            <div>
                                <img class='sport-logo' src='{$card['logo_link']}' alt='{$card['sport']} Logo'>
                            </div>
                            <div>
                                <p class='cardValue'>$ {$card['value']}</p>
                            </div>
                        </div>
                    </div>
                    <div class='button-grid'>
                        <form method='post'>
                            <input type='hidden' name='id' value='{$card['id']}'>
                            <input class='deleteButton' type='submit' name='delete' value='Remove Card' style='background-color: $backgroundColor;'>
                        </form>
                        <form method='get' action='editCard.php'>
                            <input type='hidden' name='id' value='{$card['id']}'>
                            <input class='editButton' type='submit' name='edit' value='Edit Card Details' style='background-color: $backgroundColor;'>
                        </form>
                    </div>
                </div>";
        }
        return $cardDetails;
    }

    // Helper function to get background color based on the sport
    private function getBackgroundColor(string $sport): string
    {
        switch ($sport) {
            case 'American Football':
                return '#0AD258';
            case 'Basketball':
                return '#FE7733';
            case 'Baseball':
                return '#3053F9';
            default:
                return '#fff'; // Default color
        }
    }

}
