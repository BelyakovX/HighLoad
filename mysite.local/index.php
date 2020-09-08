<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('../vendor/autoload.php');
$config = include ('../config/main.php');

use \app\base\App;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('server');
$log->pushHandler(new StreamHandler('lof/my.log', Logger::INFO));
$log->info(serialize($_SERVER));

$time_start = microtime(true);
App::call()->run($config);
$time_end = microtime(true);

$memory = memory_get_peak_usage();
//0.585 сек
echo "Скрипт отработал за " . ($time_end - $time_start) . " сек. Пик использования памяти: $memory байт";
