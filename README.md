# TelegramAPI

A very simple but sufficient bot API designed for Telegram. With this API, you can easily build your own chatbot on the Telegram platform. This README provides instructions on how to use the TelegramAPI in your project.

## Installation

To use the TelegramAPI in your project, simply require the main file `Bot.php` like so:

```php
<?php
require_once 'TelegramAPI/vendor/autoload.php';

use Erfanazadi\Telegramapi\Bot;

$bot = new Bot('YOUR_BOT_TOKEN_HERE...');
```

## Usage

### Get Updates

You can retrieve updates from Telegram by calling the `getUpdates()` method:

```php
$update = $bot->getUpdates();
```

The `getUpdates()` method returns an object containing information about the latest update received by your bot. If no updates are available, it returns `null`.

### Send Requests

To send requests to Telegram, you can use the `send()` method:

```php
$method = new Method('methodName', array(
    'param1' => 'value1',
    'param2' => 'value2'
));

$response = $bot->send($method);
```

Here, replace `methodName`, `param1` and `param2` with the actual method name and parameters you want to call. The `send()` method returns an object containing the response received from Telegram.

Alternatively, you can also pass the chat ID as a second parameter:

```php
$chat_id = 123456789;
$method = new Method('sendMessage', array(
    'chat_id' => $chat_id,
    'text' => 'Hello, World!'
));

$response = $bot->send($method);
```

### Examples

Sending a message:

```php
$chat_id = 123456789;
$method = new Method('sendMessage', array(
    'chat_id' => $chat_id,
    'text' => 'Hello, World!'
));

$bot->send($method);
```

Setting a webhook:

```php
$method = new Method('setWebhook', array(
    'url' => 'https://example.com/bot.php'
));

$response = $bot->send($method);

var_dump($response);
```

## Documentation

For more information about the available methods and parameters, please refer to the official Telegram Bot API documentation: https://core.telegram.org/bots/api#available-methods
