<?php

namespace Junisan\GoogleChat\UIElements;

use Junisan\GoogleChat\Interfaces\GoogleChatUIElement;

class TextButton implements GoogleChatUIElement
{
    private string $link;
    private string $text;

    public static function create(string $link, string $text): TextButton
    {
        return (new static())
            ->setLink($link)
            ->setText($text);
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): TextButton
    {
        $this->link = $link;
        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): TextButton
    {
        $this->text = $text;
        return $this;
    }

    public function toJson(): array
    {
        return [
            "textButton" => [
                "text" => $this->getText(),
                "onClick" => [
                    "openLink" => [
                        "url" => $this->getLink()
                    ]
                ]
            ]
        ];
    }
}
