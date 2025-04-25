<?php
// Определение исключения для валидации email
class ValidationException extends Exception {}
// Функция для проверки валидности email адреса
function validateEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new ValidationException("Неверный формат email: $email");
    }
}
try {
    validateEmail("invalid-email");
} catch (ValidationException $e) {
    echo $e->getMessage();
}
?>