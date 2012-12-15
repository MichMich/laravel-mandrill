# Mandrill for LaravelPHP #

This package is a simple wrapper for working w/ the [Mandrill API](http://mandrillapp.com/api/docs/).
The code of the application is based on Scott Travis' [Mailchimp Bundle](https://github.com/swt83/laravel-mailchimp).

## Install ##

In ``application/bundles.php`` add:

```php
'mandrill' => array('auto' => true),
```

Edit the sample config file in ``bundels/mandrill/config/mandrill.php`` and input the proper information.

## Usage ##

Call the desired method and pass the params as a single array.  Don't worry about passing the API key.

```php
$response = Mandrill::request('messages/send', array(
	'message' => array(
		'html' => 'Body of the message.',
		'subject' => 'Subject of the message.',
		'from_email' => 'monkey@somewhere.com',
		'to' => array(array('email'=>'foo@bar.com')),
	),
));
```
