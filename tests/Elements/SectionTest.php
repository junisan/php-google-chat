<?php

namespace Junisan\GoogleChat\Tests\Elements;

use Junisan\GoogleChat\Elements\Section;
use Junisan\GoogleChat\Interfaces\GoogleChatUIElement;
use PHPUnit\Framework\TestCase;

class SectionTest extends TestCase
{
    public function test_create_section()
    {
        $section = Section::create();
        $this->assertInstanceOf(Section::class, $section);
    }

    public function test_can_add_widget()
    {
        $widget = $this->createMock(GoogleChatUIElement::class);
        $widget
            ->expects($this->once())
            ->method('toJson')
            ->willReturn(['x']);

        $section = Section::create();
        $section->addWidget($widget);

        $this->assertEquals(
              [
                  'widgets' => [
                      ['x']
                  ]
              ]
            , $section->toJson());
    }

    public function test_can_add_some_widgets()
    {
        $widget = $this->createMock(GoogleChatUIElement::class);
        $widget
            ->method('toJson')
            ->willReturn(['x']);

        $section = Section::create();
        $section->addWidgets($widget, $widget);

        $this->assertEquals(
              [
                  'widgets' => [
                      ['x'],
                      ['x']
                  ]
              ]
            , $section->toJson());
    }
}
