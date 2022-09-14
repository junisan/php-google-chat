<?php

namespace Junisan\GoogleChat\Tests\UIElements;

use Junisan\GoogleChat\UIElements\TextParagraph;
use PHPUnit\Framework\TestCase;

class TextParagraphTest extends TestCase
{
    public function test_getters_and_setters()
    {
        $imageButton = new TextParagraph();
        $imageButton
            ->setText('My cool text');

        $this->assertEquals('My cool text', $imageButton->getText());
    }

    public function test_format_component()
    {
        $imageButton = TextParagraph::create('Incredible text');
        $rendered = $imageButton->toJson();
        $expected = [
            "textParagraph" => [
                "text" => 'Incredible text'
            ]
        ];

        $this->assertEquals($expected, $rendered);
    }
}
