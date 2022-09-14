<?php

namespace Junisan\GoogleChat\Tests;

use Junisan\GoogleChat\Elements\Card;
use Junisan\GoogleChat\Message;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{
    public function test_can_add_cards_and_render()
    {
        $card1 = $this->createMock(Card::class);
        $card2 = $this->createMock(Card::class);
        $card3 = $this->createMock(Card::class);

        $message = new Message();
        $message->addCard($card1);
        $message->addCards($card2, $card3);

        $arrayJson = $message->toJson();

        $this->assertIsArray($arrayJson);
        $this->assertArrayHasKey('cards', $arrayJson);
        $this->assertCount(3, $arrayJson['cards']);
    }
}
