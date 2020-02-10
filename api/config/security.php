<?php



//This is the cipher method to use
function encrypt($string){
    $encrypted = "";

    $ciphering =  "AES-128-CTR";

    // Use OpenSSl Encryption method
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;

    // Non-NULL Initialization Vector for encryption
    $encryption_iv = '1598732545852364';

    // Store the encryption key
    $encryption_key = "Qyd`PY2q@tJ%a$*";

    // Use openssl_encrypt() function to encrypt the data
    $encryption = openssl_encrypt($string, $ciphering,
        $encryption_key, $options, $encryption_iv);

    return $encrypted;
}

//function decyp

?>