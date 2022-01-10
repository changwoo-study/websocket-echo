<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/Chat.php';

$app = new Ratchet\App( 'localhost', 8080 );
$app->route( '/chat', new Chat(), [ '*' ] );
$app->route( '/echo', new Ratchet\Server\EchoServer, [ '*' ] );
$app->run();
