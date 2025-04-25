<?php
// Определение исключения для ошибок подключения к базе данных
class DatabaseConnectionException extends Exception {}

// Функция для имитации подключения к базе данных
function connectToDatabase($host, $user, $password) {
    // В данном примере будем имитировать ошибку подключения
    throw new DatabaseConnectionException("Ошибка подключения к базе данных на хосте $host.");
}
try {
    connectToDatabase("localhost", "user", "password");
} catch (DatabaseConnectionException $e) {
    echo $e->getMessage();
}
?>