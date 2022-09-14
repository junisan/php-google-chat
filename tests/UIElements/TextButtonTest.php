<?php

namespace Junisan\GoogleChat\Tests\UIElements;

use Junisan\GoogleChat\UIElements\TextButton;
use PHPUnit\Framework\TestCase;

class TextButtonTest extends TestCase
{
    public function test_getters_and_setters()
    {
        $textButton = new TextButton();
        $textButton
            ->setText('My Button')
            ->setLink('google.es');

        $this->assertEquals('My Button', $textButton->getText());
        $this->assertEquals('google.es', $textButton->getLink());
    }

    public function test_format_component()
    {
        $textButton = TextButton::create('link', 'Cool Button');
        $rendered = $textButton->toJson();
        $expected = [
            "textButton" => [
                "text" => 'Cool Button',
                "onClick" => [
                    "openLink" => [
                        "url" => 'link'
                    ]
                ]
            ]
        ];

        $this->assertEquals($expected, $rendered);
    }
}
