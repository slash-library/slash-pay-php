<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use SlashLibrary\SlashPay;

$slashPay = new SlashPay(
	'slash_test_MCAwDQYJKoZIhvcNAQEBBQADDwAwDAIFALKbb0ECAwEAAQ==', 
	'slash_test_MEMCAQAwDQYJKoZIhvcNAQEBBQAELzAtAgEAAgUAsptvQQIDAQABAgRsnXXBAgMA5vMCAwDF+wICAVUCAwCUbQIDAIZG'
);

echo '=======================     PAY     =======================' . PHP_EOL;
$response = $slashPay->pay(['total' => 100]);
var_dump($response);

echo '=======================    CHARGE   ======================='. PHP_EOL;
$response = $slashPay->charge(['total' => 100]);
var_dump($response);

echo '=======================  SUBSCRIBE  ======================='. PHP_EOL;
$response = $slashPay->subscribe(['total' => 100]);
var_dump($response);

echo '======================= UNSUBSCRIBE ======================='. PHP_EOL;
$response = $slashPay->unsubscribe(['total' => 100]);
var_dump($response);

echo '=======================  REDIRECT   ======================='. PHP_EOL;
$response = $slashPay->redirect(['total' => 100]);
var_dump($response);

echo '=======================   CONFIRM   ======================='. PHP_EOL;
$response = $slashPay->confirm(['total' => 100]);
var_dump($response);