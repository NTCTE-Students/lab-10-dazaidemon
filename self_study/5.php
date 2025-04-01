<?php
// Функция для логирования ошибок в файл
function logError($message) {
    file_put_contents('error.log', date('Y-m-d H:i:s') . " - " . $message . PHP_EOL, FILE_APPEND);
}

try {
    // Искусственная ошибка для тестирования логирования
    throw new Exception("Тестовая ошибка.");
} catch (Exception $e) {
    logError($e->getMessage());
    echo "Ошибка была записана в лог.";
}
?>