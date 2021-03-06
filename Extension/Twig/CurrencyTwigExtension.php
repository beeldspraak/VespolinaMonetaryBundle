<?php

namespace Vespolina\MonetaryBundle\Extension\Twig;

use Vespolina\MonetaryBundle\Model\Monetary;
use Vespolina\MonetaryBundle\Model\Currency;

class CurrencyTwigExtension extends \Twig_Extension
{
    protected $monetaryManager;

    public function __construct($monetaryManager)
    {
        $this->monetaryManager = $monetaryManager;
    }
    // the magic function that makes this easy
    public function getFilters()
    {
        return array(
            'currencyConvert'  => new \Twig_Filter_Method($this, 'currencyConvert'),
        );
    }

    // your custom function
    public function currencyConvert($monetary, $currency)
    {
        $monetaryConverted = $this->monetaryManager->format($monetary, $currency);
        return $monetaryConverted;
    }

    // for a service we need a name
    public function getName()
    {
        return 'currency_twig_extension';
    }
}