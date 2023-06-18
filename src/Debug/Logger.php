<?php
declare(strict_types=1);

namespace Erfanazadi\Telegramapi\Debug;

 class Logger
{
    private const LOG = 'telegram.log';

    static function error(string $message): void
    {
        self::log('ERROR > ' . $message);
    }

    private static function log(string $input): void
    {
        $time = '[' . date('H:i:s') . '] ';
        error_log($time . $input . PHP_EOL, 3, self::LOG);
    }
}