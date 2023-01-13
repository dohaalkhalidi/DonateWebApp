<?php

require_once('./IyzipayBootstrap.php');
require_once("../Config.php");

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey(API_KEY);
        $options->setSecretKey(API_SECRET_KEY);
        $options->setBaseUrl('https://sandbox-api.iyzipay.com');

        return $options;
    }
}