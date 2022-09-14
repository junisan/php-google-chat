<?php

namespace Junisan\GoogleChat\Tests\UIElements;

use Junisan\GoogleChat\UIElements\Icon;
use Junisan\GoogleChat\UIElements\IconButton;
use PHPUnit\Framework\TestCase;

class IconButtonTest extends TestCase
{
    public function test_create_icon_button()
    {
        $icon = new Icon('train');
        $newIcon = new Icon('star');

        $button = IconButton::create('link', $icon);
        $button->setIcon($newIcon);

        $rendered = $button->toJson();
        $expected = [
            "imageButton" => [
                "icon" => 'STAR',
                "onClick" => [
                    "openLink" => [
                        "url" => 'link'
                    ]
                ]
            ]
        ];

        $this->assertEquals($expected, $rendered);
        $this->assertEquals($newIcon, $button->getIcon());

    }
}
