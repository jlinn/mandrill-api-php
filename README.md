mandrill-api-php
================
[![Build Status](https://secure.travis-ci.org/jlinn/mandrill-api-php.png?branch=master)](http://travis-ci.org/jlinn/mandrill-api-php)

A PHP client library for [Mandrill's API](https://mandrillapp.com/api/docs/).

This library provides all of the functionality present in the [official PHP client](https://bitbucket.org/mailchimp/mandrill-api-php/), but makes use of namespaces and provides helper classes to ease message sending.

Installation Using [Composer](http://getcomposer.org/)
======================================================

Assuming composer.phar is located in your project's root directory, run the following command:

```bash
php composer.phar require jlinn/mandrill-api-php:~1.0
```

Usage
=====

Sending a Message
-----------------

```php
use Jlinn\Mandrill\Mandrill;
use Jlinn\Mandrill\Struct\Message;
use Jlinn\Mandrill\Struct\Recipient;

// instantiate a client object
$mandrill = new Mandrill('your_api_key');

// instantiate a Message object
$message = new Message();

// define message properties
$message->text = 'Hello, *|NAME|*!';
$message->subject = 'Test';
$message->from_email = 'test@example.com';
$message->from_name = 'Mandrill API Test';

// instantiate a Recipient object and add details
$recipient = new Recipient();
$recipient->email = 'recipient.email@example.com';
$recipient->name = 'Recipient Name';
$recipient->addMergeVar('NAME', $recipient->name);

// add the recipient to the message
$message->addRecipient($recipient);

// send the message
$response = $mandrill->messages()->send($message);
```

Usage with Laravel 4.x
=====

We have built a factory so that it's easier to use with Laravel 4.x facades.

Configuration
-----------------

In order to publish the package configuration you need to perform the following command:

```
php artisan config:publish jlinn/mandrill-api-php
```

Change then the `secret` variable with your Mandrill secret key.

Sending a Message
-----------------

```php

// instantiate a client object
$api = Mandrill::api();

// instantiate a message object
$message = Mandrill::message([
    'text'       => 'Hello, *|NAME|*!',
    'subject'    => 'Test',
    'from_email' => 'test@example.com',
    'from_name'  => 'Mandrill API Test'
]);

// instantiate a Recipient object and add details
$recipient = Mandrill::recipient('recipient.email@example.com', 'Recipient Name');
$recipient->addMergeVar('NAME', $recipient->name);

// add the recipient to the message
$message->addRecipient($recipient);

// send the message
$response = $api->messages()->send($message);
