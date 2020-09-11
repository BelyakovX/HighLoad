<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();
$channel->queue_declare('pizza', false, true, false, false);

function processOrder($msg)
{
    echo $msg->body . ' payed, ';
}

$channel->basic_consume('pizza', false, true, false, false, false,
    'processOrder');

while (count($channel->callbacks)) {
    $channel->wait();
}
$channel->close();
$connection->close();
