<?php
// Исключение для короткого пароля
class ShortPasswordException extends Exception {}
// Исключение для неверного формата email
class InvalidEmailException extends Exception {}
// Исключение для пустых обязательных полей
class EmptyFieldException extends Exception {}
// Функция для проверки валидности email адреса
function validateEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new InvalidEmailException("Неверный формат email: $email");
    }
}
// Функция для проверки регистрационных данных
function validateRegistration($email, $password, $requiredFields) {
    // Проверка обязательных полей
    foreach ($requiredFields as $field) {
        if (empty(trim($field))) {
            throw new EmptyFieldException("Обязательные поля не должны быть пустыми.");
        }
    }

    // Проверка длины пароля
    if (strlen($password) < 6) {
        throw new ShortPasswordException("Пароль должен содержать минимум 6 символов.");
    }

    // Проверка формата email
    validateEmail($email);
}
try {
    // Данные, которые пользователь вводит в форму
    $email = "invalid-email"; //  неверного email
    $password = "123"; //  короткого пароля
    $requiredFields = [
        "username" => "exampleUser", // обязательного поля
        "email" => $email,
        "password" => $password
    ];

    validateRegistration($email, $password, $requiredFields);
} catch (ShortPasswordException $e) {
    echo "Ошибка: " . $e->getMessage() . PHP_EOL;
} catch (InvalidEmailException $e) {
    echo "Ошибка: " . $e->getMessage() . PHP_EOL;
} catch (EmptyFieldException $e) {
    echo "Ошибка: " . $e->getMessage() . PHP_EOL;
}
?>