<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class OnlyLettersAllowed implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public $attribute;

    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->attribute = $attribute;
        return preg_match( "/[A-Z]/i" , $value ) === 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Le champs '.$this->attribute.' doit être seulement en lettre.';
    }
}
