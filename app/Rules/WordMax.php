<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class WordMax implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $words;
    public $limit;
    public $attribute;

    public function __construct($words,$limit)
    {
        $this->words = $words;
        $this->limit = $limit;
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
        return ( str_word_count($this->words) < ($this->limit + 1) ) ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Le champs ".$this->attribute." ne doit pas depasser ".$this->limit." mots";
    }
}
