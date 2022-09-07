<?php

require_once 'vendor/autoload.php';

$message = new \Junisan\GoogleChat\SimpleMessage();
$message
    ->addText('Hola')
    ->addLine()
    ->addBoldText('Como estás')
    ->addLine()
    ->addLink('https://www.juannicolas.eu');

$mensaje = \Junisan\GoogleChat\Message::create()
    ->addCard(
        \Junisan\GoogleChat\Elements\Card::create('Titulo', 'subTitulo','image')

    );

$guzzle = new \GuzzleHttp\Client();
$webhooks = [
    'default' => 'https://chat.googleapis.com/v1/spaces/AAAAK4AL5Bg/messages?key=AIzaSyDdI0hCZtE6vySjMm-WEfRq3CPzqKqqsHI&token=3PPfdSFIA_p3ColcvumRTiRnbMftokJhDjz0RJI3sa8%3D'
];
$sender = new \Junisan\GoogleChat\GoogleChatSender($guzzle, $webhooks);
$sender->send($message, 'default');
