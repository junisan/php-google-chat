<?php

namespace Junisan\GoogleChat\UIElements;

use Junisan\GoogleChat\Interfaces\GoogleChatUIButton;

class IconButton implements GoogleChatUIButton
{
    private string $link;
    private Icon $icon;

    public static function create(string $link, Icon $icon): self
    {
        return (new static())
            ->setLink($link)
            ->setIcon($icon);
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }

    public function getIcon(): Icon
    {
        return $this->icon;
    }

    public function setIcon(Icon $icon): self
    {
        $this->icon = $icon;
        return $this;
    }

    public function toJson(): array
    {
        return [
            "imageButton" => [
                "icon" => $this->getIcon()->getIcon(),
                "onClick" => [
                    "openLink" => [
                        "url" => $this->getLink()
                    ]
                ]
            ]
        ];
    }

    public function toWidgetJson(): array
    {
        return [
            "buttons" => $this->toJson()
        ];
    }
}
