<?php
declare(strict_types=1);

namespace Erfanazadi\Telegramapi;

use Erfanazadi\Telegramapi\Debug\Logger;
use Erfanazadi\Telegramapi\Methods\TelegramMethod;

final class Bot
{
    private string $api = 'https://api.telegram.org/bot';
    public function __construct(string $token)
    {
        $this->api .= $token . DIRECTORY_SEPARATOR;
    }

    final function send(TelegramMethod $tgMethod, ?int $toID = null): object
    {
        $parameters = $tgMethod->getParameters();
        if ($toID) {
            $parameters['chat_id'] = $toID;
        }

        // Build the cURL request
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $this->api . $tgMethod->getMethod(),
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded'],
            CURLOPT_POSTFIELDS => http_build_query($parameters)
        ]);

        // Execute the request and handle errors
        $result = json_decode(curl_exec($ch));
        curl_close($ch);
        if (isset($result->error_code)) {
            $debug = debug_backtrace();
            Logger::error("Error in file {$debug[0]['file']} on line {$debug[0]['line']}: " . $result->description);
            exit();
        }

        return $result;
    }

    final function getUpdates(): ?object
    {
        return json_decode(file_get_contents('php://input'));
    }
}
