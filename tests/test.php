<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use SlashLibrary\SlashPay;

$slashPay = new SlashPay(
	'slash_test_MCAwDQYJKoZIhvcNAQEBBQADDwAwDAIFALKbb0ECAwEAAQ==', 
	'slash_test_MEMCAQAwDQYJKoZIhvcNAQEBBQAELzAtAgEAAgUAsptvQQIDAQABAgRsnXXBAgMA5vMCAwDF+wICAVUCAwCUbQIDAIZG'
);

echo '=======================     PAY     =======================' . PHP_EOL;
$response = $slashPay->pay([
	'total' => 100,
    'cc_no' => '4111111111111111',
    'first_name' => 'FIRST_NAME',
    'last_name' => 'LAST_NAME',
    'currency' => 'USD',
    'expiry_month' => '05',
    'expiry_year' => '2021',
    'cvv' => '566'
]);
var_dump($response);

echo '=======================    CHARGE   ======================='. PHP_EOL;
$response = $slashPay->charge([
	'total' => 100,
	'currency' => 'USD',
	'token' => '$2a$04$yiT71TM/zPMP7kitVMvAoeAJuzkYRb32WLd2ZNgCIZt/Op5d/b44u'
]);
var_dump($response);

echo '=======================  SUBSCRIBE  ======================='. PHP_EOL;
$response = $slashPay->subscribe([
	'plan_id' => 'basic_monthly',
	'token' => '$2a$04$c0QJvhjPHoBgcmBqITJ3vexTwheutUMUpA5vdfqhb.kCmVJFCbhVa'
]);
var_dump($response);

echo '======================= UNSUBSCRIBE ======================='. PHP_EOL;
$response = $slashPay->unsubscribe([
	'subscription_id' => 'sub_8y1JSo1twAIAum'
]);
var_dump($response);

echo '=======================  REDIRECT   ======================='. PHP_EOL;
$response = $slashPay->redirect([
	'items' => [
		0 => [
			'name' => 'Apple',
			'qty' => 10,
			'amt' => 1
		]
	],
	'return_url' => 'http://mystore.com/success/checkout',
	'cancel_url' => 'http://mystore.com/fail/checkout',
	'currency' => 'USD'
]);
var_dump($response);

echo '=======================   CONFIRM   ======================='. PHP_EOL;
$response = $slashPay->confirm(['transaction_id' => '57a8094e52e8909052d36196']);
var_dump($response);