<?php

/**
 * A LaravelPHP package for working w/ Mandrill.
 * Based on Scott Travis' Mailchimp Bundle.
 *
 * @package    Mandrill
 * @author     Michael Teeuw <michael@xonaymedia.nl
 * @link       http://https://github.com/michmich/laravel-mandrill
 * @license    MIT License
 */

class Mandrill
{
	//public static function __callStatic($method, $args)
	public static function request($method, $arguments = array())
	{

		// load api key
		$api_key = Config::get('mandrill::mandrill.api_key');
		
		// determine endpoint
		$endpoint = 'https://mandrillapp.com/api/1.0/'.$method.'.json';
		
		// build payload
		$arguments['key'] = $api_key;
		
		// setup curl request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arguments));
		$response = curl_exec($ch);

		// catch errors
		if (curl_errno($ch))
		{
			#$errors = curl_error($ch);
			curl_close($ch);
			
			// return false
			return false;
		}
		else
		{
			curl_close($ch);
			
			// return array
			return json_decode($response);
		}

	}
	
}
