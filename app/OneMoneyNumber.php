<?php

namespace App;

use InvalidArgumentException;

class OneMoneyNumber {

    private $number;

    public function __construct($number) {
        if (strlen($number) !== 10) {
            throw new InvalidArgumentException('OneMoney number should be 10 digits long.');
        }

        $prefix = substr($number, 0, 3);
        if (!in_array($prefix, ['071'])) {
            throw new InvalidArgumentException('OneMoney number should be in the format 071XXXXXXX.');
        }

        $this->number = $number;
    }

    public function getValue(){
        return $this->number;
    }
}