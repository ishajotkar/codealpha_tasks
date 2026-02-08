<?php
define('SECRET_KEY', '12345678901234567890123456789012');
define('SECRET_IV', '1234567890123456');

function encryptAES($data) {
    return openssl_encrypt($data, 'AES-256-CBC', SECRET_KEY, 0, SECRET_IV);
}

function decryptAES($data) {
    return openssl_decrypt($data, 'AES-256-CBC', SECRET_KEY, 0, SECRET_IV);
}
?>
