<?php

namespace Junisan\GoogleChat\Interfaces;

abstract class AbstractButton implements GoogleChatUIButton
{
    protected string $link;

    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    abstract public function toJson(): array;

    public function toWidgetJson(): array
    {
        return [
            "buttons" => $this->toJson()
        ];
    }
}