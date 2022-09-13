<?php

namespace Junisan\GoogleChat\Interfaces;

interface GoogleChatUIButton extends GoogleChatUIElement
{
    public function toWidgetJson(): array;
}
