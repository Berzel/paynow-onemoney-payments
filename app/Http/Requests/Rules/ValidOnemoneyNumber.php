<?php

namespace App\Http\Requests\Rules;

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
        return strlen($number) == 10 && intval(str_split($number)[2]) === 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string|array
     */
    public function message(){
        return 'The :attribute must be a valid netone number in the format 071XXXXXXX';
    }
}