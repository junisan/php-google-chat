<?php

namespace Junisan\GoogleChat\Elements;

use Junisan\GoogleChat\Interfaces\GoogleChatElement;
use Junisan\GoogleChat\Interfaces\GoogleChatUIButton;
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

    /**
     * @param GoogleChatUIElement[] $widgets
     */
    public function addWidgets(...$widgets): self
    {
        $this->widgets = array_merge($this->widgets, $widgets);
        return $this;
    }

    public function toJson(): array
    {
        //Buttons can be used as widget inside buttons parent key.
        $widgets = array_map(
            fn(GoogleChatUIElement $element) => ($element instanceof GoogleChatUIButton)
                ? $element->toWidgetJson()
                : $element->toJson()
            ,
            $this->widgets
        );

        return [
            "widgets" => $widgets
        ];
    }
}
