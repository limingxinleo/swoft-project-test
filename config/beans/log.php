<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

$config = [
    'logger' => [
        'name' => APP_NAME,
        'enable' => env('LOG_ENABLE', true),
        'flushInterval' => 100,
        'flushRequest' => true,
        'handlers' => [
            '${noticeHandler}',
            '${applicationHandler}',
            '${debugHandler}',
            '${traceHandler}',
        ],
    ],
    'lineFormatter' => [
        'class' => \Monolog\Formatter\LineFormatter::class,
        'allowInlineLineBreaks' => true,
    ],
    'testLogger' => [
        'name' => APP_NAME,
        'class' => \Swoft\Log\Logger::class,
        'enable' => env('LOG_ENABLE', true),
        'flushInterval' => 100,
        'flushRequest' => true,
        'handlers' => [
            '${testLoggerHandler}',
        ],
    ],
    'testLoggerHandler' => [
        'class' => \Swoft\Log\FileHandler::class,
        'logFile' => '@runtime/logs/test.log',
        'formatter' => '${lineFormatter}',
    ],
];

$handlers = require __DIR__ . '/log/handlers.php';
$custom = require __DIR__ . '/log/custom.php';
$queue = require __DIR__ . '/log/queue.php';

return array_merge($config, $handlers, $custom, $queue);
