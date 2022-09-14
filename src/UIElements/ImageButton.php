<?php

namespace Junisan\GoogleChat\UIElements;

use Junisan\GoogleChat\Interfaces\AbstractButton;

class ImageButton extends AbstractButton
{
    private string $imageUrl;

    public static function create(string $link, string $imageUrl): self
    {
        return (new static())
            ->setLink($link)
            ->setImageUrl($imageUrl);
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
}
