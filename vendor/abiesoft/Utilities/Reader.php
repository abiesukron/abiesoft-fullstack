<?php 

namespace Abiesoft\Resources\Utilities;

class Reader {

    public static function secretCode($data, $key) {
        $cipher = "aes-128-cbc";
        $ciphertext_dec = base64_decode($data);
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = substr($ciphertext_dec, 0, $ivlen);
        $ciphertext = substr($ciphertext_dec, $ivlen);
        $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv);
        $data = json_decode($original_plaintext, true);
        return (json_last_error() == JSON_ERROR_NONE) ? $data : $original_plaintext;
    }

}