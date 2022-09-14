# PHP Google Chat
A simple library to compose and send messages through Google Chat using Webhook. It allows sending from simple text messages to interactive letters.

![A custom card](./docs/simple-message-demo.png)

## SimpleMessage
Once you've got the URL you need to send the hooks to, create the following file. It is the simplest email that can be sent: it sends plain text through the sender.

```php
<?php

require_once 'vendor/autoload.php';

$guzzle = new \GuzzleHttp\Client();
$webhooks = [
    'default' => 'https://chat.googleapis.com/v1/spaces/AAAAK4AL5Bg/messages?key=AIzaSyDdI0hCZtE6vySjMm-WEfRq3CPzqKqqsHI&token=3PPfdSFIA_p3ColcvumRTiRnbMftokJhDjz0RJI3sa8%3D'
];
$sender = new \Junisan\GoogleChat\GoogleChatSender($guzzle, $webhooks);


$message = \Junisan\GoogleChat\SimpleMessage::create()->addText('Hello');
$sender->send($message, 'default');
```

The `SimpleMessage` supports some formatting following the Markdown format:

```php
<?php
//... Create sender

$message = new \Junisan\GoogleChat\SimpleMessage();
$message
    ->addText('Hola')
    ->addLine()
    ->addBoldText('Como estás')
    ->addLine()
    ->addLink('https://www.juannicolas.eu');
$sender->send($message, 'default');
```

## Message
The `Message` allows you to add cards, sections and some UI components that allow you to create very attractive interfaces and even interact with the user.

```php
$link = \Junisan\GoogleChat\UIElements\TextButton::create('http://google.es', 'Follow');
$link2 = \Junisan\GoogleChat\UIElements\TextButton::create('http://google.es', 'Unfollow');
$link3 = \Junisan\GoogleChat\UIElements\ImageButton::create('http://google.es', 'https://goo.gl/aeDtrS');

$order = \Junisan\GoogleChat\UIElements\KeyValue::create('Order No.', '12345');
$status = \Junisan\GoogleChat\UIElements\KeyValue::create('Status', '12345');
$textParagraph = \Junisan\GoogleChat\UIElements\TextParagraph::create('Hola');

$sectionA = \Junisan\GoogleChat\Elements\Section::create()
    ->addWidgets($order, $status, $textParagraph, $link3);



$sectionB = \Junisan\GoogleChat\Elements\Section::create()
    ->addWidgets($link, $link2);

$card = \Junisan\GoogleChat\Elements\Card::create('Pizza __Bot__', 'pizzabot@example.com', 'https://goo.gl/aeDtrS')
    ->addSections($sectionA, $sectionB);

$cardB = \Junisan\GoogleChat\Elements\Card::create('Hola');
$message = \Junisan\GoogleChat\Message::create()
    ->addCard($card);

$sender->send($message, 'default');
```

![A custom card](./docs/message-demo.png)

## Sender
Sender is the class in charge of sending the instances of the messages that you have created. When building it, you must pass an array containing the different names of the channels and the url, as shown in the following code.
```php
$webhooks = [
    'default' => 'https://chat.googleapis.com/v1/.....',
    'another_channel' => 'https://chat.googleapis.com/v1/.....'
];

$sender = new \Junisan\GoogleChat\GoogleChatSender($guzzle, $webhooks);
```

When you want to send the message, you must call the send method, passing as a parameter the message to send and **the name** of the channel through which to send that message.
```php
$sender->send($message, 'another_channel');
```