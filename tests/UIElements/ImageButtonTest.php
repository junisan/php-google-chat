<?php

namespace Junisan\GoogleChat\Tests\UIElements;

use Junisan\GoogleChat\UIElements\ImageButton;
use PHPUnit\Framework\TestCase;

class ImageButtonTest extends TestCase
{
    public function test_getters_and_setters()
    {
        $imageButton = new ImageButton();
        $imageButton
            ->setImageUrl('imageUrl')
            ->setLink('google.es');

        $this->assertEquals('imageUrl', $imageButton->getImageUrl());
        $this->assertEquals('google.es', $imageButton->getLink());
    }

    public function test_format_component()
    {
        $imageButton = ImageButton::create('link', 'iUrl');
        $rendered = $imageButton->toJson();
        $expected = [
            "imageButton" => [
                "iconUrl" => 'iUrl',
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
