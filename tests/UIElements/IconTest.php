<?php

namespace Junisan\GoogleChat\Tests\UIElements;

use Junisan\GoogleChat\UIElements\Icon;
use PHPUnit\Framework\TestCase;

class IconTest extends TestCase
{
    public function test_is_valid_icon()
    {
        $this->assertTrue(Icon::isValidIcon('TRAIN'));
        $this->assertTrue(Icon::isValidIcon('traIN'));

        $this->assertFalse(Icon::isValidIcon('JohnDoe'));
    }

    public function test_create_icon_and_render()
    {
        $icon = new Icon('train');
        $this->assertEquals('TRAIN', $icon->getIcon());
    }

    public function test_try_create_not_exist_icon()
    {
        $this->expectException(\LogicException::class);
        $icon = new Icon('JohnDoe');
    }
}
