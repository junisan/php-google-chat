<?php

namespace Junisan\GoogleChat\Tests;

use Junisan\GoogleChat\SimpleMessage;
use PHPUnit\Framework\TestCase;

class SimpleMessageTest extends TestCase
{
    public function test_can_set_formatting_and_render()
    {
        $message = new SimpleMessage();
        $message->addText('1');
        $message->addBoldText('2');
        $message->addItalicText('3');
        $message->addLine();

        $message->addLink('google.es', 'google');
        $message->addMention('user1');
        $message->addMentionAll('pre', 'post');
        $message->addMonospaceBlock('block');
        $message->addMonospaceText('text');
        $message->addStrikeText('strike');

        $jsonArray = $message->toJson();

        $this->assertIsArray($jsonArray);
        $this->assertArrayHasKey('text', $jsonArray);
        $this->assertEquals('1*2*_3_'.PHP_EOL.'<google.es|google><users/user1>pre<users/all>post```block````text`~strike~', $jsonArray['text']);
    }
}
