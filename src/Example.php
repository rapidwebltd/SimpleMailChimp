<?php

require_once '../vendor/autoload.php';

use \RapidWeb\SimpleMailChimp\Factories\SimpleMailChimpFactory;

$simpleMailChimp = SimpleMailChimpFactory::getByAPIKey('YOUR API KEY');




$response = $simpleMailChimp->subscribe('[LIST ID]', '[EMAIL ADDRESS]');

