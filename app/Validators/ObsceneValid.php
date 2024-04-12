<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class ObsceneValid extends AbstractValidator
{
    protected string $message = 'Field :field is not valid';
    public function rule(): bool
    {
        return !preg_match('/(бля|ху(?:й|е|я|ю)|п(?:и|е|о)зд(а|у|е|ы|о)?|еблан?(ый|ая|ое|ые)?|мудак(а|у|и)?)/ui', $this->value);
    }
}