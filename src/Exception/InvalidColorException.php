<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Exception;

class InvalidColorException extends DomainException
{
    protected $message = 'Invalid hexadecimal / CSS style color provided';
}
