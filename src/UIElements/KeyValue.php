<?php

namespace Junisan\GoogleChat\UIElements;

use Junisan\GoogleChat\Interfaces\GoogleChatUIButton;
use Junisan\GoogleChat\Interfaces\GoogleChatUIElement;

class KeyValue implements GoogleChatUIElement
{
    private ?string $topLabel;
    private ?string $bottomLabel;
    private ?string $content;
    private bool $multiLine = false;
    private ?string $link;
    private ?Icon $icon;
    private ?GoogleChatUIButton $button;

    public static function create(
        ?string $topLabel = null,
        ?string $content = null,
        ?string $bottomLabel = null,
        bool $multiLine = false,
        ?string $link = null,
        ?Icon $icon = null,
        ?GoogleChatUIButton $textButton = null
    ): KeyValue {
        return (new static())
            ->setTopLabel($topLabel)
            ->setContent($content)
            ->setBottomLabel($bottomLabel)
            ->setMultiLine($multiLine)
            ->setLink($link)
            ->setIcon($icon)
            ->setButton($textButton);
    }


    public function getTopLabel(): ?string
    {
        return $this->topLabel;
    }


    public function setTopLabel(?string $topLabel): KeyValue
    {
        $this->topLabel = $topLabel;
        return $this;
    }


    public function getBottomLabel(): ?string
    {
        return $this->bottomLabel;
    }


    public function setBottomLabel(?string $bottomLabel): KeyValue
    {
        $this->bottomLabel = $bottomLabel;
        return $this;
    }


    public function getContent(): ?string
    {
        return $this->content;
    }


    public function setContent(?string $content): KeyValue
    {
        $this->content = $content;
        return $this;
    }


    public function isMultiLine(): bool
    {
        return $this->multiLine;
    }


    public function setMultiLine(bool $multiLine): KeyValue
    {
        $this->multiLine = $multiLine;
        return $this;
    }


    public function getLink(): ?string
    {
        return $this->link;
    }


    public function setLink(?string $link): KeyValue
    {
        $this->link = $link;
        return $this;
    }


    public function getIcon(): ?Icon
    {
        return $this->icon;
    }


    public function setIcon(?Icon $icon): KeyValue
    {
        $this->icon = $icon;
        return $this;
    }

    public function getButton(): ?GoogleChatUIButton
    {
        return $this->button;
    }

    public function setButton(?GoogleChatUIButton $button): KeyValue
    {
        $this->button = $button;
        return $this;
    }

    public function toJson(): array
    {
        $properties = [
            "topLabel" => $this->topLabel,
            "content" => $this->content,
            "contentMultiline" => $this->isMultiLine(),
            "bottomLabel" => $this->bottomLabel,
            "icon" => $this->icon ? $this->icon->getIcon() : null,
            "button" => $this->button ? $this->button->toJson() : null
        ];

        if ($this->button) {
            $properties['onClick'] = [
                "openLink" => [
                    "url" => $this->link
                ]
            ];
        }

        return ["keyValue" => array_filter($properties)];
    }
}
