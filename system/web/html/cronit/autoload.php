<?php
//autoload.php
function __autoload($className) {    
    $filename = __DIR__ . "/classes/" . strtolower($className) . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}