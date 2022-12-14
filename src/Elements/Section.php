<?php

namespace Junisan\GoogleChat\Elements;

use Junisan\GoogleChat\Interfaces\GoogleChatElement;
use Junisan\GoogleChat\Interfaces\GoogleChatUIButton;
use Junisan\GoogleChat\Interfaces\GoogleChatUIElement;

class Section implements GoogleChatElement
{
    /** @var GoogleChatUIElement[] */
    protected array $widgets = [];

    public static function create(...$widgets): self
    {
        $section =  new static();
        foreach ($widgets as $widget) {
            $section->addWidget($widget);
        }

        return $section;
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
