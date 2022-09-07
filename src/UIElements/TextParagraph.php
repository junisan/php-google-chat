<?php

namespace Junisan\GoogleChat\UIElements;

use Junisan\GoogleChat\Interfaces\GoogleChatAbstractText;
use Junisan\GoogleChat\Interfaces\GoogleChatUIElement;

class TextParagraph extends GoogleChatAbstractText implements GoogleChatUIElement
{
    public static function create(): self
    {
        return new static;
    }

    public function toJson(): array
    {
        return [
            "textParagraph" => [
                "text" => $this->renderText()
            ]
        ];
    }
}
