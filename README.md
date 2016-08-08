# slash-pay-php #

A php/composer module for accessing Slash.Us API on your own server script.

### Installation ###

`composer require slash-library/slash-pay`

### Usage ###

#### Init slash client with constructing method ####

```php

use SlashLibrary\SlashPay;

$slashPay = new SlashPay(
	'PUBLIC_KEY', 
	'PRIVATE_KEY'
);

```

## Checkout API ##

#### Pay by credit card ####

```php

$response = $slashPay->pay([
	'total' => 100,	 
    'cc_no' => 'CARD_NUMBER',
    'first_name' => 'FIRST_NAME',
    'last_name' => 'LAST_NAME',
    'currency' => 'USD',
    'expiry_month' => '05',
    'expiry_year' => '2021',
    'cvv' => '566'
]);


```

#### Create charge ####


```php

$response = $slashPay->charge([
	'total' => 100,
	'token' => 'CARD_TOKEN'
]);

```

## Subscribe API ##

#### Create subscription ####


```php


$response = $slashPay->subscribe([
	'plan_id' => 'PLAN_ID',
	'token' => 'CARD_TOKEN'
]);


```

#### Unsubscribe subscription ####


```php


$response = $slashPay->unsubscribe([
	'subscription_id' => 'SUBSCRIPTION_ID'
]);


```

## Redirect API ##

#### Create redirect payment ####


```php


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


```

#### Confirm redirect payment ####


```php


$response = $slashPay->confirm([
	'transaction_id' => 'TRANSACTION_ID'
]);


```

### Test ###

To run unit testing use this command: `php unit`

### License ###

* To be added