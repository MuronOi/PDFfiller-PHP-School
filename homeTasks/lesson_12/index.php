<?php

require_once __DIR__.'/src/Logger.php';

$log = Logger::getInstance();
$log->log("Write first message");
$log->log("Write second message");

print_r(Logger::getInstance());


$log->log("Write third message");
print_r($log->get_logs());

