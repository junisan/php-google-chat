<?php

namespace Junisan\GoogleChat\Interfaces;

abstract class GoogleChatAbstractText
{
    protected string $payload = '';

    public function addText(string $text): self
    {
        $this->payload .= $text;
        return $this;
    }

    public function addLine(): self
    {
        $this->addText("\n");
        return $this;
    }

    public function addBoldText(string $text): self
    {
        $this->addText("*{$text}*");
        return $this;
    }

    public function addItalicText(string $text): self
    {
        $this->addText("_{$text}_");
        return $this;
    }

    public function addStrikeText(string $text): self
    {
        $this->addText("~{$text}~");
        return $this;
    }

    public function addMonospaceText(string $text): self
    {
        $this->addText("`{$text}`");
        return $this;
    }


    public function addMonospaceBlock(string $text): self
    {
        $this->addText("```{$text}```");
        return $this;
    }

    public function addLink(string $link, string $displayText = null): self
    {
        $link = "<{$link}". ($displayText?"|$displayText":'') . ">";

        $this->addText($link);
        return $this;
    }

    public function addMention(string $userId): self
    {
        $this->addText("<users/{$userId}>");
        return $this;
    }

    public function addMentionAll(string $prependText = null, string $appendText = null): self
    {
        $this->addText("{$prependText}<users/all>{$appendText}");
        return $this;
    }

    public function renderText(): string
    {
        return $this->payload;
    }
}
