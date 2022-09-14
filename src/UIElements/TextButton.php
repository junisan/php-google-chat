<?php

namespace Junisan\GoogleChat\UIElements;

use Junisan\GoogleChat\Interfaces\AbstractButton;

class TextButton extends AbstractButton
{
    private string $text;

    public static function create(string $link, string $text): self
    {
        return (new static())
            ->setLink($link)
            ->setText($text);
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
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
