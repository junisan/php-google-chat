<?php

require_once 'vendor/autoload.php';

$message = new \Junisan\GoogleChat\SimpleMessage();
$message
    ->addText('Hola')
    ->addLine()
    ->addBoldText('Como estás')
    ->addLine()
    ->addLink('https://www.juannicolas.eu');


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

echo json_encode($message->toJson());
$guzzle = new \GuzzleHttp\Client();
$webhooks = [
    'default' => 'https://chat.googleapis.com/v1/spaces/AAAAK4AL5Bg/messages?key=AIzaSyDdI0hCZtE6vySjMm-WEfRq3CPzqKqqsHI&token=3PPfdSFIA_p3ColcvumRTiRnbMftokJhDjz0RJI3sa8%3D'
];
$sender = new \Junisan\GoogleChat\GoogleChatSender($guzzle, $webhooks);
$sender->send($message, 'default');
