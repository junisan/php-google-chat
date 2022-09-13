<?php

namespace Junisan\GoogleChat\Elements;

use Junisan\GoogleChat\Interfaces\GoogleChatElement;

class Card implements GoogleChatElement
{
    private ?string $title;
    private ?string $subTitle;
    private ?string $imageUrl;
    private bool $squareImage = true;

    private array $sections = [];

    public static function create(
        ?string $title = null,
        ?string $subTitle = null,
        ?string $imageUrl = null,
        bool $square = true
    ): Card
    {
        $card = new static();
        $card
            ->setTitle($title)
            ->setSubTitle($subTitle)
            ->setImageUrl($imageUrl)
            ->setSquareImage($square);

        return $card;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): Card
    {
        $this->title = $title;
        return $this;
    }

    public function getSubTitle(): ?string
    {
        return $this->subTitle;
    }

    public function setSubTitle(?string $subTitle): Card
    {
        $this->subTitle = $subTitle;
        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): Card
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    public function isSquareImage(): bool
    {
        return $this->squareImage;
    }

    public function setSquareImage(bool $squareImage): Card
    {
        $this->squareImage = $squareImage;
        return $this;
    }

    public function addSection(Section $section): Card
    {
        $this->sections[] = $section;
        return $this;
    }

    /**
     * @param Section[] $sections
     */
    public function addSections(...$sections): Card
    {
        $this->sections = array_merge($this->sections, $sections);
        return $this;
    }

    public function toJson(): array
    {
        $sections = array_map(fn(Section $section) => $section->toJson(), $this->sections);

        $properties = [
            "title" => $this->getTitle(),
            "subtitle" => $this->getSubTitle(),
            "imageUrl" => $this->getImageUrl(),
            "imageStyle" => $this->isSquareImage() ? 'IMAGE' : 'AVATAR'
        ];

        return [
            "header" => array_filter($properties),
            "sections" => $sections
        ];
    }
}
