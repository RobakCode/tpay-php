<?php

require_once dirname(dirname(__FILE__)).'/src/_class_transferuj/payment_dac.php';

$config = array(
    'kwota'             => 200.99,
    'opis'              => 'Transaction description',
    'crc'               => '100020003006',
    'wyn_url'           => 'http://example.pl/examples/payment_basic.php?transaction_confirmation',
    'email'             => 'customer34@example.com',
    'imie'              => 'John',
    'nazwisko'          => 'Wayn',
);

$transferuj = new Transferuj\PaymentDAC();

/*
 * This method return HTML form
 */

$staticFilesURL = 'http://example.pl/src/';
$merchantData = 'Sklep ze zdrową żywnością<br>ul. Świdnicka 26, 50-345 Wrocław';

$data = $transferuj->registerTransaction($config, $staticFilesURL, $merchantData);

/**
$data['transaction']
array(7) {
    ["result"]=> string(1) "1"
    ["title"]=> string(13) "TR-C7K-9A8AAX"
    ["amount"]=> float(200.99)
    ["account_number"]=> string(26) "12194010763052712000000000"
    ["online"]=> string(1) "0"
    ["url"]=> string(0) ""
    ["desc"]=> string(0) ""
    ["crc"]=> string(0) "100020003006"
}

 Save in your database transaction crc to handle payment confirmation in future
 */

echo $data['html'];