<?php

namespace Junisan\GoogleChat;

use GuzzleHttp\ClientInterface;
use Junisan\GoogleChat\Interfaces\GoogleChatMessage;

class GoogleChatSender
{
    private ClientInterface $client;
    private array $webhooks;

    public function __construct(
        ClientInterface $client,
        array $webhooks
    )
    {
        $this->client = $client;
        $this->webhooks = $webhooks;
    }

    public function send(GoogleChatMessage $message, string $to)
    {
        if (!$this->webhooks[$to]) {
            throw new \Exception('Channel ' . $to . ' not found');
        }

        $this->client->request('post', $this->webhooks[$to], [
            'json' => $message->toJson()
        ]);
    }

}
