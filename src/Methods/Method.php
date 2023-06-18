<?php
declare(strict_types=1);

namespace Erfanazadi\Telegramapi\Methods;

class Method implements TelegramMethod
{
    private string $method;

    private array $params;
    public function __construct(string $name, ?array ...$parameters)
    {
        $mergedParameters = [];
        foreach ($parameters as $param) {
            $mergedParameters = array_merge($mergedParameters, $param);
        }

        $this->method = $name;
        $this->params = $mergedParameters;
    }

    final function getMethod(): string
    {
        return $this->method;
    }

    final function getParameters(): array
    {
        return $this->params;
    }
}
