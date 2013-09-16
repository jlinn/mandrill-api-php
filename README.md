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
use Mandrill\Mandrill;
use Mandrill\Struct\Message;
use Mandrill\Struct\Recipient;

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