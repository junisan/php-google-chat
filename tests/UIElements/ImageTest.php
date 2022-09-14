<?php

namespace Junisan\GoogleChat\Tests\UIElements;

use Junisan\GoogleChat\UIElements\Image;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    public function test_set_image_url_and_format_it()
    {
        $image = new Image();
        $image->setImageUrl('imageUrl');
        $this->assertEquals('imageUrl', $image->getImageUrl());

        $rendered = $image->toJson();
        $expected = [
            "image" => [
                "imageUrl" => 'imageUrl'
            ]
        ];

        $this->assertEquals($expected, $rendered);
    }
}
