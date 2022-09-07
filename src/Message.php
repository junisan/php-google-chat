<?php

namespace Junisan\GoogleChat;

use Junisan\GoogleChat\Elements\Card;
use Junisan\GoogleChat\Interfaces\GoogleChatMessage;

class Message implements GoogleChatMessage
{
    private array $cards = [];

    public static function create(): self
    {
        return new static;
    }

    public function addCard(Card $card): self
    {
        $this->cards[] = $card;
        return $this;
    }

    public function toJson(): array
    {
        $cards = array_map(fn(Card $card) => $card->toJson(), $this->cards);

        return [
            'cards' => $cards
        ];
    }
}
