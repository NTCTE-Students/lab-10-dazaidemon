<?php
// Определение исключения для ошибок чтения файлов
class FileReadException extends Exception {}

// Функция для чтения содержимого файла
function readFileContent($fileName) {
    if (!file_exists($fileName)) {
        throw new FileReadException("Файл не найден: $fileName");
    }
    return file_get_contents($fileName);
}
try {
    echo readFileContent("non-existent-file.txt");
} catch (FileReadException $e) {
    echo $e->getMessage();
}
?>