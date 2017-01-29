<?php

namespace Tests\Unit\Deck;

use App\Components\Deck;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeckTest extends TestCase
{
    /** @test */
    public function it_returns_52_cards_in_4_standard_suits()
    {
        //given
        $deck = new Deck();

        //when
        $cards = $deck->cards();
        $deck_suits = $cards->unique('suit')->pluck('suit');

        //then
        $this->assertEquals(52, $deck->cards()->count());
        $this->assertEquals($deck->getSuits(), $deck_suits->toArray());
    }
}
