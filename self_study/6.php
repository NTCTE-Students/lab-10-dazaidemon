<?php
// Базовое исключение для онлайн-магазина
class ShopException extends Exception {}

// Дочерние исключения для различных случаев
class InsufficientFundsException extends ShopException {}
class ProductNotFoundException extends ShopException {}

// Пример использования иерархии исключений
try {
    throw new InsufficientFundsException("Недостаточно средств для покупки.");
} catch (InsufficientFundsException | ProductNotFoundException $e) {
    echo $e->getMessage();
}
?>