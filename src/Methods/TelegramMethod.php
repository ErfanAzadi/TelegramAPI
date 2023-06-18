<?php
declare(strict_types=1);

namespace Erfanazadi\Telegramapi\Methods;

interface TelegramMethod
{
    function getMethod(): string;

    function getParameters(): array;
}
