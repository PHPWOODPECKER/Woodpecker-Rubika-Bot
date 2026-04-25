```markdown
# 🪵 Woodpecker

**A lightweight and powerful PHP library for Rubika Bot API**

Woodpecker is a simple yet flexible library to interact with Rubika bots. It provides an easy-to-use interface for sending messages, handling updates, and managing bot logic with minimal configuration.

---

## 📦 Installation

To install Woodpecker, simply include the path to `Autoloader.php` inside the `require_once` function.

```php
require_once 'path/to/Autoloader.php';
```

---

🚀 Getting Started

1. Use the Bot Class

To use the library, import the Bot class as shown below:

```php
use Woodpecker\Core\Bot;
```

2. Instantiate the Bot

Pass your bot token and the received data (JSON input) to the Bot class:

```php
$data = file_get_contents("php://input");
$bot = new Bot('YOUR_BOT_TOKEN', json_decode($data, true));
```

✅ After completing the above steps, you can start using the Bot class methods.

---

🤖 Bot Class Methods

onText(string $text, callable $callback)

This method executes a callable function when a predefined text is received.

```php
$bot->onText('hello', function($api, $data) {
    $api->sendMessage($data->chatId, 'Hello there! 👋');
});
```

onMessage(callable $callback)

This method executes a callable function for every message received.

```php
$bot->onMessage(function($api, $data) {
    $api->sendMessage($data->chatId, 'I received your message!');
});
```

---

📡 $api – Api Class

The $api object provides all methods to interact with the Rubika Bot API.

Method Description
sendMessage(string $chatId, string $text, ?array $metadata = null, ?array $replyMarkup = null) Send a text message
sendPhoto(string $chatId, string $photo, ?string $caption = null, ?array $replyMarkup = null) Send a photo
sendVideo(string $chatId, string $video, ?string $caption = null, ?array $replyMarkup = null) Send a video
sendDocument(string $chatId, string $document, ?string $caption = null, ?array $replyMarkup = null) Send a document
sendAudio(string $chatId, string $audio, ?string $caption = null, ?array $replyMarkup = null) Send an audio file
sendLocation(string $chatId, float $latitude, float $longitude, ?array $replyMarkup = null) Send a location
sendContact(string $chatId, string $phoneNumber, string $firstName, ?string $lastName = null, ?array $replyMarkup = null) Send a contact
sendSticker(string $chatId, string $sticker, ?array $replyMarkup = null) Send a sticker
deleteMessage(string $chatId, string $messageId) Delete a message
editMessageText(string $chatId, string $messageId, string $text, ?array $replyMarkup = null) Edit message text
deleteMessageReplyMarkup(string $chatId, string $messageId) Remove reply markup from a message

Keyboard Helpers

```php
// Reply keyboard
Api::generateReplyKeyboardMarkup(array $buttons, bool $resizeKeyboard = true, bool $oneTimeKeyboard = false);

// Inline keyboard
Api::generateInlineKeyboardMarkup(array $buttons);
Api::generateInlineKeyboardButton(string $text, string $callbackData);
Api::generateInlineUrlButton(string $text, string $url);
```

---

📦 $data – Update Classes

The $data object is an instance of either NewMessageUpdate or InlineMessage, depending on the update type.

NewMessageUpdate Class

Property / Method Description
$chatId Chat ID of the message
$messageId Message ID
$text Message text
$time Timestamp
$senderId Sender's user ID
$isEdited Whether the message was edited
isEdited() Returns true if message is edited
hasButton() Returns true if message contains a button interaction
getText() Returns the message text
getTime() Returns the timestamp
getPersianDate() Returns a readable Persian date
toArray() Returns all data as an array

InlineMessage Class

Property / Method Description
$senderId Sender's user ID
$text Inline message text
$chatId Chat ID
$messageId Message ID
$buttonId Button ID if clicked
hasButton() Returns true if a button was pressed
hasLocation() Returns true if location data exists
getText() Returns the message text
getButtonId() Returns the button ID
getCleanText() Returns trimmed text
contains($keyword) Check if text contains a keyword
isEmpty() Returns true if message is empty and no button
toArray() Returns all data as an array

---

💡 Example Usage

```php
<?php

require_once 'path/to/Autoloader.php';

use Woodpecker\Core\Bot;

$data = file_get_contents("php://input");
$bot = new Bot('YOUR_BOT_TOKEN', json_decode($data, true));

// Reply to "hi"
$bot->onText('hi', function($api, $data) {
    $api->sendMessage($data->chatId, 'Hello! How can I help you?');
});

// Handle any message with a button
$bot->onMessage(function($api, $data) {
    if ($data->hasButton()) {
        $api->sendMessage($data->chatId, 'You pressed a button! 🎯');
    } else {
        $api->sendMessage($data->chatId, 'You said: ' . $data->getText());
    }
});
```

---

📁 Files Structure

```
Woodpecker/
├── Core/
│   └── Bot.php
├── Support/
│   ├── Api.php
│   ├── Update.php
│   ├── NewMessageUpdate.php
│   └── InlineMessage.php
└── Autoloader.php
```

---

📄 License


MIT License

Copyright (c) 2026 Ali Asghar Poursalehi or woodpecker developer

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

---

```
