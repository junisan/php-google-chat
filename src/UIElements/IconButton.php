<?php

namespace Junisan\GoogleChat\UIElements;

use Junisan\GoogleChat\Interfaces\AbstractButton;

class IconButton extends AbstractButton
{
    private Icon $icon;

    public static function create(string $link, Icon $icon): self
    {
        return (new static())
            ->setLink($link)
            ->setIcon($icon);
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
}
