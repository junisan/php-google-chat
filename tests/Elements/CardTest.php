<?php

namespace Junisan\GoogleChat\Tests\Elements;

use Junisan\GoogleChat\Elements\Card;
use Junisan\GoogleChat\Elements\Section;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    public function test_getters_and_setters()
    {
        $card = new Card();

        $card->setTitle('myTitle')
            ->setSubTitle('subTitle')
            ->setImageUrl('url')
            ->setSquareImage(false);

        $this->assertEquals('myTitle', $card->getTitle());
        $this->assertEquals('subTitle', $card->getSubTitle());
        $this->assertEquals('url', $card->getImageUrl());
        $this->assertEquals(false, $card->isSquareImage());
    }

    public function test_can_add_sections_and_format_them()
    {
        $section1 = $this->createMock(Section::class);
        $section2 = $this->createMock(Section::class);
        $section3 = $this->createMock(Section::class);

        $card = Card::create('myTitle', 'mySubTitle', 'imageUrl');
        $card->addSection($section1);
        $card->addSections($section2, $section3);
        $jsonArray = $card->toJson();

        $expected = [
            'header' => [
                'title' => 'myTitle',
                'subtitle' => 'mySubTitle',
                'imageUrl' => 'imageUrl',
                'imageStyle' => 'IMAGE'
            ],
            'sections' => [
                [],[],[]
            ]
        ];
        $this->assertEquals($expected, $jsonArray);
    }
}
