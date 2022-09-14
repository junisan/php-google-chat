<?php

namespace Junisan\GoogleChat\UIElements;

use Junisan\GoogleChat\Interfaces\AbstractButton;
use Junisan\GoogleChat\Interfaces\GoogleChatUIElement;

class ButtonGroup implements GoogleChatUIElement
{
    /** @var AbstractButton[] */
    protected array $buttons = [];

    /**
     * @param AbstractButton[] $buttons
     */
    public static function create(...$buttons): self
    {
        $buttonElem = new static();
        foreach ($buttons as $button) {
            $buttonElem->addWidget($button);
        }

        return $buttonElem;
    }

    public function addWidget(AbstractButton $button): self
    {
        $this->buttons[] = $button;
        return $this;
    }

    /**
     * @param AbstractButton[] $buttons
     */
    public function addWidgets(...$buttons): self
    {
        $this->buttons = array_merge($this->buttons, $buttons);
        return $this;
    }


    public function toJson(): array
    {
        $buttons = array_map(fn(AbstractButton $button) => $button->toJson(), $this->buttons);
        return ['buttons' => $buttons];
    }
}