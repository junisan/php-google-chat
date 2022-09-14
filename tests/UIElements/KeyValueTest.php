<?php

namespace Junisan\GoogleChat\Tests\UIElements;

use Junisan\GoogleChat\UIElements\Icon;
use Junisan\GoogleChat\UIElements\KeyValue;
use Junisan\GoogleChat\UIElements\TextButton;
use PHPUnit\Framework\TestCase;

class KeyValueTest extends TestCase
{
    public function test_getters_and_setters()
    {
        $icon = new Icon('train');
        $button = TextButton::create('link', 'Text');

        $keyValue = new KeyValue();
        $keyValue
            ->setTopLabel('Top')
            ->setContent('Content')
            ->setBottomLabel('Bottom')
            ->setMultiLine(false)
            ->setLink('google.es')
            ->setIcon($icon)
            ->setButton($button);

        $this->assertEquals('Top', $keyValue->getTopLabel());
        $this->assertEquals('Content', $keyValue->getContent());
        $this->assertEquals('Bottom', $keyValue->getBottomLabel());
        $this->assertEquals('google.es', $keyValue->getLink());
        $this->assertEquals(false, $keyValue->isMultiLine());
        $this->assertEquals($icon, $keyValue->getIcon());
        $this->assertEquals($button, $keyValue->getButton());
    }

    public function test_format_component()
    {
        $icon = new Icon('train');
        $button = TextButton::create('bing.com', 'Text');

        $keyValue = KeyValue::create('topLabel', 'My Content', 'bottomLabel', true, 'myLink', $icon, $button);
        $rendered = $keyValue->toJson();
        $expected = [
            "keyValue" => [
                "topLabel" => 'topLabel',
                "content" => 'My Content',
                "contentMultiline" => true,
                "bottomLabel" => 'bottomLabel',
                "onClick" => [
                    "openLink" => [
                        "url" => 'myLink'
                    ]
                ],
                "icon" => 'TRAIN',
                "button" => [
                    "textButton" => [
                        "text" => 'Text',
                        "onClick" => [
                            "openLink" => [
                                "url" => 'bing.com'
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $this->assertEquals($expected, $rendered);
    }

    public function test_remove_empty_object_properties()
    {
        $keyValue = KeyValue::create('topValue', 'content');
        $render = $keyValue->toJson();
        $expected = [
            'keyValue' => [
                'topLabel' => 'topValue',
                'content' => 'content'
            ]
        ];
        $this->assertEquals($expected, $render);

        $keyValue->setMultiLine(true);
        $render = $keyValue->toJson();
        $expected = [
            'keyValue' => [
                'topLabel' => 'topValue',
                'content' => 'content',
                'contentMultiline' => true,
            ]
        ];
        $this->assertEquals($expected, $render);
    }
}
