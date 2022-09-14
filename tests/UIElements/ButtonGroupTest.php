<?php

namespace Junisan\GoogleChat\Tests\UIElements;

use Junisan\GoogleChat\UIElements\ButtonGroup;
use Junisan\GoogleChat\UIElements\TextButton;
use PHPUnit\Framework\TestCase;

class ButtonGroupTest extends TestCase
{
    public function test_add_buttons_and_render_them()
    {
        $button1 = $this->createMock(TextButton::class);
        $button2 = $this->createMock(TextButton::class);
        $button3 = $this->createMock(TextButton::class);
        $button4 = $this->createMock(TextButton::class);
        $button5 = $this->createMock(TextButton::class);

        $group = ButtonGroup::create($button1, $button2);
        $group->addWidget($button3);
        $group->addWidgets($button4, $button5);

        $result = $group->toJson();

        $this->assertArrayHasKey('buttons', $result);
        $this->assertCount(5, $result['buttons']);
    }
}
