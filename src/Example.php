<?php

require_once '../vendor/autoload.php';

use \RapidWeb\SimpleMailChimp\Factories\SimpleMailChimpFactory;

$simpleMailChimp = SimpleMailChimpFactory::getByAPIKey('API_KEY_GOES_HERE');

$response = $simpleMailChimp->subscribe('LIST_ID_GOES_HERE', 'example@example.com');

var_dump($response);