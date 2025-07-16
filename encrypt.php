<?php
function encryptData($data, $key, $iv) {
    $cipher = "aes-256-cbc";
    $encrypted = openssl_encrypt($data, $cipher, $key, 0, $iv);
    return base64_encode($encrypted);
}

function generateRandomKey($length) {
    return openssl_random_pseudo_bytes($length);
}

function generateRandomIV($length) {
    return openssl_random_pseudo_bytes($length);
}

// Example data
$data = "This is a secret message.";

// Generate a random key and IV
$key = generateRandomKey(32); // AES-256 requires a 256-bit (32-byte) key
$iv = generateRandomIV(16);  // AES-256-CBC requires a 128-bit (16-byte) IV

// Encrypt the data
$encryptedData = encryptData($data, $key, $iv);

echo "Encrypted Data: " . $encryptedData . "\n";
echo "Encryption Key (base64): " . base64_encode($key) . "\n";
echo "IV (base64): " . base64_encode($iv) . "\n";
?>




<?php
function decryptData($encryptedData, $key, $iv) {
    $cipher = "aes-256-cbc";
    $encryptedData = base64_decode($encryptedData);
    $decrypted = openssl_decrypt($encryptedData, $cipher, $key, 0, $iv);
    return $decrypted;
}

// Replace these with the actual base64 encoded key and IV from the encryption output
$keyBase64 = 'YOUR_BASE64_ENCODED_KEY'; // Replace with key from the encryption output
$ivBase64 = 'YOUR_BASE64_ENCODED_IV';   // Replace with IV from the encryption output
$encryptedData = 'YOUR_ENCRYPTED_DATA'; // Replace with encrypted data from the encryption output

// Decode base64 encoded key and IV
$key = base64_decode($keyBase64);
$iv = base64_decode($ivBase64);

// Decrypt the data
$decryptedData = decryptData($encryptedData, $key, $iv);

echo "Decrypted Data: " . $decryptedData . "\n";
?>