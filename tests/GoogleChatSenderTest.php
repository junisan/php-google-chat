<?php

namespace Junisan\GoogleChat\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Junisan\GoogleChat\GoogleChatSender;
use Junisan\GoogleChat\Message;
use PHPUnit\Framework\TestCase;

class GoogleChatSenderTest extends TestCase
{
    public function test_webhook_discrimination()
    {
        $webhooks = [
            'testing1' => 'http://localhost:1000',
            'testing2' => 'http://localhost:2000',
            'testing3' => 'http://localhost:3000'
        ];
        $client = $this->createMock(ClientInterface::class);
        $client
            ->expects($this->once())
            ->method('request')
            ->with('post', 'http://localhost:2000');

        $message = $this->createMock(Message::class);

        $sender = new GoogleChatSender($client, $webhooks);
        $sender->send($message, 'testing2');
    }

    public function test_send_messages()
    {
        $message = $this->createMock(Message::class);

        $mock = new MockHandler([
            new Response(200)
        ]);
        $client = new Client(['handler' => HandlerStack::create($mock)]);

        $webhooks = ['testing1' => 'http://localhost:1000'];

        $sender = new GoogleChatSender($client, $webhooks);
        $response = $sender->send($message, 'testing1');
        $this->assertNull($response);
    }

    public function test_undefined_webhook()
    {
        $client = $this->createMock(ClientInterface::class);
        $message = $this->createMock(Message::class);
        $webhooks = ['testing1' => 'http://localhost:1000'];

        $sender = new GoogleChatSender($client, $webhooks);

        $this->expectException(\Exception::class);
        $sender->send($message, 'testingX');
    }

    public function test_Google_sends_400()
    {
        $message = $this->createMock(Message::class);

        $mock = new MockHandler([
            new Response(400)
        ]);
        $client = new Client(['handler' => HandlerStack::create($mock)]);

        $webhooks = ['testing1' => 'http://localhost:1000'];

        $sender = new GoogleChatSender($client, $webhooks);

        $this->expectException(ClientException::class);
        $sender->send($message, 'testing1');
    }
}
