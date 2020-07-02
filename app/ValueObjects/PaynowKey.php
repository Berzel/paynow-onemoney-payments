<?php

namespace App\ValueObjects;

use InvalidArgumentException;

class PaynowKey {

    /**
     * Repressentation of the paynow key
     *
     * @param string $value The key as provided by paynow
     */
    public function __construct(string $value) {
        $keyPattern = '/^\w{8}(-\w{4}){3}-\w{12}$/';

        if ( ! preg_match($keyPattern, $value)) {
            throw new InvalidArgumentException('Invalid paynow key.');
        }

        $this->value = $value;
    }

    /**
     * The value of the key as provided by paynow
     *
     * @var [type]
     */
    private $value;

    /**
     * Get the value of the key
     *
     * @return string $value
     */
    public function getValue() {
        return $this->value;
    }
}