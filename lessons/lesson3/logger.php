<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('../vendor/autoload.php');
$config = include ('../config/main.php');
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler(__DIR__ . '/../log/my.log', Logger::WARNING));
// add records to the log
$log->warning('Foo');
$log->error('Bar');

\app\base\Test::test();

$time_start = time();

\app\base\App::call()->run($config);

$time_end = time();

$log = new Logger('time');
$log -> pushHandler(new StreamHandler(__DIR__ . '/../log/time.log', Logger::DEBUG));

$log -> debug ($time_end - $time_start);
$log->debug (memory_get_peak_usage());
