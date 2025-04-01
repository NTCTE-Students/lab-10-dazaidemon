<?php
// Исключения для валидации формы регистрации
class ShortPasswordException extends Exception {}
class EmptyFieldException extends Exception {}

// Функция для проверки регистрационных данных
function validateRegistration($email, $password, $requiredFields) {
    if (empty($email) || empty($password) || array_filter($requiredFields) === []) {
        throw new EmptyFieldException("Поля не должны быть пустыми.");
    }
    if (strlen($password) < 6) {
        throw new ShortPasswordException("Пароль должен содержать минимум 6 символов.");
    }
    validateEmail($email); // Проверка email
}
try {
    validateRegistration("", "12345", ["username" => ""]);
} catch (ShortPasswordException | EmptyFieldException | ValidationException $e) {
    echo $e->getMessage();
}
?>