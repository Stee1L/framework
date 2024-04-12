<?php

namespace Validators;

use Carbon\Carbon;
use Src\Validator\AbstractValidator;

class YearValid extends AbstractValidator
{
    protected string $message = 'Field :field is not valid';

    public function rule(): bool
    {
        return time() > Carbon::create($this->value)->getTimestamp();
    }
}