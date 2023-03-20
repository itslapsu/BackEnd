<?php

// Запрос имени отправителя
print("Введите ваше имя: ");
$firstName = readline();

// Запрос текста сообщения
print("Введите текст сообщения: ");
$messageText = readline();

// Формирование сообщения
$message = "Моё имя: {$firstName}\n";
$message .= "{$messageText}\n";

// Добавление дополнительной информации в сообщение
$message .= "\nДанное сообщение было отправлено с помощью .php скрипта.";

// Формирование заголовков
$headers = 'From: o.o.lapta@student.khai.edu';

// Запрос адресата
print("Введите адресата: ");
$recipient = readline();

// Отправка сообщения
$subject = 'Повідпомлення "Розсилка"';
mail($recipient, $subject, $message, $headers);

?>