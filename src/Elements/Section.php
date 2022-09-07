<?php

namespace Junisan\GoogleChat\Elements;

use Junisan\GoogleChat\Interfaces\GoogleChatElement;
use Junisan\GoogleChat\Interfaces\GoogleChatUIElement;

class Section implements GoogleChatElement
{
    /** @var GoogleChatUIElement[] */
    public array $widgets = [];

    public static function create(): self
    {
        return new static();
    }

    public function addWidget(GoogleChatUIElement $widget): self
    {
        $this->widgets[] = $widget;
        return $this;
    }

    public function toJson(): array
    {
        $widgets = array_map(
            fn(GoogleChatUIElement $element) => $element->toJson(),
            $this->widgets
        );

        return [
            "widgets" => $widgets
        ];

    }
}
