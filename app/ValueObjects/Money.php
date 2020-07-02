<?php

namespace App\ValueObjects;

use InvalidArgumentException;

class Money {

    /**
     * Create a new Money instance
     *
     * @param [type] $amount
     * @param [type] $currency
     */
    public function __construct($amount, Currency $currency) {
        $moneyPattern = '/^\d{1,13}(.\d{1,2})?$/';

        if (! preg_match($moneyPattern, $amount)){
            throw new InvalidArgumentException('Invalid value for money.');
        }

        $amount = floatval($amount);

        if ($amount < 0.0) {
            throw new InvalidArgumentException('Amount of money can not be less than zero.');
        }

        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * The amount of money
     *
     * @var [type]
     */
    private $amount;

    /**
     * Get the amount of this money
     *
     * @return void
     */
    public function getAmount() {
        return $this->amount;
    }
}