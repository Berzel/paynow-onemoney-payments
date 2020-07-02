<?php

namespace App\ValueObjects;

use InvalidArgumentException;

class OneMoneyNumber {

    private $number;

    /**
     * Create a new onemoney number instance
     *
     * @param [type] $number
     */
    public function __construct($number) {
        $netoneNumberPattern = '/^((\+|00)?263|0)?7(1)\d{7}$/';

        if ( ! preg_match($netoneNumberPattern, $number)) {
            throw new InvalidArgumentException('Invalid onemoney number.');
        }

        $this->number = '0' . substr($number, -9);
    }

    /**
     * Get the number
     *
     * @return void
     */
    public function getValue() {
        return $this->number;
    }
}
