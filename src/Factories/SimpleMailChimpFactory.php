<?php
namespace RapidWeb\SimpleMailChimp\Factories;

use \RapidWeb\SimpleMailChimp\Objects\SimpleMailChimp;
use \DrewM\MailChimp\MailChimp;
use \Exception;

abstract class SimpleMailChimpFactory
{
    public static function getByAPIKey($apiKey)
    {
        $client = new MailChimp($apiKey);

        if (!$client) {
            throw new Exception('Unable to create new MailChimp client using the API key provided.');
        } 

        return new SimpleMailChimp($client);
    }
}