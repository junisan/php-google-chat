<?php

namespace Junisan\GoogleChat;

use Junisan\GoogleChat\Interfaces\GoogleChatAbstractText;
use Junisan\GoogleChat\Interfaces\GoogleChatMessage;

class SimpleMessage extends GoogleChatAbstractText implements GoogleChatMessage
{
    public static function create(): self
    {
        return new static;
    }

    public function toJson(): array
    {
        return [
            'text' => $this->renderText()
        ];
    }
}
