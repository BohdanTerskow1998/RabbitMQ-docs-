<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('warning!', false, false, false, false);

$msg = new AMQPMessage('Nesseccary to add new file in you repository!');
$channel->basic_publish($msg, '', 'warning!');

echo " [x] Sent 'Message was sending!'\n";

$channel->close();
$connection->close();
?>