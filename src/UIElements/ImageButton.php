<?php

namespace Junisan\GoogleChat\UIElements;

use Junisan\GoogleChat\Interfaces\GoogleChatUIButton;

class ImageButton implements GoogleChatUIButton
{
    private string $link;
    private string $imageUrl;

    public static function create(string $link, string $imageUrl): self
    {
        return (new static())
            ->setLink($link)
            ->setImageUrl($imageUrl);
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

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    public function toJson(): array
    {
        return [
            "imageButton" => [
                "iconUrl" => $this->getImageUrl(),
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
