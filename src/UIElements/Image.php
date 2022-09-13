<?php

namespace Junisan\GoogleChat\UIElements;

use Junisan\GoogleChat\Interfaces\GoogleChatUIElement;

class Image implements GoogleChatUIElement
{
    private string $imageUrl;

    public static function create(string $imageUrl): self
    {
        return (new static())
            ->setImageUrl($imageUrl);
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): Image
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    public function toJson(): array
    {
        return [
            "image" => [
                "imageUrl" => $this->getImageUrl()
            ]
        ];
    }
}
