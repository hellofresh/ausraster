<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Exception;

class InvalidCoordinateException extends DomainException
{
    protected $message = 'Invalid coordinate value provided';
}
