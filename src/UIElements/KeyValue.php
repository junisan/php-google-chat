<?php

namespace Junisan\GoogleChat\UIElements;

use Junisan\GoogleChat\Interfaces\GoogleChatUIElement;

class KeyValue implements GoogleChatUIElement
{
    private ?string $topLabel;
    private ?string $bottomLabel;
    private ?string $content;
    private bool $multiLine = false;
    private ?string $link;
    private ?string $icon;
    private ?TextButton $button;

    public static function create(
        ?string $topLabel = null,
        ?string $bottomLabel = null,
        ?string $content = null,
        bool $multiLine = false,
        ?string $link = null,
        ?string $ico = null,
        ?TextButton $textButton = null
    ) {
        return (new static())
            ->setTopLabel($topLabel)
            ->setBottomLabel($bottomLabel)
            ->setContent($content)
            ->setMultiLine($multiLine)
            ->setLink($link)
            ->setIcon($ico)
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


    public function getIcon(): ?string
    {
        return $this->icon;
    }


    public function setIcon(?string $icon): KeyValue
    {
        $this->icon = $icon;
        return $this;
    }

    public function getButton(): ?TextButton
    {
        return $this->button;
    }

    public function setButton(?TextButton $button): KeyValue
    {
        $this->button = $button;
        return $this;
    }

    public function toJson(): array
    {
        return [
            "keyValue" => [
                "topLabel" => $this->topLabel,
                "content" => $this->content,
                "contentMultiline" => $this->isMultiLine() ? "true" : "false",
                "bottomLabel" => $this->bottomLabel,
                "onClick" => [
                    "openLink" => [
                        "url" => $this->link
                    ]
                ],
                "icon" => $this->icon,
                "button" => $this->button ? $this->button->toJson() : null
            ]
        ];
    }
}
