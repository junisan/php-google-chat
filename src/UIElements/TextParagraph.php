<?php

namespace Junisan\GoogleChat\UIElements;

use Junisan\GoogleChat\Interfaces\GoogleChatUIElement;

class TextParagraph implements GoogleChatUIElement
{
    private string $text;

    public static function create(string $text): self
    {
        return (new static)
            ->setText($text);
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): TextParagraph
    {
        $this->text = $text;
        return $this;
    }

    public function toJson(): array
    {
        return [
            "textParagraph" => [
                "text" => $this->getText()
            ]
        ];
    }
}
