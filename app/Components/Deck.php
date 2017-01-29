<?php

namespace App\Components;


class Deck
{
    protected $cards ;
    protected $ace_high = TRUE ;
    protected $suits = [
        "Club" => 13,
        "Diamond" => 13,
        "Heart" => 13,
        "Spade" => 13
    ];

    protected $face_cards = [
        11 => "Jack",
        12 => "Queen",
        13 => "King",
        1 => "Ace"
    ];


    function __construct() {
        $this->cards = collect();

        $this->buildDeck();
    }
/**
 * [buildDeck description]
 * @return [type] [description]
 */
    protected function buildDeck()
    {
        $start = $this->ace_high ? 2 : 1;
        foreach ($this->suits as $suit => $count) {

            for($i = $start; $i <= $count; $i++) {
                $this->cards->push([
                    "suit" => $suit,
                    "value" => $i,
                    "identifier" => isset($this->face_cards[$i]) ? $this->face_cards[$i] : $i
                ]);
            }

            if($this->ace_high) {
                $this->cards->push([
                    "suit" => $suit,
                    "value" => $count + 1,
                    "identifier" => isset($this->face_cards[1]) ? $this->face_cards[1] : $i
                ]);
            }

        }
    }

    public function getSuits()
    {
        return array_keys($this->suits);
    }

    public function cards()
    {
        return $this->cards;
    }

}