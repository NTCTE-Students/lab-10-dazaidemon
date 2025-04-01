<?php
// Определение исключения для деления на ноль
class DivisionByZeroException extends Exception {}

// Функция для деления двух чисел
function divide($numerator, $denominator) {
    if ($denominator === 0) {
        throw new DivisionByZeroException("Ошибка: Деление на ноль.");
    }
    return $numerator / $denominator;
}
try {
    echo divide(10, 0);
} catch (DivisionByZeroException $e) {
    echo $e->getMessage();
}
?>