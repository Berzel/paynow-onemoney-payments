<?php

namespace App\Http\Requests\Rules;

use App\OneMoneyNumber;
use InvalidArgumentException;
use Illuminate\Contracts\Validation\Rule;

class ValidOnemoneyNumber implements Rule {

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $number) {
        try {
            $number = new OneMoneyNumber($number);
            return true;
        } 
        
        catch (InvalidArgumentException $exception) {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string|array
     */
    public function message(){
        return 'The :attribute must be a valid netone number in the format 071XXXXXXX, and should be 10 digits long.';
    }
}